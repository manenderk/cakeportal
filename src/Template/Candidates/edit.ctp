<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Candidate $candidate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $candidate->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Candidates'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="candidates form large-9 medium-8 columns content">
    <?= $this->Form->create($candidate) ?>
    <fieldset>
        <legend><?= __('Edit Candidate') ?></legend>
        <?php
            echo $this->Form->control('salutation');
            echo $this->Form->control('candidate_first_name');
            echo $this->Form->control('candidate_middle_name');
            echo $this->Form->control('candidate_last_name');
            echo $this->Form->control('candidate_email');
            echo $this->Form->control('password');
            echo $this->Form->control('candidate_alternate_email');
            echo $this->Form->control('candidate_phone');
            echo $this->Form->control('area_code1');
            echo $this->Form->control('area_code2');
            echo $this->Form->control('dob');
            echo $this->Form->control('gender');
            echo $this->Form->control('current_location');
            echo $this->Form->control('nationality');
            echo $this->Form->control('ssn_no');
            echo $this->Form->control('visa_status');
            echo $this->Form->control('candidate_street');
            echo $this->Form->control('candidate_city');
            echo $this->Form->control('candidate_state');
            echo $this->Form->control('candidate_country');
            echo $this->Form->control('candidate_zipcode');
            echo $this->Form->control('contact_no_alternate');
            echo $this->Form->control('total_it_experience');
            echo $this->Form->control('total_overall_experience');
            echo $this->Form->control('key_skills');
            echo $this->Form->control('specialization');
            echo $this->Form->control('current_job_title');
            echo $this->Form->control('current_employer');
            echo $this->Form->control('expected_salary');
            echo $this->Form->control('current_salary');
            echo $this->Form->control('current_salary_code');
            echo $this->Form->control('expected_salary_code');
            echo $this->Form->control('twitterid');
            echo $this->Form->control('skypeid');
            echo $this->Form->control('candidate_description');
            echo $this->Form->control('resume');
            echo $this->Form->control('cover_letter');
            echo $this->Form->control('other_files');
            echo $this->Form->control('profile_pic');
            echo $this->Form->control('candidate_submitted_by');
            echo $this->Form->control('candidate_modified_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
