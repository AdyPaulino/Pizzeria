<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 */
class CustomersController extends AppController
{
    
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->set(compact('customers'));
        $customer = $this->Customers->newEntity();
        $this->$customer;
    }

    public function index()
    {
        $customer = $this->Customers->newEntity();
        $this->$customer;
        //$this->set('customers', $this->Customers->find('all'));
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
        $this->set('customer', $customer);
        $this->set('_serialize', ['customer']);
    }
    

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['province'] = $this->getProvince($this->request->data['province']);
            $errorMsg = $this->validateFeedbackForm($this->request->data);
            $this->set('errorMsg', $errorMsg);
            
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
           /* if ($this->Customers->save($customer)) {
                $this->Flash->success(__('Your customer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } 
            $this->Flash->error(__('Unable to add your customer.')); */
        }
        $this->set('customer', $customer);
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
     * @param string|null $id Customer id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->data);
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customer could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('customer'));
        $this->set('_serialize', ['customer']);
    }
    
    public function validateFeedbackForm($arr) {
        extract($arr);

        if(!isset($personName, $email, $phone, $street, $province, $city, $postalCode)) return;
        
        if(!$personName) {
          return "Please enter your name";
        }

       /* if(!$inputName) {
          return "Please enter your name";
        }
		
		if(!$inputPhone) {
          return "Please enter your telephone number";
        }
		
		if(!preg_match("/\w+@\w+\.\w+/", $inputEmail)) {
          return "Please enter a valid email address";
        }
		
		if(!$inputStreet) {
          return "Please enter your street number and street name";
        }
		
		if(!$selectProvince) {
          return "Please select your Province";
        }
		
		if(!$inputCity) {
          return "Please enter your City";
        }
		
		if(!preg_match("/[A-Z]{1}\d{1}[A-Z]{1}\s\d{1}[A-Z]{1}\d{1}/", $inputPostalCode)) {
          return "Please enter your Postal Code";
        } */

		//personalInformation($arr);
		
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
