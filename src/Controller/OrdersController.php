<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 */
class OrdersController extends AppController
{
    
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->set(compact('orders'));
        $order = $this->Orders->newEntity();
        $this->$order;
    }

    public function index()
    {
        $order = $this->Orders->newEntity();
        $this->$order;
        //$this->set('orders', $this->Orders->find('all'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        $this->set('order', $order);
        $this->set('_serialize', ['order']);
    }
    

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            //add customer
            $session = $this->request->session();
            $this->request->data['customer'] = $session->read('user_id');
            //adding toppings as a string
            $toppings = '';
            foreach ($this->request->data['toppings'] as $row) {
                if (!empty($toppings)){
                    $toppings = $toppings.',';
                }
                $toppings = $toppings.$row;
            }
            $this->request->data['toppings'] = $toppings;
            
            $order = $this->Orders->patchEntity($order, $this->request->data);
           if ($this->Orders->save($order)) {
                $this->Flash->success(__('Your order has been saved.'));
                return $this->redirect(['action' => 'index']);
            } 
            $this->Flash->error(__('Unable to add your order.')); 
        }
        $this->set('order', $order);
        $this->request->session()->destroy();
    }
    
    private function getProvince($position){
        //$provinces = new array['QC', 'MB', 'ON', 'SK'];
        switch ($position){
            case 0:
                return 'QC';
             case 1:
                return 'MB';
             case 2:
                return 'ON';
             case 3:
                return 'SK';
             default:
                return '';
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('order'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
