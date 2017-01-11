<?php
/**
 * -------------------
 * PlusserM
 * -------------------
 * File: SlugsController.php
 * -------------------
 * By Finley Siebert
 * Copyright 2017
 * -------------------
 */

namespace App\Controller;


/**
 * @property \App\Model\Table\SlugsTable Slugs
 * */

use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class SlugsController extends AppController
{

    public function beforeFilter ( Event $event )
    {
        $this->Auth->allow(['view']);
    }

    public function view($slug)
    {
        $content = $this->Slugs->findByName($slug)->first();

        if(is_null($content))
        {
            throw new NotFoundException();
        }


        $page = $this->Slugs->Pages->get($content->page_id);

        if(is_null($page))
        {
            throw new NotFoundException();
        }

        if($page->min_role > 0)
        {
            if(!$this->Auth->user() || $this->Auth->user('primary_role') <= $page->min_role)
            {
                return $this->redirect($this->referer());
            }
        }

       $this->set(['page' => $page]);
    }
}