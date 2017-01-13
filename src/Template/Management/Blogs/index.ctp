<div class="row">
    <div class="medium-12 columns">
        <div class="panel">
            <div class="panel-body">
                <?= $this->Html->link(__('Add blog article'), [], ['class' => 'success button add pull-right']); ?>
                <h1><?= __('Blog management'); ?></h1>
                <p class="text-muted"><?= __('Manage your blog articles here'); ?></p>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?= __('Title'); ?></th>
                            <th><?= __('Slug'); ?></th>
                            <th><?= __('Author'); ?></th>
                            <th><?= __('Category'); ?></th>
                            <th><?= __('Min role'); ?></th>
                            <th><?= __('Created'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(!is_null($blogs)): ?>
                        <?php foreach($blogs as $blog): ?>
                            <tr>

                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>