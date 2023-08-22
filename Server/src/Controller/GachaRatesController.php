<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * GachaRates Controller
 *
 * @property \App\Model\Table\GachaRatesTable $GachaRates
 * @method \App\Model\Entity\GachaRate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GachaRatesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Skins', 'Weapons', 'Gachas'],
        ];
        $gachaRates = $this->paginate($this->GachaRates);

        $this->set(compact('gachaRates'));
    }

    /**
     * View method
     *
     * @param string|null $id Gacha Rate id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gachaRate = $this->GachaRates->get($id, [
            'contain' => ['Skins', 'Weapons', 'Gachas'],
        ]);

        $this->set(compact('gachaRate'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gachaRate = $this->GachaRates->newEmptyEntity();
        if ($this->request->is('post')) {
            $gachaRate = $this->GachaRates->patchEntity($gachaRate, $this->request->getData());
            if ($this->GachaRates->save($gachaRate)) {
                $this->Flash->success(__('The gacha rate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gacha rate could not be saved. Please, try again.'));
        }
        $skins = $this->GachaRates->Skins->find('list', ['limit' => 200])->all();
        $weapons = $this->GachaRates->Weapons->find('list', ['limit' => 200])->all();
        $gachas = $this->GachaRates->Gachas->find('list', ['limit' => 200])->all();
        $this->set(compact('gachaRate', 'skins', 'weapons', 'gachas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Gacha Rate id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gachaRate = $this->GachaRates->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gachaRate = $this->GachaRates->patchEntity($gachaRate, $this->request->getData());
            if ($this->GachaRates->save($gachaRate)) {
                $this->Flash->success(__('The gacha rate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The gacha rate could not be saved. Please, try again.'));
        }
        $skins = $this->GachaRates->Skins->find('list', ['limit' => 200])->all();
        $weapons = $this->GachaRates->Weapons->find('list', ['limit' => 200])->all();
        $gachas = $this->GachaRates->Gachas->find('list', ['limit' => 200])->all();
        $this->set(compact('gachaRate', 'skins', 'weapons', 'gachas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gacha Rate id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gachaRate = $this->GachaRates->get($id);
        if ($this->GachaRates->delete($gachaRate)) {
            $this->Flash->success(__('The gacha rate has been deleted.'));
        } else {
            $this->Flash->error(__('The gacha rate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
