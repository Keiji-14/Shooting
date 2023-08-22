<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;

/**
 * GachaLogs Controller
 *
 * @property \App\Model\Table\GachaLogsTable $GachaLogs
 * @method \App\Model\Entity\GachaLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GachaLogsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Gachas', 'Users', 'Weapons', 'Skins'],
        ];
        $gachaLogs = $this->paginate($this->GachaLogs);

        $this->set(compact('gachaLogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Gacha Log id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gachaLog = $this->GachaLogs->get($id, [
            'contain' => ['Gachas', 'Users', 'Weapons', 'Skins', 'SkinInfors', 'WeaponInfors'],
        ]);

        $this->set(compact('gachaLog'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gachaLog = $this->GachaLogs->newEmptyEntity();
        if ($this->request->is('post')) {
            $gachaLog = $this->GachaLogs->patchEntity($gachaLog, $this->request->getData());
            if ($this->GachaLogs->save($gachaLog)) {
                $this->Flash->success(__('The gacha log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gacha log could not be saved. Please, try again.'));
        }
        $gachas = $this->GachaLogs->Gachas->find('list', ['limit' => 200])->all();
        $users = $this->GachaLogs->Users->find('list', ['limit' => 200])->all();
        $weapons = $this->GachaLogs->Weapons->find('list', ['limit' => 200])->all();
        $skins = $this->GachaLogs->Skins->find('list', ['limit' => 200])->all();
        $this->set(compact('gachaLog', 'gachas', 'users', 'weapons', 'skins'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gacha Log id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gachaLog = $this->GachaLogs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gachaLog = $this->GachaLogs->patchEntity($gachaLog, $this->request->getData());
            if ($this->GachaLogs->save($gachaLog)) {
                $this->Flash->success(__('The gacha log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gacha log could not be saved. Please, try again.'));
        }
        $gachas = $this->GachaLogs->Gachas->find('list', ['limit' => 200])->all();
        $users = $this->GachaLogs->Users->find('list', ['limit' => 200])->all();
        $weapons = $this->GachaLogs->Weapons->find('list', ['limit' => 200])->all();
        $skins = $this->GachaLogs->Skins->find('list', ['limit' => 200])->all();
        $this->set(compact('gachaLog', 'gachas', 'users', 'weapons', 'skins'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gacha Log id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gachaLog = $this->GachaLogs->get($id);
        if ($this->GachaLogs->delete($gachaLog)) {
            $this->Flash->success(__('The gacha log has been deleted.'));
        } else {
            $this->Flash->error(__('The gacha log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function gacha($gachaId=null,$userId= null){


        $this->loadModel('GachaLogs');
        $message = null;
        $skininformessage = null;

        $gacha = $this->GachaLogs->Gachas->get($gachaId);
        $user = $this->GachaLogs->Users->get($userId);

        $resultgachas = array();

        if($gacha != null && $user != null){

            if($user->current_coin > $gacha -> consume_coin){
                $gacharates= TableRegistry::getTableLocator()->get('GachaRates');
            
                for($i= 0;$i < $gacha->gacha_count; $i++){

                    $gachaweight = $this->gachaAlgorithm();
                    $findgachaskins = $gacharates
                    ->find()
                    ->where(['gacha_rate' => $gachaweight,'gacha_id' => $gachaId]);
                    $findgachaskin = $findgachaskins
                    ->order($findgachaskins->func()->rand())
                    ->first();
                    $gachalogarray = $this->createGachaLogArray($findgachaskin,$userId);
                    $gachalog = $this->GachaLogs->newEntity($gachalogarray);
                    array_push($resultgachas,$gachalog);
                }
            }
        }

        if($this->GachaLogs->saveMany($resultgachas)){
            $user->current_coin -= $gacha->consume_coin;
            $this->GachaLogs->Users->save($user);
            
        } 
        $coinwhenowned = array(
            'default' => 'default'
        );
        if(count($resultgachas) == $gacha->gacha_count){
            $message = "gacha successful";
            $newskininfor = array();

            foreach($resultgachas as $index => $r){
                $ifskinowned = $this->GachaLogs->SkinInfors->find()->where([
                    'user_id' => $r -> user_id,
                    'skin_id' => $r -> skin_id,
                ])->first();

                if($ifskinowned != null){
                    $coinwhenowned[$index] = $this->returnCoin($ifskinowned->skin_id);
                }
                else{

                    $skininforarray= $this->createSkinInforArray($r);
                    $skininfor = $this->GachaLogs->SkinInfors->newEntity($skininforarray);
                    array_push($newskininfor ,$skininfor);
                }
                
                if($newskininfor != null){
                    if($this->GachaLogs->SkinInfors->saveMany($newskininfor)){
                        $skininformessage = "skin information saved";
                    }
                }
            }
            foreach ($coinwhenowned as $index => $coin) {
                if ($index ==='default') {
                    continue;
                }
                unset($resultgachas[$index]);
                $user->current_coin += $coin; 
            }
            if($this->GachaLogs->Users->save($user)){
                //userにお金を足す
            }
            
        }
        else{
            $message = "gacha failed !";
        }

        $this->set(compact('message','resultgachas','skininformessage','coinwhenowned'));
        $this->viewBuilder()->setClassName('Json')->setOption('serialize', ['resultgachas','coinwhenowned','message','skininformessage']);
    }

    Private function gachaAlgorithm() {

        $weights = [
            'common'=> 60,
            'rare' => 30,
            'superRare'=>10
        ];

        $totalnumber = 0;

        foreach($weights as $key => $value){
            $totalnumber += $value;
        }

        $min = 0;
        $max = $totalnumber;
        $randomnumber = $min + mt_rand() / mt_getrandmax() * ($max - $min);
        $runningTotal = 0.0;
        $gachaweight = 0;

        foreach($weights as $key => $value){
            $runningTotal += $value;
            if($randomnumber < $runningTotal){
                $gachaweight = $value;
                break;
            }
        }
        return  $gachaweight;
    }

    private function createGachaLogArray($data,$userId)
    {
    $arr = array();
    $arr['gacha_id'] = $data -> gacha_id;
    $arr['user_id'] =  $userId;
    $arr['skin_id'] = $data->skin_id;
    return $arr;
    }

    private function createSkinInforArray($data)
    {
    $arr = array();
    $arr['skin_id'] = $data -> skin_id;
    $arr['user_id'] =  $data -> user_id;
    $arr['gacha_log_id'] = $data -> id;
    return $arr;
    }

    private function updateSkinInforArray($data)
    {
    $arr = array();
    $arr['skin_id'] = $data -> skin_id;
    return $arr;
    }

    private function returnCoin($skinid){
        $gacharates= TableRegistry::getTableLocator()->get('GachaRates');
        $gacharate = $gacharates->find()->where(['skin_id' => $skinid])->first();

        $weights = [
            'common'=> 60,
            'rare' => 30,
            'superRare'=>10
        ];

        $retruncoin = null;
        $coinnumber = [
                'common'=> 10,
                'rare' => 20,
                'superRare'=>30
            ];
        

        foreach($weights as $key=>$value){
            if($gacharate->gacha_rate == $value){
                $retruncoin = $coinnumber[$key];
            }
        }
        
        return $retruncoin;
    }

    

}
