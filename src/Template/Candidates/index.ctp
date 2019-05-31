<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Candidate[]|\Cake\Collection\CollectionInterface $candidates
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Candidate'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="candidates index large-9 medium-8 columns content">
    <h3><?= __('Candidates') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('salutation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate_first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate_middle_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate_last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate_alternate_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate_phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('area_code1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('area_code2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dob') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nationality') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ssn_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visa_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate_street') ?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate_city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate_state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate_country') ?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate_zipcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_no_alternate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_it_experience') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_overall_experience') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_job_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_employer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expected_salary') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_salary') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_salary_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expected_salary_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('twitterid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('skypeid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resume') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cover_letter') ?></th>
                <th scope="col"><?= $this->Paginator->sort('other_files') ?></th>
                <th scope="col"><?= $this->Paginator->sort('profile_pic') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate_submitted_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('candidate_modified_by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($candidates as $candidate): ?>
            <tr>
                <td><?= $this->Number->format($candidate->id) ?></td>
                <td><?= h($candidate->salutation) ?></td>
                <td><?= h($candidate->candidate_first_name) ?></td>
                <td><?= h($candidate->candidate_middle_name) ?></td>
                <td><?= h($candidate->candidate_last_name) ?></td>
                <td><?= h($candidate->candidate_email) ?></td>
                <td><?= h($candidate->password) ?></td>
                <td><?= h($candidate->candidate_alternate_email) ?></td>
                <td><?= h($candidate->candidate_phone) ?></td>
                <td><?= h($candidate->area_code1) ?></td>
                <td><?= h($candidate->area_code2) ?></td>
                <td><?= h($candidate->dob) ?></td>
                <td><?= h($candidate->gender) ?></td>
                <td><?= h($candidate->current_location) ?></td>
                <td><?= h($candidate->nationality) ?></td>
                <td><?= h($candidate->ssn_no) ?></td>
                <td><?= $this->Number->format($candidate->visa_status) ?></td>
                <td><?= h($candidate->candidate_street) ?></td>
                <td><?= h($candidate->candidate_city) ?></td>
                <td><?= h($candidate->candidate_state) ?></td>
                <td><?= $this->Number->format($candidate->candidate_country) ?></td>
                <td><?= h($candidate->candidate_zipcode) ?></td>
                <td><?= h($candidate->contact_no_alternate) ?></td>
                <td><?= h($candidate->total_it_experience) ?></td>
                <td><?= h($candidate->total_overall_experience) ?></td>
                <td><?= h($candidate->current_job_title) ?></td>
                <td><?= h($candidate->current_employer) ?></td>
                <td><?= h($candidate->expected_salary) ?></td>
                <td><?= h($candidate->current_salary) ?></td>
                <td><?= $this->Number->format($candidate->current_salary_code) ?></td>
                <td><?= $this->Number->format($candidate->expected_salary_code) ?></td>
                <td><?= h($candidate->twitterid) ?></td>
                <td><?= h($candidate->skypeid) ?></td>
                <td><?= h($candidate->resume) ?></td>
                <td><?= h($candidate->cover_letter) ?></td>
                <td><?= h($candidate->other_files) ?></td>
                <td><?= h($candidate->profile_pic) ?></td>
                <td><?= h($candidate->created) ?></td>
                <td><?= h($candidate->modified) ?></td>
                <td><?= $this->Number->format($candidate->candidate_submitted_by) ?></td>
                <td><?= $this->Number->format($candidate->candidate_modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $candidate->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $candidate->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $candidate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidate->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
