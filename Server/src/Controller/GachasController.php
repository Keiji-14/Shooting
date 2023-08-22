<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Gachas Controller
 *
 * @property \App\Model\Table\GachasTable $Gachas
 * @method \App\Model\Entity\Gacha[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GachasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $gachas = $this->paginate($this->Gachas);

        $this->set(compact('gachas'));
    }

    /**
     * View method
     *
     * @param string|null $id Gacha id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gacha = $this->Gachas->get($id, [
            'contain' => ['GachaLogs', 'GachaRates'],
        ]);

        $this->set(compact('gacha'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gacha = $this->Gachas->newEmptyEntity();
        if ($this->request->is('post')) {
            $gacha = $this->Gachas->patchEntity($gacha, $this->request->getData());
            if ($this->Gachas->save($gacha)) {
                $this->Flash->success(__('The gacha has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gacha could not be saved. Please, try again.'));
        }
        $this->set(compact('gacha'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gacha id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gacha = $this->Gachas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gacha = $this->Gachas->patchEntity($gacha, $this->request->getData());
            if ($this->Gachas->save($gacha)) {
                $this->Flash->success(__('The gacha has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gacha could not be saved. Please, try again.'));
        }
        $this->set(compact('gacha'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gacha id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gacha = $this->Gachas->get($id);
        if ($this->Gachas->delete($gacha)) {
            $this->Flash->success(__('The gacha has been deleted.'));
        } else {
            $this->Flash->error(__('The gacha could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
