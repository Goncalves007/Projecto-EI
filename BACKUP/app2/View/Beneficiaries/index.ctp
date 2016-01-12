<div class="beneficiaries index">
	<h2><?php echo __('Beneficiaries'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('department_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($beneficiaries as $beneficiary): ?>
	<tr>
		<td><?php echo h($beneficiary['Beneficiary']['id']); ?>&nbsp;</td>
		<td><?php echo h($beneficiary['Beneficiary']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($beneficiary['Department']['label'], array('controller' => 'departments', 'action' => 'view', $beneficiary['Department']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $beneficiary['Beneficiary']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $beneficiary['Beneficiary']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $beneficiary['Beneficiary']['id']), array(), __('Are you sure you want to delete # %s?', $beneficiary['Beneficiary']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Beneficiary'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Departments'), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Department'), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Internal Requests'), array('controller' => 'internal_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Internal Request'), array('controller' => 'internal_requests', 'action' => 'add')); ?> </li>
	</ul>
</div>
