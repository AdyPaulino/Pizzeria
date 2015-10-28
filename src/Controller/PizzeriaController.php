<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pizzeria Controller
 *
 * @property \App\Model\Table\PizzeriaTable $Pizzeria
 */
class PizzeriaController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('pizzeria', $this->paginate($this->Pizzeria));
        $this->set('_serialize', ['pizzeria']);
    }

    /**
     * View method
     *
     * @param string|null $id Pizzerium id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pizzerium = $this->Pizzeria->get($id, [
            'contain' => []
        ]);
        $this->set('pizzerium', $pizzerium);
        $this->set('_serialize', ['pizzerium']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pizzerium = $this->Pizzeria->newEntity();
        if ($this->request->is('post')) {
            $pizzerium = $this->Pizzeria->patchEntity($pizzerium, $this->request->data);
            if ($this->Pizzeria->save($pizzerium)) {
                $this->Flash->success(__('The pizzerium has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pizzerium could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pizzerium'));
        $this->set('_serialize', ['pizzerium']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pizzerium id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pizzerium = $this->Pizzeria->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pizzerium = $this->Pizzeria->patchEntity($pizzerium, $this->request->data);
            if ($this->Pizzeria->save($pizzerium)) {
                $this->Flash->success(__('The pizzerium has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pizzerium could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pizzerium'));
        $this->set('_serialize', ['pizzerium']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pizzerium id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pizzerium = $this->Pizzeria->get($id);
        if ($this->Pizzeria->delete($pizzerium)) {
            $this->Flash->success(__('The pizzerium has been deleted.'));
        } else {
            $this->Flash->error(__('The pizzerium could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
