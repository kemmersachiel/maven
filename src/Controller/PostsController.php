<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 *
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Categories']
        ];
        //if user is admin
        if ($this->Auth->user('role') == 'admin'): 
            $posts = $this->paginate($this->Posts);
        //if user is publisher
        elseif ($this->Auth->user('role') == 'publisher'):
        // $c_user = $this->c_user;
        $posts = $this->paginate($this->Posts
        ->find()
        ->where(['user_id' => $this->Auth->user('id')])
        // ->where(['user_id' => $c_user])
        );
        endif;
        $this->set(compact('posts'));
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Users', 'Categories', 'Comments', 'PostTags', 'Tags']
        ]);

        $this->set('post', $post);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        // $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $categories = $this->Posts->Categories->find('list', ['limit' => 200]);
        $this->set(compact('post', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => []
            ]);    
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        // $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $categories = $this->Posts->Categories->find('list', ['limit' => 200]);
        $this->set(compact('post', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    

    //added to allow logged in users access
   public function isAuthorized($user)
   {
       return true;
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
       // set or change layout to arrays of actions/pages
       $action = $this->request->getParam('action');
       if (in_array($action, ['add', 'index', 'edit', 'view'])) {
           $this->viewBuilder()->setLayout('default');
           //you must be an admin to view all users
        if ($this->Auth->user('role') == 'regular') {
            return $this->redirect(['controller' => 'users', 'action' => 'dashboard', $this->Flash->error('You are not an admin, you can\'t access that page!')]);
        }
       }
   }
}
