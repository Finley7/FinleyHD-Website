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
    public function beforeFilter(Event $event) {
        $this->Auth->allow(['add', 'logout', 'forgot']);

        if ($this->request->action == 'login' || $this->request->action == 'add' || $this->request->action == 'forgot') {
            if ($this->Auth->user()) {
                $this->Flash->error(__('You are already logged in'));
                return $this->redirect([
                    'controller' => 'Pages',
                    'action' => 'index'
                ]);
            }
        }
    }


    public function index()
    {

    }


    /**
     * @return \Cake\Network\Response|null
     */
    public function login()
    {

        if($this->request->is('post'))
        {
            if($this->request->data['passCode'] == Configure::read('App.passCode'))
            {
                $user = $this->Auth->identify();

                if ( $user ) {
                    $this->Auth->setUser($user);
                    return $this->redirect(['controller' => 'Blogs', 'action' => 'index']);
                }
                else {
                    $this->Flash->error(__('Sorry, provided data is incorrect'));
                }
            }
        }
        
        $this->set(serialize('response'));
    }
}