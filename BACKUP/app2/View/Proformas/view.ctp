<?php echo $this->element('content_header'); ?>
<h1>Title : <?php echo h($Proforma['Proforma']['title']); ?></h1>
<p>ID: <?php echo $Proforma['Proforma']['id']; ?></p>
<p>Description: <?php echo $Proforma['Proforma']['description']; ?></p>
<p>Created: <?php echo $Proforma['Proforma']['created']; ?></p>
<p>File Name:<?php echo h($Proforma['Proforma']['report']); ?></p>
<p><?php echo $this->Html->link('View File',array('controller' => 'proformas','action' => 'viewdown',$Proforma['Proforma']['id'],false),array('target'=>'_blank'));?></p>
<?php echo $this->element('content_footer'); ?>