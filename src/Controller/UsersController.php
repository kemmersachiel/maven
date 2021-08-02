<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        //you must be an admin to view all users
        if ($this->Auth->user('role') == 'regular') {
            return $this->redirect(['controller' => 'users', 'action' => 'dashboard', $this->Flash->error('You are not an admin, you can\'t access that page!')]);
        }

        $users = $this->paginate($this->Users);
        
        $this->set(compact('users'));
    }

    public function dashboard()
    {
        $this->paginate = [
            'contains' => [
                'Users' => $this->Auth->user('id'),
                ]
            ];
        $this->set('users', $this->paginate($this->Users));
        $this->viewOptions('serialize', ['users']);
        // $this->viewBuilder()->setOption('serialize', ['users']); //migration 4.2.0
    }

    public function account()
    {
        
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Comments', 'Posts', 'Tags']
        ]);
        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //you must be an admin to add other users
        if ($this->Auth->user('role') == 'regular') {
            return $this->redirect(['controller' => 'users', 'action' => 'dashboard', $this->Flash->error('You are not an admin, you can\'t add users!')]);
        }
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        //you must be an admin to edit other users
        if (($this->Auth->user('role') != 'admin') && ($this->Auth->user('id') != $id)) {
            return $this->redirect(['controller' => 'users', 'action' => 'dashboard', $this->Flash->error('You are not an admin, you can\'t edit users!')]);
        }
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //you must be an admin to delete a user
        if (($this->Auth->user('role') != 'admin') && ($this->Auth->user('id') != $id)) {
            return $this->redirect(['controller' => 'users', 'action' => 'dashboard', $this->Flash->error('You are not an admin, you can\'t delete users!')]);
        }
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //Login
    public function login()
    {
        //if user is already logged in, then go to dashboard
        if($this->Auth->User()){
            return $this->redirect(['controller' => 'users', 'action' => 'dashboard', $this->Flash->error('Hello '.$this->Auth->User('name').', you are already logged in!')]);
        }
       if($this->request->is('post')){
           $user = $this->Auth->identify();
           if($user){
               $this->Auth->setUser($user);
               //these are set and sent as $variables to view template
               $this->set('logged_in', $this->Auth->isAuthorized());
               $this->set('current_user', $this->Auth->User());
               $this->Flash->success('Welcome '.$this->Auth->User('name'));
               return $this->redirect($this->Auth->redirectUrl());
           }
           $this->Flash->error('Your username or pasword is incorrect.');
       }
   }

   //Logout
   public function logout()
   {
           $this->Flash->success('You are logged out');
           return $this->redirect($this->Auth->logout());
   }

   //Register
   public function register()
   {
       //if user is already registered, then go to dashboard
       if($this->Auth->User()){
           return $this->redirect(['controller' => 'users', 'action' => 'dashboard', $this->Flash->set('Hello '.$this->Auth->User('name').', you are registered and your account is active!')]);
       }
       $user = $this->Users->newEntity();
       if($this->request->is('post')){
           $user = $this->Users->patchEntity($user, $this->request->getData());
           if($this->Users->save($user)){
               $this->Flash->success('You are registered and can login');
               return $this->redirect(['action' => 'login']);
           } else {
               $this->Flash->error('You are not registered, please try again!');
           }
       }
       $this->set(compact('user'));
       $this->set('_serialize', ['users']);
   }

   //added to allow logged in users access
   public function isAuthorized($user)
   {
       return true;
   }

   public function initialize(): void
   {
       parent::initialize();
       //deprecated
       $this->Auth->allow(['logout']);
   }

   public function beforeRender(EventInterface $event) {
    parent :: beforeRender($event);
    // $this->layout = 'mavenlayout'; //deprecated
    // set or change layout to arrays of actions/pages
    $action = $this->request->getParam('action');
    if (in_array($action, ['add', 'index', 'edit', 'view'])) {
    $this->viewBuilder()->setLayout('default');
    }
    }
   public function beforeFilter(EventInterface $event)
   {
       parent :: beforeFilter($event);
       $this->Auth->deny();  
       $this->Auth->allow(['register']);
       // set or change layout to arrays of actions/pages
       $action = $this->request->getParam('action');
       if (in_array($action, ['add', 'index', 'edit', 'view'])) {
           $this->viewBuilder()->setLayout('default');
       }
   }
}
