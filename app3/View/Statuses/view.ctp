<div class="statuses view">
<h2><?php echo __('Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($status['Status']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($status['Status']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Status'), array('action' => 'edit', $status['Status']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Status'), array('action' => 'delete', $status['Status']['id']), array(), __('Are you sure you want to delete # %s?', $status['Status']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Endorsements'), array('controller' => 'endorsements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Endorsement'), array('controller' => 'endorsements', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Endorsements'); ?></h3>
	<?php if (!empty($status['Endorsement'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Request Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($status['Endorsement'] as $endorsement): ?>
		<tr>
			<td><?php echo $endorsement['id']; ?></td>
			<td><?php echo $endorsement['request_id']; ?></td>
			<td><?php echo $endorsement['user_id']; ?></td>
			<td><?php echo $endorsement['status_id']; ?></td>
			<td><?php echo $endorsement['comment']; ?></td>
			<td><?php echo $endorsement['created']; ?></td>
			<td><?php echo $endorsement['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'endorsements', 'action' => 'view', $endorsement['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'endorsements', 'action' => 'edit', $endorsement['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'endorsements', 'action' => 'delete', $endorsement['id']), array(), __('Are you sure you want to delete # %s?', $endorsement['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Endorsement'), array('controller' => 'endorsements', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
