<div class="imagesTags form">
<?php echo $this->Form->create('ImagesTag');?>
	<fieldset>
		<legend><?php echo __('Edit Images Tag'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('image_id');
		echo $this->Form->input('tag_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ImagesTag.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ImagesTag.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Images Tags'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
