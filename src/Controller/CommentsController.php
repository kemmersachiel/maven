<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

/**
 * Comments Controller
 *
 * @property \App\Model\Table\CommentsTable $Comments
 *
 * @method \App\Model\Entity\Comment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Posts']
        ];
        $comments = $this->paginate($this->Comments);

        $this->set(compact('comments'));
    }

    /**
     * View method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comment = $this->Comments->get($id, [
            'contain' => ['Users', 'Posts']
        ]);

        $this->set('comment', $comment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comment = $this->Comments->newEntity();
        if ($this->request->is('post')) {
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        // $users = $this->Comments->Users->find('list', ['limit' => 200]);
        $posts = $this->Comments->Posts->find('list', ['limit' => 200]);
        $this->set(compact('comment', 'posts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comment = $this->Comments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        // $users = $this->Comments->Users->find('list', ['limit' => 200]);
        $posts = $this->Comments->Posts->find('list', ['limit' => 200]);
        $this->set(compact('comment', 'posts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comment = $this->Comments->get($id);
        if ($this->Comments->delete($comment)) {
            $this->Flash->success(__('The comment has been deleted.'));
        } else {
            $this->Flash->error(__('The comment could not be deleted. Please, try again.'));
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
