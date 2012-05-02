<div class="imagesTags view">
<h2><?php  echo __('Images Tag');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($imagesTag['ImagesTag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->link($imagesTag['Image']['id'], array('controller' => 'images', 'action' => 'view', $imagesTag['Image']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo $this->Html->link($imagesTag['Tag']['name'], array('controller' => 'tags', 'action' => 'view', $imagesTag['Tag']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Images Tag'), array('action' => 'edit', $imagesTag['ImagesTag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Images Tag'), array('action' => 'delete', $imagesTag['ImagesTag']['id']), null, __('Are you sure you want to delete # %s?', $imagesTag['ImagesTag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Images Tags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Images Tag'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
