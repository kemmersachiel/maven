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

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;


/**
 * Static content controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 *
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    // public function display(...$path)
    // {
    //     $count = count($path);
    //     if (!$count) {
    //         return $this->redirect('/');
    //     }
    //     if (in_array('..', $path, true) || in_array('.', $path, true)) {
    //         throw new ForbiddenException();
    //     }
    //     $page = $subpage = null;

    //     if (!empty($path[0])) {
    //         $page = $path[0];
    //     }
    //     if (!empty($path[1])) {
    //         $subpage = $path[1];
    //     }
    //     $this->set(compact('page', 'subpage'));

    //     try {
    //         $this->render(implode('/', $path));
    //     } catch (MissingTemplateException $exception) {
    //         if (Configure::read('debug')) {
    //             throw $exception;
    //         }
    //         throw new NotFoundException();
    //     }
    // }

    //Page content limit
    public $paginate = ['limit' => '20'];

    public function index($action)
    {
        $action =  $this->request->getParam('pass')['0'];
        $postsTable = TableRegistry::getTableLocator()->get('Posts');
        $categoriesTable = TableRegistry::getTableLocator()->get('Categories');

        if ($action == 'latestPost') {
            $latestPosts = $postsTable->find('all', ['limit' => '8', 'contain' => ['categories']])->where(['status' => 'approved'])->order(['Posts.id' => 'DESC'])->toArray();

            $this->set(compact('latestPosts'));
        }

        if ($action != 'latestPost') {
            if ($action != 'post') {
                $this->request->getSession()->write('secsCatName', null);
                $Id =  $this->request->getParam('pass')['1'];
                $latestPosts = $postsTable->find('all', ['limit' => '8', 'contain' => ['categories']])->where(['status' => 'approved', 'category_id' => $Id])->order(['Posts.id' => 'DESC'])->toArray();
            } else {
                $Id =  $this->request->getParam('pass')['1'];
                $latestPosts = $postsTable->find()->where(['status' => 'approved', 'id' => $Id])->toArray();
                foreach ($latestPosts as $latestPost) {
                    $secsCatName = $latestPost->category_id;
                    $secsCatName = $categoriesTable->find()->where(['id' => $secsCatName])->first();
                    $secsCatName = $secsCatName->category;
                    $this->request->getSession()->write('secsCatName', $secsCatName);
                }
            }
            $this->set(compact('latestPosts'));
        }
    }

    public function about()
    {
    }
    public function contact()
    {
    }
    public function advertise()
    {
    }

    //added to allow logged in users access
    public function isAuthorized($user)
    {
        return true;
    }
}
