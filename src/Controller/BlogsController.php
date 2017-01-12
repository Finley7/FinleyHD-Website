<?php
/**
 * -------------------
 * PlusserM
 * -------------------
 * File: BlogsController.php
 * -------------------
 * By Finley Siebert
 * Copyright 2017
 * -------------------
 */


/**
 * @property \App\Model\Table\BlogsTable Blogs
 */

namespace App\Controller;
use Cake\Event\Event;

/**
 * Class BlogsController
 * @package App\Controller
 */
class BlogsController extends AppController
{
    /**
     * @param Event $e CakePHP event
     */
    public function beforeFilter( Event $e)
    {
        $this->Auth->allow(['index', 'view']);
    }

    public function index()
    {

    }
}