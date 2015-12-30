
<?php echo $this->element('content_header'); ?>
<?php echo debug($Reports); ?>
<h1>Acompanhar Minhas Requisicoes</h1>
<table class="pure-table pure-table-bordered">
    <tr>
        <th>Request Reference</th>
        <th>Ch. Departamento</th>
        <th>Ger. Financeiro</th>
        <th>Tesoreiro</th>
        <th>Created</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php foreach ($Reports as $Report): ?>
    <tr class="pure-table-odd">
        <td><?php echo $Report['InternalRequest']['reference_application']; ?></td>
        <td><?php echo "--------------" ?></td>
        <td><?php echo "--------------" ?></td>
        <td><?php echo "--------------" ?></td>
        <td><?php echo $Report['InternalRequest']['created']; ?></td>
        <td><?php echo $this->Html->link('View Details', array('controller' => 'reports', 'action' => 'view', $Report['Report'][0]['id']));?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>
<?php echo $this->element('content_footer'); ?>
