<div class="documentsTags view">
<h2><?php  echo __('Documents Tag');?></h2> 
	<dl>
		<dt><?php echo __('Document'); ?></dt>
		<dd>
			<?php echo $this->Html->link($documentsTag['Document']['id'], array('controller' => 'documents', 'action' => 'view', $documentsTag['Document']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo $this->Html->link($documentsTag['Tag']['name'], array('controller' => 'tags', 'action' => 'view', $documentsTag['Tag']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Documents Tag'), array('action' => 'edit', $documentsTag['DocumentsTag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Documents Tag'), array('action' => 'delete', $documentsTag['DocumentsTag']['id']), null, __('Are you sure you want to delete # %s?', $documentsTag['DocumentsTag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Documents Tags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Documents Tag'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document'), array('controller' => 'documents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
