<div class="documentsTags form">
<?php echo $this->Form->create('DocumentsTag');?>
	<fieldset>
		<legend><?php echo __('Edit Documents Tag'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('document_id');
		echo $this->Form->input('tag_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DocumentsTag.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('DocumentsTag.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Documents Tags'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document'), array('controller' => 'documents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
