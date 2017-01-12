<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;

/**
 * Class PagesController
 * @package App\Controller
 */
class PagesController extends AppController
{

    /**
     * @param Event $event CakePHP Event
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['index']);
    }

    /**
     * @return void
     */
    public function index()
    {
        $page = $this->Pages->get(Configure::read('App.defaultPageId'));

        $this->set(compact('page'));
    }
}
