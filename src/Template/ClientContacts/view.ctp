<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClientContact $clientContact
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Client Contact'), ['action' => 'edit', $clientContact->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Client Contact'), ['action' => 'delete', $clientContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientContact->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Client Contacts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client Contact'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clientContacts view large-9 medium-8 columns content">
    <h3><?= h($clientContact->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= $clientContact->has('client') ? $this->Html->link($clientContact->client->name, ['controller' => 'Clients', 'action' => 'view', $clientContact->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $clientContact->has('user') ? $this->Html->link($clientContact->user->Array, ['controller' => 'Users', 'action' => 'view', $clientContact->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($clientContact->id) ?></td>
        </tr>
    </table>
</div>
