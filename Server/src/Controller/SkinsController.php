<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Skins Controller
 *
 * @property \App\Model\Table\SkinsTable $Skins
 * @method \App\Model\Entity\Skin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SkinsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $skins = $this->paginate($this->Skins);

        $this->set(compact('skins'));
    }

    /**
     * View method
     *
     * @param string|null $id Skin id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $skin = $this->Skins->get($id, [
            'contain' => ['GachaLogs', 'GachaRates', 'PlayLogs', 'SkinInfors'],
        ]);

        $this->set(compact('skin'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $skin = $this->Skins->newEmptyEntity();
        if ($this->request->is('post')) {
            $skin = $this->Skins->patchEntity($skin, $this->request->getData());
            if ($this->Skins->save($skin)) {
                $this->Flash->success(__('The skin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The skin could not be saved. Please, try again.'));
        }
        $this->set(compact('skin'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Skin id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $skin = $this->Skins->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $skin = $this->Skins->patchEntity($skin, $this->request->getData());
            if ($this->Skins->save($skin)) {
                $this->Flash->success(__('The skin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The skin could not be saved. Please, try again.'));
        }
        $this->set(compact('skin'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Skin id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $skin = $this->Skins->get($id);
        if ($this->Skins->delete($skin)) {
            $this->Flash->success(__('The skin has been deleted.'));
        } else {
            $this->Flash->error(__('The skin could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
