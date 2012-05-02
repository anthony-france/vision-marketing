<div class="booksImages index">
	<h2><?php echo __('Books Images');?></h2>
	<table class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('book_id');?></th>
			<th><?php echo $this->Paginator->sort('image_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($booksImages as $booksImage): ?>
	<tr>
		<td><?php echo h($booksImage['BooksImage']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($booksImage['Book']['name'], array('controller' => 'books', 'action' => 'view', $booksImage['Book']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($booksImage['Image']['caption'], array('controller' => 'images', 'action' => 'view', $booksImage['Image']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $booksImage['BooksImage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $booksImage['BooksImage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $booksImage['BooksImage']['id']), null, __('Are you sure you want to delete # %s?', $booksImage['BooksImage']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Books Image'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Books'), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book'), array('controller' => 'books', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
