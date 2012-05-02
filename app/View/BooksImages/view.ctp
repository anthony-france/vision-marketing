<div class="booksImages view">
<h2><?php  echo __('Books Image');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($booksImage['BooksImage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Book'); ?></dt>
		<dd>
			<?php echo $this->Html->link($booksImage['Book']['name'], array('controller' => 'books', 'action' => 'view', $booksImage['Book']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->link($booksImage['Image']['caption'], array('controller' => 'images', 'action' => 'view', $booksImage['Image']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Books Image'), array('action' => 'edit', $booksImage['BooksImage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Books Image'), array('action' => 'delete', $booksImage['BooksImage']['id']), null, __('Are you sure you want to delete # %s?', $booksImage['BooksImage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Books Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Books Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Books'), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book'), array('controller' => 'books', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
