<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

/**
 * Tags Controller
 *
 * @property \App\Model\Table\TagsTable $Tags
 *
 * @method \App\Model\Entity\Tag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TagsController extends AppController
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
        $tags = $this->paginate($this->Tags);

        $this->set(compact('tags'));
    }

    /**
     * View method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tag = $this->Tags->get($id, [
            'contain' => ['Users', 'Posts']
        ]);

        $this->set('tag', $tag);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tag = $this->Tags->newEntity();
        if ($this->request->is('post')) {
            $tag = $this->Tags->patchEntity($tag, $this->request->getData());
            if ($this->Tags->save($tag)) {
                $this->Flash->success(__('The tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tag could not be saved. Please, try again.'));
        }
        // $users = $this->Tags->Users->find('list', ['limit' => 200]);
        $posts = $this->Tags->Posts->find('list', ['limit' => 200]);
        $this->set(compact('tag', 'posts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tag = $this->Tags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tag = $this->Tags->patchEntity($tag, $this->request->getData());
            if ($this->Tags->save($tag)) {
                $this->Flash->success(__('The tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tag could not be saved. Please, try again.'));
        }
        // $users = $this->Tags->Users->find('list', ['limit' => 200]);
        $posts = $this->Tags->Posts->find('list', ['limit' => 200]);
        $this->set(compact('tag', 'posts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tag id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tag = $this->Tags->get($id);
        if ($this->Tags->delete($tag)) {
            $this->Flash->success(__('The tag has been deleted.'));
        } else {
            $this->Flash->error(__('The tag could not be deleted. Please, try again.'));
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
