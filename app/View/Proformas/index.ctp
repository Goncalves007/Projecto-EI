<?php echo $this->element('content_header'); ?>
<h1>Proforma</h1>
<table class="pure-table pure-table-bordered">
    <tr>
        <th>Request Reference</th>
        <th>Title</th>
        <th>Description</th>
        <th>Proforma Name</th>
        <th>Created</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php foreach ($Proformas as $Proforma): ?>
    <tr class="pure-table-odd">
        <td><?php echo $Proforma['Proforma']['request_reference']; ?></td>
        <td><?php echo $Proforma['Proforma']['title']; ?></td>
        <td><?php echo $Proforma['Proforma']['description']; ?></td>
        <td><?php echo $Proforma['Proforma']['report']; ?></td>
        <td><?php echo $Proforma['Proforma']['created']; ?></td>
        <td><?php echo $this->Html->link('View Details', array('controller' => 'Proformas', 'action' => 'view', $Proforma['Proforma']['id']));?></td>
<td><?php echo $this->Html->link('Download', array('controller' => 'Proformas', 'action' => 'viewdown', $Proforma['Proforma']['id'],true));?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>
<?php echo $this->element('content_footer'); ?>