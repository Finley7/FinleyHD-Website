<div class="row">
    <div class="medium-12 columns">
        <h1><?= __('Create an account'); ?></h1>
        <p><?= __('Hey, before you can start creating content we need some information first. We can not just give permissions to everybody!'); ?></p>

        <?= $this->Form->create($user); ?>
            <fieldset class="input-group">
                <?= $this->Form->input('username'); ?>
            </fieldset>
            <fieldset class="input-group">
                <?= $this->Form->input('email'); ?>
            </fieldset>
            <fieldset class="input-group">
                <?= $this->Form->input('password'); ?>
                <?= $this->Form->input('password_verify', ['type' => 'password']); ?>
            </fieldset>
            <?= $this->Form->submit(__('Create my account'), ['class' => 'button']); ?>
        <?= $this->Form->end(); ?>
    </div>
</div>