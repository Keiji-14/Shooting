<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PlayLogs Controller
 *
 * @property \App\Model\Table\PlayLogsTable $PlayLogs
 * @method \App\Model\Entity\PlayLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlayLogsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Weapons', 'Skins', 'Stages'],
        ];
        $playLogs = $this->paginate($this->PlayLogs);

        $this->set(compact('playLogs'));
    }

    /**
     * View method
     *
     * @param string|null $id Play Log id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $playLog = $this->PlayLogs->get($id, [
            'contain' => ['Users', 'Weapons', 'Skins', 'Stages'],
        ]);

        $this->set(compact('playLog'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $playLog = $this->PlayLogs->newEmptyEntity();
        if ($this->request->is('post')) {
            $playLog = $this->PlayLogs->patchEntity($playLog, $this->request->getData());
            if ($this->PlayLogs->save($playLog)) {
                $this->Flash->success(__('The play log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The play log could not be saved. Please, try again.'));
        }
        $users = $this->PlayLogs->Users->find('list', ['limit' => 200])->all();
        $weapons = $this->PlayLogs->Weapons->find('list', ['limit' => 200])->all();
        $skins = $this->PlayLogs->Skins->find('list', ['limit' => 200])->all();
        $stages = $this->PlayLogs->Stages->find('list', ['limit' => 200])->all();
        $this->set(compact('playLog', 'users', 'weapons', 'skins', 'stages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Play Log id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $playLog = $this->PlayLogs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $playLog = $this->PlayLogs->patchEntity($playLog, $this->request->getData());
            if ($this->PlayLogs->save($playLog)) {
                $this->Flash->success(__('The play log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The play log could not be saved. Please, try again.'));
        }
        $users = $this->PlayLogs->Users->find('list', ['limit' => 200])->all();
        $weapons = $this->PlayLogs->Weapons->find('list', ['limit' => 200])->all();
        $skins = $this->PlayLogs->Skins->find('list', ['limit' => 200])->all();
        $stages = $this->PlayLogs->Stages->find('list', ['limit' => 200])->all();
        $this->set(compact('playLog', 'users', 'weapons', 'skins', 'stages'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Play Log id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $playLog = $this->PlayLogs->get($id);
        if ($this->PlayLogs->delete($playLog)) {
            $this->Flash->success(__('The play log has been deleted.'));
        } else {
            $this->Flash->error(__('The play log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function createPlayLog(
        $userid = null,
        $skinid = null,
        $stagelevel = null, 
        $scoretype = null, 
        $score = null,
        $playresult = null,
        $coinresult = null
        )
    {

        $this->loadModel('playLogs');
        $totalscoretype = 4;
        $message = null;

        $user = null;

        if($userid != null){
            $user = $this->PlayLogs->Users->get($userid);
        }

        $playlog = $this->PlayLogs->newEmptyEntity();
        $stage = $this->PlayLogs->Stages->find()->where(['stage_level' => $stagelevel])->first();
        $playlog->user_id = $userid;
        $playlog->skin_id = $skinid;
        $playlog->stage_id = $stage->id;
        $playlog->score_type = $scoretype;
        $playlog->score = $score;
        $playlog->play_result = $playresult;
        $playlog->coin_result = $coinresult;

        if($this->PlayLogs->save($playlog)){
            $message = "play log saved";
            if($playlog->score != $totalscoretype){
                $user->current_coin += $playlog->coin_result;
                if($this->PlayLogs->Users->save($user)){
                    //ユーザ情報保存成功
                }
            }
        }
        else{
            $message = "play log save error";
        }
        
        $this->set(compact('playlog','message'));
        $this->viewBuilder()->setClassName('Json')->setOption('serialize', ['playlog','message']);

    }

    public function getRanking($scoretype = null){
        $message = null;

        $rankingnumber = 5;

        $playlogs = $this->PlayLogs
        ->find()
        ->where(['score_type' => $scoretype])
        ->order(['score'=>'DESC','coin_result'=>'DESC'])
        ->limit($rankingnumber);

        if($playlogs->count() > 0){
            $message = "get ranking successful";
        }
        else{
            $message = "get ranking failed";
        }

        $this->set(compact('playlogs','message'));
        $this->viewBuilder()->setClassName('Json')->setOption('serialize',['playlogs','message']);
    }

}
