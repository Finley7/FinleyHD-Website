<?php
/**
 * -------------------
 * PlusserM
 * -------------------
 * File: UsersController.php
 * -------------------
 * By Finley Siebert
 * Copyright 2017
 * -------------------
 */

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;

/**
 * @property \App\Model\Table\UsersTable Users
 */
class UsersController extends AppController
{
    /**
     * @param Event $event CakePHP Event
     *
     * @return \Cake\Network\Response|null
     */
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['add', 'logout', 'forgot']);

        if ($this->request->action == 'login' || $this->request->action == 'add' || $this->request->action == 'forgot') {
            if ($this->Auth->user()) {
                $this->Flash->error(__('You are already logged in'));

                return $this->redirect(['controller' => 'Pages', 'action' => 'index']);
            }
        }
    }


    /**
     * @return void
     */
    public function index()
    {
        $user = $this->Users->get($this->Auth->user('id'));
        $this->set(compact('user'));
    }


    /**
     * @return \Cake\Network\Response|null
     */
    public function login()
    {
        if ($this->request->is('post')) {

            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);

                return $this->redirect(['controller' => 'Blogs', 'action' => 'index']);

            } else {

                $this->Flash->error(__('Sorry, provided data is incorrect'));
            }

        }
    }

    /**
     * @return \Cake\Network\Response|null
     */
    public function add()
    {
        $user = $this->Users->newEntity(['associated' => ['Roles']]);

        if ($this->request->is('post')) {

            $this->request->data['primary_role'] = [1];

            $user = $this->Users->patchEntity($user, $this->request->data, ['associated' => ['Roles']]);

            if ($this->Users->save($user, ['associated' => ['Roles']])) {

                $this->Flash->success(__('Your account has been created, you can now log in'));
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);

            } else {

                $this->Flash->error(__('Something went wrong while registering your account'));

            }

        }

        $this->set(compact('user'));
    }
}
