<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JobTitle $jobTitle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $jobTitle->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $jobTitle->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Job Titles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="jobTitles form large-9 medium-8 columns content">
    <?= $this->Form->create($jobTitle) ?>
    <fieldset>
        <legend><?= __('Edit Job Title') ?></legend>
        <?php
            echo $this->Form->control('job_title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
