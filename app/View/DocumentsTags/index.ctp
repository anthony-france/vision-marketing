<div class="documentsTags index">
	<h2><?php echo __('Documents Tags');?></h2>
	<table class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('document_id');?></th>
			<th><?php echo $this->Paginator->sort('tag_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($documentsTags as $documentsTag): ?>
	<tr>
		<td><?php echo h($documentsTag['DocumentsTag']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($documentsTag['Document']['id'], array('controller' => 'documents', 'action' => 'view', $documentsTag['Document']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($documentsTag['Tag']['name'], array('controller' => 'tags', 'action' => 'view', $documentsTag['Tag']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $documentsTag['DocumentsTag']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $documentsTag['DocumentsTag']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $documentsTag['DocumentsTag']['id']), null, __('Are you sure you want to delete # %s?', $documentsTag['DocumentsTag']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
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
		<li><?php echo $this->Html->link(__('New Documents Tag'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document'), array('controller' => 'documents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
