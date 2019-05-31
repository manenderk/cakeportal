<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Candidate $candidate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Candidate'), ['action' => 'edit', $candidate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Candidate'), ['action' => 'delete', $candidate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Candidates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Candidate'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="candidates view large-9 medium-8 columns content">
    <h3><?= h($candidate->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Salutation') ?></th>
            <td><?= h($candidate->salutation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate First Name') ?></th>
            <td><?= h($candidate->candidate_first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate Middle Name') ?></th>
            <td><?= h($candidate->candidate_middle_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate Last Name') ?></th>
            <td><?= h($candidate->candidate_last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate Email') ?></th>
            <td><?= h($candidate->candidate_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($candidate->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate Alternate Email') ?></th>
            <td><?= h($candidate->candidate_alternate_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate Phone') ?></th>
            <td><?= h($candidate->candidate_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Area Code1') ?></th>
            <td><?= h($candidate->area_code1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Area Code2') ?></th>
            <td><?= h($candidate->area_code2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dob') ?></th>
            <td><?= h($candidate->dob) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($candidate->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Location') ?></th>
            <td><?= h($candidate->current_location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nationality') ?></th>
            <td><?= h($candidate->nationality) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ssn No') ?></th>
            <td><?= h($candidate->ssn_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate Street') ?></th>
            <td><?= h($candidate->candidate_street) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate City') ?></th>
            <td><?= h($candidate->candidate_city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate State') ?></th>
            <td><?= h($candidate->candidate_state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate Zipcode') ?></th>
            <td><?= h($candidate->candidate_zipcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact No Alternate') ?></th>
            <td><?= h($candidate->contact_no_alternate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total It Experience') ?></th>
            <td><?= h($candidate->total_it_experience) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Overall Experience') ?></th>
            <td><?= h($candidate->total_overall_experience) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Job Title') ?></th>
            <td><?= h($candidate->current_job_title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Employer') ?></th>
            <td><?= h($candidate->current_employer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expected Salary') ?></th>
            <td><?= h($candidate->expected_salary) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Salary') ?></th>
            <td><?= h($candidate->current_salary) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Twitterid') ?></th>
            <td><?= h($candidate->twitterid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Skypeid') ?></th>
            <td><?= h($candidate->skypeid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resume') ?></th>
            <td><?= h($candidate->resume) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cover Letter') ?></th>
            <td><?= h($candidate->cover_letter) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Other Files') ?></th>
            <td><?= h($candidate->other_files) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Profile Pic') ?></th>
            <td><?= h($candidate->profile_pic) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($candidate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visa Status') ?></th>
            <td><?= $this->Number->format($candidate->visa_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate Country') ?></th>
            <td><?= $this->Number->format($candidate->candidate_country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Salary Code') ?></th>
            <td><?= $this->Number->format($candidate->current_salary_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expected Salary Code') ?></th>
            <td><?= $this->Number->format($candidate->expected_salary_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate Submitted By') ?></th>
            <td><?= $this->Number->format($candidate->candidate_submitted_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Candidate Modified By') ?></th>
            <td><?= $this->Number->format($candidate->candidate_modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($candidate->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($candidate->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Key Skills') ?></h4>
        <?= $this->Text->autoParagraph(h($candidate->key_skills)); ?>
    </div>
    <div class="row">
        <h4><?= __('Specialization') ?></h4>
        <?= $this->Text->autoParagraph(h($candidate->specialization)); ?>
    </div>
    <div class="row">
        <h4><?= __('Candidate Description') ?></h4>
        <?= $this->Text->autoParagraph(h($candidate->candidate_description)); ?>
    </div>
</div>
