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
        <?= isset( $title ) ? $title : $this->fetch( 'title' ) ?>
    </title>
    <?= $this->Html->meta( 'icon' ) ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/css/foundation.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <?= $this->Html->css( [
        'normalize.css', 'management.css'
    ] ); ?>

    <?= $this->fetch( 'meta' ) ?>
    <?= $this->fetch( 'css' ) ?>
    <?= $this->fetch( 'script' ) ?>
</head>
<body>
<div class="top-bar header">
    <div class="row">
        <div class="top-bar-left">
            <ul class="menu">
                <li class="menu-text">Finleyhd <span class="text-muted">~ Beheer</span></li>
            </ul>
        </div>
        <div class="top-bar-right">
            <ul class="menu">
                <li><?= $this->Html->link('Blog management', ['controller' => 'Blogs', 'action' => 'index'] ); ?></li>
                <li><?= $this->Html->link('User management', ['controller' => 'Blogs', 'action' => 'index'] ); ?></li>
                <li><?= $this->Html->link('Page management', ['controller' => 'Blogs', 'action' => 'index'] ); ?></li>

            </ul>
        </div>
    </div>

</div>


<?= $this->Flash->render() ?>
<?= $this->Flash->render( 'auth' ) ?>

<?= $this->fetch( 'content' ) ?>

<?= $this->fetch( 'body' ); ?>

<footer>
    <div class="row">
        <div class="medium-12 columns left-footer">
            <p>
                Copyright &copy; 2017 FinleyHD Beheer~ Alle rechten voorbehouden
            </p>
        </div>
    </div>
</footer>
</body>
</html>
