<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'FinleyHD';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= isset($title) ? $title : $this->fetch( 'title' ) ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav>
        <ul>
            <li><?= $this->Html->link('Home', ['controller' => 'Pages', 'action' => 'index']); ?></li>
            <?php foreach($pages as $page): ?>
                <li><?= $this->Html->link($page->title, ['controller' => 'Slugs', 'action' => 'view', $page->slug->name]); ?></li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <?= $this->Flash->render() ?>
    <?= $this->Flash->render( 'auth' ) ?>

    <?= $this->fetch( 'content' ) ?>

    <?= $this->fetch( 'body' ); ?>
</body>
</html>
