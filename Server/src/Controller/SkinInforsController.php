<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SkinInfors Controller
 *
 * @property \App\Model\Table\SkinInforsTable $SkinInfors
 * @method \App\Model\Entity\SkinInfor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SkinInforsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Skins', 'GachaLogs'],
        ];
        $skinInfors = $this->paginate($this->SkinInfors);

        $this->set(compact('skinInfors'));
    }

    /**
     * View method
     *
     * @param string|null $id Skin Infor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $skinInfor = $this->SkinInfors->get($id, [
            'contain' => ['Users', 'Skins', 'GachaLogs'],
        ]);

        $this->set(compact('skinInfor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $skinInfor = $this->SkinInfors->newEmptyEntity();
        if ($this->request->is('post')) {
            $skinInfor = $this->SkinInfors->patchEntity($skinInfor, $this->request->getData());
            if ($this->SkinInfors->save($skinInfor)) {
                $this->Flash->success(__('The skin infor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The skin infor could not be saved. Please, try again.'));
        }
        $users = $this->SkinInfors->Users->find('list', ['limit' => 200])->all();
        $skins = $this->SkinInfors->Skins->find('list', ['limit' => 200])->all();
        $gachaLogs = $this->SkinInfors->GachaLogs->find('list', ['limit' => 200])->all();
        $this->set(compact('skinInfor', 'users', 'skins', 'gachaLogs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Skin Infor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $skinInfor = $this->SkinInfors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $skinInfor = $this->SkinInfors->patchEntity($skinInfor, $this->request->getData());
            if ($this->SkinInfors->save($skinInfor)) {
                $this->Flash->success(__('The skin infor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The skin infor could not be saved. Please, try again.'));
        }
        $users = $this->SkinInfors->Users->find('list', ['limit' => 200])->all();
        $skins = $this->SkinInfors->Skins->find('list', ['limit' => 200])->all();
        $gachaLogs = $this->SkinInfors->GachaLogs->find('list', ['limit' => 200])->all();
        $this->set(compact('skinInfor', 'users', 'skins', 'gachaLogs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Skin Infor id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $skinInfor = $this->SkinInfors->get($id);
        if ($this->SkinInfors->delete($skinInfor)) {
            $this->Flash->success(__('The skin infor has been deleted.'));
        } else {
            $this->Flash->error(__('The skin infor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getSkinInfor($userid = null){

        $this->loadModel('SkinInfors');

        $message = null; 
        $skininfors = null;

        if($userid != null){
            $skininfors = $this->SkinInfors->find()
                ->where(['user_id'=>$userid])
                ->contain(['Skins']);
                
            if($skininfors != null){
                $message = "weponInformations!";
            }
            else{
                $message = "no weponinformations!!";
            }
        }
        else{
            $message = "no user received!";
        }

        $this->set(compact('message','skininfors'));
        $this->viewBuilder()->setClassName('Json')->setOption('serialize', ['skininfors','message']);
        
    }

}
