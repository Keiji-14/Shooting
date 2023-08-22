<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Stages Controller
 *
 * @property \App\Model\Table\StagesTable $Stages
 * @method \App\Model\Entity\Stage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $stages = $this->paginate($this->Stages);

        $this->set(compact('stages'));
    }

    /**
     * View method
     *
     * @param string|null $id Stage id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stage = $this->Stages->get($id, [
            'contain' => ['PlayLogs'],
        ]);

        $this->set(compact('stage'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stage = $this->Stages->newEmptyEntity();
        if ($this->request->is('post')) {
            $stage = $this->Stages->patchEntity($stage, $this->request->getData());
            if ($this->Stages->save($stage)) {
                $this->Flash->success(__('The stage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stage could not be saved. Please, try again.'));
        }
        $this->set(compact('stage'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stage id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stage = $this->Stages->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stage = $this->Stages->patchEntity($stage, $this->request->getData());
            if ($this->Stages->save($stage)) {
                $this->Flash->success(__('The stage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stage could not be saved. Please, try again.'));
        }
        $this->set(compact('stage'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stage id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stage = $this->Stages->get($id);
        if ($this->Stages->delete($stage)) {
            $this->Flash->success(__('The stage has been deleted.'));
        } else {
            $this->Flash->error(__('The stage could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function startGame()
    {

        $message = null;
        
        $this->loadModel('Stages');
        $stage = $this->Stages->find()->where(['stage_level' => 1])->first();

        if ($stage == null) {
            $message = "stage not found!";
        }

        if($stage != null){
            $message = "stage found!";
        }

        $this->set(compact('message','stage'));
        $this->viewBuilder()->setClassName('Json')->setOption('serialize', ['stage','message']);
     
    }

    public function nextStage($stageLevel = null)
    {

        $message = null;
        $stage = null;
        $stagecount = 3;
        
        $this->loadModel('Stages');     
        if($stageLevel < $stagecount){
            $stageLevel ++;
            $stage = $this->Stages->find()->where(['stage_level' => $stageLevel])->first();
        }
        
        if ($stage == null) {
            $message = "stage not found!";
        }

        if($stage != null){
            $message = "stage found!";
        }

        $this->set(compact('message','stage'));
        $this->viewBuilder()->setClassName('Json')->setOption('serialize', ['stage','message']);
     
    }
}
