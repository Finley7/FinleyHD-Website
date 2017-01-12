<div class="row">
    <div class="medium-12 columns">
        <h1><?= __('Log into your account'); ?></h1>
        <p><?= __('If you have an username and password, you can login. If you like.'); ?></p>

        <?= $this->Form->create(); ?>
        <fieldset class="input-group">
            <?= $this->Form->input('username'); ?>
            <?= $this->Form->input('password'); ?>
        </fieldset>
        <?= $this->Form->submit(__('Log in'), ['class' => 'button']); ?>
        <?= $this->Form->end(); ?>
    </div>
</div>