<div class="externalBeneficiaries view">
<h2><?php echo __('External Beneficiary'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($externalBeneficiary['ExternalBeneficiary']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($externalBeneficiary['ExternalBeneficiary']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit External Beneficiary'), array('action' => 'edit', $externalBeneficiary['ExternalBeneficiary']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete External Beneficiary'), array('action' => 'delete', $externalBeneficiary['ExternalBeneficiary']['id']), array(), __('Are you sure you want to delete # %s?', $externalBeneficiary['ExternalBeneficiary']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List External Beneficiaries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New External Beneficiary'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List External Requests'), array('controller' => 'external_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New External Request'), array('controller' => 'external_requests', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related External Requests'); ?></h3>
	<?php if (!empty($externalBeneficiary['ExternalRequest'])): ?>
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
		<th><?php echo __('Currency'); ?></th>
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
	<?php foreach ($externalBeneficiary['ExternalRequest'] as $externalRequest): ?>
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
			<td><?php echo $externalRequest['currency']; ?></td>
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
