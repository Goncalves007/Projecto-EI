<div class="providers view">
<h2><?php echo __('Provider'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($provider['Provider']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($provider['Provider']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Provider'), array('action' => 'edit', $provider['Provider']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Provider'), array('action' => 'delete', $provider['Provider']['id']), array(), __('Are you sure you want to delete # %s?', $provider['Provider']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Providers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Provider'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List External Requests'), array('controller' => 'external_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New External Request'), array('controller' => 'external_requests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Internal Requests'), array('controller' => 'internal_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Internal Request'), array('controller' => 'internal_requests', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related External Requests'); ?></h3>
	<?php if (!empty($provider['ExternalRequest'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Reference Application'); ?></th>
		<th><?php echo __('Office Id'); ?></th>
		<th><?php echo __('Department Id'); ?></th>
		<th><?php echo __('Administration Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('External Beneficiary Id'); ?></th>
		<th><?php echo __('Provider Id'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Currency Id'); ?></th>
		<th><?php echo __('Amount In Words'); ?></th>
		<th><?php echo __('Payment Details'); ?></th>
		<th><?php echo __('Proposal Value'); ?></th>
		<th><?php echo __('Proposal Invoice Number'); ?></th>
		<th><?php echo __('Proforma Invoice'); ?></th>
		<th><?php echo __('Original Invoice'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($provider['ExternalRequest'] as $externalRequest): ?>
		<tr>
			<td><?php echo $externalRequest['id']; ?></td>
			<td><?php echo $externalRequest['reference_application']; ?></td>
			<td><?php echo $externalRequest['office_id']; ?></td>
			<td><?php echo $externalRequest['department_id']; ?></td>
			<td><?php echo $externalRequest['administration_id']; ?></td>
			<td><?php echo $externalRequest['user_id']; ?></td>
			<td><?php echo $externalRequest['external_beneficiary_id']; ?></td>
			<td><?php echo $externalRequest['provider_id']; ?></td>
			<td><?php echo $externalRequest['amount']; ?></td>
			<td><?php echo $externalRequest['currency_id']; ?></td>
			<td><?php echo $externalRequest['amount_in_words']; ?></td>
			<td><?php echo $externalRequest['payment_details']; ?></td>
			<td><?php echo $externalRequest['proposal_value']; ?></td>
			<td><?php echo $externalRequest['proposal_invoice_number']; ?></td>
			<td><?php echo $externalRequest['proforma_invoice']; ?></td>
			<td><?php echo $externalRequest['original_invoice']; ?></td>
			<td><?php echo $externalRequest['created']; ?></td>
			<td><?php echo $externalRequest['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'external_requests', 'action' => 'view', $externalRequest['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'external_requests', 'action' => 'edit', $externalRequest['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'external_requests', 'action' => 'delete', $externalRequest['id']), array(), __('Are you sure you want to delete # %s?', $externalRequest['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New External Request'), array('controller' => 'external_requests', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Internal Requests'); ?></h3>
	<?php if (!empty($provider['InternalRequest'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Reference Application'); ?></th>
		<th><?php echo __('Office Id'); ?></th>
		<th><?php echo __('Department Id'); ?></th>
		<th><?php echo __('Administration Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Beneficiary Id'); ?></th>
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
	<?php foreach ($provider['InternalRequest'] as $internalRequest): ?>
		<tr>
			<td><?php echo $internalRequest['id']; ?></td>
			<td><?php echo $internalRequest['reference_application']; ?></td>
			<td><?php echo $internalRequest['office_id']; ?></td>
			<td><?php echo $internalRequest['department_id']; ?></td>
			<td><?php echo $internalRequest['administration_id']; ?></td>
			<td><?php echo $internalRequest['user_id']; ?></td>
			<td><?php echo $internalRequest['beneficiary_id']; ?></td>
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
