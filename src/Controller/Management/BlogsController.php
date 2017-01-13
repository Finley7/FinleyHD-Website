<?php
/**
 * -------------------
 * FHD2K17
 * -------------------
 * File: \Management\BlogsController.php
 * -------------------
 * By Finley Siebert
 * Copyright 2017
 * -------------------
 */

namespace App\Controller\Management;

/**
 * @property \App\Model\Table\BlogsTable Blogs
 */

use App\Controller\AppController;
use Cake\Event\Event;

class BlogsController extends AppController
{

    public function beforeRender ( Event $event )
    {
        $this->viewBuilder()->layout('management');
    }

    /**
     *
     */
    public function index()
    {
        $blogs = $this->Blogs->find('all', ['contain' => ['Category', 'Author']]);

        $this->set(compact('blogs'));
    }
}