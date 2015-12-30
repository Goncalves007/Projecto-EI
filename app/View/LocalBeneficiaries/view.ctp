<div class="localBeneficiaries view">
<h2><?php echo __('Local Beneficiary'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($localBeneficiary['LocalBeneficiary']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($localBeneficiary['LocalBeneficiary']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo $this->Html->link($localBeneficiary['Department']['label'], array('controller' => 'departments', 'action' => 'view', $localBeneficiary['Department']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Local Beneficiary'), array('action' => 'edit', $localBeneficiary['LocalBeneficiary']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Local Beneficiary'), array('action' => 'delete', $localBeneficiary['LocalBeneficiary']['id']), array(), __('Are you sure you want to delete # %s?', $localBeneficiary['LocalBeneficiary']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Local Beneficiaries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local Beneficiary'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Internal Requests'), array('controller' => 'internal_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Internal Request'), array('controller' => 'internal_requests', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Internal Requests'); ?></h3>
	<?php if (!empty($localBeneficiary['InternalRequest'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Reference Application'); ?></th>
		<th><?php echo __('Office Id'); ?></th>
		<th><?php echo __('Department Id'); ?></th>
		<th><?php echo __('Administration Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Local Beneficiary Id'); ?></th>
		<th><?php echo __('Provider Id'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Currency Id'); ?></th>
		<th><?php echo __('Amount In Words'); ?></th>
		<th><?php echo __('Payment Details'); ?></th>
		<th><?php echo __('Invoice'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($localBeneficiary['InternalRequest'] as $internalRequest): ?>
		<tr>
			<td><?php echo $internalRequest['id']; ?></td>
			<td><?php echo $internalRequest['reference_application']; ?></td>
			<td><?php echo $internalRequest['office_id']; ?></td>
			<td><?php echo $internalRequest['department_id']; ?></td>
			<td><?php echo $internalRequest['administration_id']; ?></td>
			<td><?php echo $internalRequest['user_id']; ?></td>
			<td><?php echo $internalRequest['local_beneficiary_id']; ?></td>
			<td><?php echo $internalRequest['provider_id']; ?></td>
			<td><?php echo $internalRequest['amount']; ?></td>
			<td><?php echo $internalRequest['currency_id']; ?></td>
			<td><?php echo $internalRequest['amount_in_words']; ?></td>
			<td><?php echo $internalRequest['payment_details']; ?></td>
			<td><?php echo $internalRequest['invoice']; ?></td>
			<td><?php echo $internalRequest['created']; ?></td>
			<td><?php echo $internalRequest['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'internal_requests', 'action' => 'view', $internalRequest['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'internal_requests', 'action' => 'edit', $internalRequest['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'internal_requests', 'action' => 'delete', $internalRequest['id']), array(), __('Are you sure you want to delete # %s?', $internalRequest['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Internal Request'), array('controller' => 'internal_requests', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
