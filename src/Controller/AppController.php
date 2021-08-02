<?php

declare(strict_types=1);
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
// use Cake\Event\Event; //deprecated
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry; //deprecated in 4.2

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => 'controller',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginRedirect' => array('controller' => 'Users', 'action' => 'index'),
            // 'logoutRedirect' => array('controller' => 'Users', 'action' => 'login'),
            // 'authError' => 'You can\'t access that page',
            'unauthorizedRedirect' => $this->referer() // If unauthorized, return them to page they were just on
        ]);
        // Allow the display action so our pages controller continues to work.
        $this->Auth->allow(
            ['index']
        );

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
    public function isAuthorized($user)
    {
        return false;
    }

    public function beforeRender(EventInterface $event)
    {
        parent::beforeRender($event);
        $this->viewBuilder()->setLayout('mavenlayout'); //migration for 4.2
    }

    public function beforeFilter(EventInterface $event)
    {
        $this->Auth->allow();
        //these are set and sent as $variables to all templates
        $this->set('logged_in', $this->Auth->isAuthorized());
        $this->set('current_user', $this->Auth->User());
        //these are set and sent as $variables to all controllers
        $this->logged_in = $this->Auth->isAuthorized();
        $this->current_user = $this->Auth->User();
        //this is the default layout view for all templates
        $this->viewBuilder()->setLayout('mavenlayout');

        //Reading Tables (result can be used anywhere in template view)
        $categoriesTable = TableRegistry::getTableLocator()->get('Categories');
        $postsTable = TableRegistry::getTableLocator()->get('Posts');

        $blogCategories = $categoriesTable->find('all', ['limit' => '4'])->order(['created' => 'ASC'])->toArray();
        $blogPosts = $postsTable->find('all', ['limit' => '4', 'contain' => ['categories']])->order(['Posts.id' => 'DESC'])->toArray();
        ;

        $this->c_user = $this->Auth->User('id');
        $c_user = $this->Auth->User('id');

        $user_role = (['' => 'Select Role', 'admin' => 'Administrator', 'publisher' => 'Publisher', 'regular' => 'Regular']);
        $this->set(compact('blogCategories', 'blogPosts', 'user_role', 'c_user'));
    }
}
