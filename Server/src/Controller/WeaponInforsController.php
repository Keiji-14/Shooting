<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * WeaponInfors Controller
 *
 * @property \App\Model\Table\WeaponInforsTable $WeaponInfors
 * @method \App\Model\Entity\WeaponInfor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WeaponInforsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Weapons', 'GachaLogs'],
        ];
        $weaponInfors = $this->paginate($this->WeaponInfors);

        $this->set(compact('weaponInfors'));
    }

    /**
     * View method
     *
     * @param string|null $id Weapon Infor id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $weaponInfor = $this->WeaponInfors->get($id, [
            'contain' => ['Users', 'Weapons', 'GachaLogs'],
        ]);

        $this->set(compact('weaponInfor'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $weaponInfor = $this->WeaponInfors->newEmptyEntity();
        if ($this->request->is('post')) {
            $weaponInfor = $this->WeaponInfors->patchEntity($weaponInfor, $this->request->getData());
            if ($this->WeaponInfors->save($weaponInfor)) {
                $this->Flash->success(__('The weapon infor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weapon infor could not be saved. Please, try again.'));
        }
        $users = $this->WeaponInfors->Users->find('list', ['limit' => 200])->all();
        $weapons = $this->WeaponInfors->Weapons->find('list', ['limit' => 200])->all();
        $gachaLogs = $this->WeaponInfors->GachaLogs->find('list', ['limit' => 200])->all();
        $this->set(compact('weaponInfor', 'users', 'weapons', 'gachaLogs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Weapon Infor id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $weaponInfor = $this->WeaponInfors->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $weaponInfor = $this->WeaponInfors->patchEntity($weaponInfor, $this->request->getData());
            if ($this->WeaponInfors->save($weaponInfor)) {
                $this->Flash->success(__('The weapon infor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weapon infor could not be saved. Please, try again.'));
        }
        $users = $this->WeaponInfors->Users->find('list', ['limit' => 200])->all();
        $weapons = $this->WeaponInfors->Weapons->find('list', ['limit' => 200])->all();
        $gachaLogs = $this->WeaponInfors->GachaLogs->find('list', ['limit' => 200])->all();
        $this->set(compact('weaponInfor', 'users', 'weapons', 'gachaLogs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Weapon Infor id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $weaponInfor = $this->WeaponInfors->get($id);
        if ($this->WeaponInfors->delete($weaponInfor)) {
            $this->Flash->success(__('The weapon infor has been deleted.'));
        } else {
            $this->Flash->error(__('The weapon infor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
