<div class="externalRequests index">
	<h2><?php echo __('External Requests'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('reference_application'); ?></th>
			<th><?php echo $this->Paginator->sort('office_id'); ?></th>
			<th><?php echo $this->Paginator->sort('department_id'); ?></th>
			<th><?php echo $this->Paginator->sort('administration_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('external_beneficiary_id'); ?></th>
			<th><?php echo $this->Paginator->sort('provider_id'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th><?php echo $this->Paginator->sort('currency_id'); ?></th>
			<th><?php echo $this->Paginator->sort('amount_in_words'); ?></th>
			<th><?php echo $this->Paginator->sort('payment_details'); ?></th>
			<th><?php echo $this->Paginator->sort('proposal_value'); ?></th>
			<th><?php echo $this->Paginator->sort('proposal_invoice_number'); ?></th>
			<th><?php echo $this->Paginator->sort('proforma_invoice'); ?></th>
			<th><?php echo $this->Paginator->sort('original_invoice'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($externalRequests as $externalRequest): ?>
	<tr>
		<td><?php echo h($externalRequest['ExternalRequest']['id']); ?>&nbsp;</td>
		<td><?php echo h($externalRequest['ExternalRequest']['reference_application']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($externalRequest['Office']['nome'], array('controller' => 'offices', 'action' => 'view', $externalRequest['Office']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($externalRequest['Department']['label'], array('controller' => 'departments', 'action' => 'view', $externalRequest['Department']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($externalRequest['Administration']['label'], array('controller' => 'administrations', 'action' => 'view', $externalRequest['Administration']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($externalRequest['User']['name'], array('controller' => 'users', 'action' => 'view', $externalRequest['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($externalRequest['ExternalBeneficiary']['name'], array('controller' => 'external_beneficiaries', 'action' => 'view', $externalRequest['ExternalBeneficiary']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($externalRequest['Provider']['name'], array('controller' => 'providers', 'action' => 'view', $externalRequest['Provider']['id'])); ?>
		</td>
		<td><?php echo h($externalRequest['ExternalRequest']['amount']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($externalRequest['Currency']['label'], array('controller' => 'currencies', 'action' => 'view', $externalRequest['Currency']['id'])); ?>
		</td>
		<td><?php echo h($externalRequest['ExternalRequest']['amount_in_words']); ?>&nbsp;</td>
		<td><?php echo h($externalRequest['ExternalRequest']['payment_details']); ?>&nbsp;</td>
		
		<td><?php echo h($externalRequest['ExternalRequest']['created']); ?>&nbsp;</td>
		<td><?php echo h($externalRequest['ExternalRequest']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $externalRequest['ExternalRequest']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $externalRequest['ExternalRequest']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $externalRequest['ExternalRequest']['id']), array(), __('Are you sure you want to delete # %s?', $externalRequest['ExternalRequest']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New External Request'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Offices'), array('controller' => 'offices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Office'), array('controller' => 'offices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Administrations'), array('controller' => 'administrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Administration'), array('controller' => 'administrations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List External Beneficiaries'), array('controller' => 'external_beneficiaries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New External Beneficiary'), array('controller' => 'external_beneficiaries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Providers'), array('controller' => 'providers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Provider'), array('controller' => 'providers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Currencies'), array('controller' => 'currencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Currency'), array('controller' => 'currencies', 'action' => 'add')); ?> </li>
	</ul>
</div>
