<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

   public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                //set user
                $session = $this->request->session(); 
                $session->write('user_id', $user);
                
                //set customer variable    
                $this->loadModel('Customers');
                $res = $this->Customers->find()->where(['user' => $user['id']]);
                $data = $res->toArray();
                $session->write('customer_id',  $data[0]['id']);
                
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        $this->request->session()->destroy();
        return $this->redirect($this->Auth->logout());
    }

     public function index()
     {
        $this->set('users', $this->Users->find('all'));
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $session = $this->request->session(); 
                $session->write('user_id', $user);
                
                return $this->addCustomer();
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }
    
    public function addCustomer(){
        //add user
        //$session = $this->request->session(); 
       // $session->write('user_id', $user);
        //verify if there is a customer related to this user
        //return $this->Customers->exists(['customer' => $userId]);
        
        return $this->redirect(['controller'=>'customers', 'action' => 'add']);
    }
}
