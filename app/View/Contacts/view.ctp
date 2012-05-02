<div class="contacts view">

			<?php 
				echo $this->Bootstrap->button_form(
					$this->Bootstrap->icon('asterisk', 'white') . ' ' . __('Set Active'), 
					array('action' => 'view', $contact['Contact']['id'], 1 ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "primary", 
						"size" => "small"
					)
				); 

				?>
	
<?php echo $this->Bootstrap->button_link($this->Bootstrap->icon('pencil', 'white') . ' ' . __('Edit Contact'), array('controller'=>'contacts', 'action' => 'edit', $contact['Contact']['id'] ), array('class'=>'pull-right', 'escape' => false, "style" => "primary", "size" => "small")); ?>
<?php echo $this->Bootstrap->button_link($this->Bootstrap->icon('trash', 'white') . ' ' . __('Delete Contact'), array('controller'=>'contacts', 'action' => 'delete', $contact['Contact']['id'] ), array('class'=>'pull-right', 'escape' => false, "style" => "danger", "size" => "small"), 'Are you sure?'); ?>



<h2><?php  echo __('Contact');?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($contact['Contact']['email']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contact'), array('action' => 'edit', $contact['Contact']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Contact'), array('action' => 'delete', $contact['Contact']['id']), null, __('Are you sure you want to delete # %s?', $contact['Contact']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contacts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Books'), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book'), array('controller' => 'books', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Books');?></h3>
	<?php if (!empty($contact['Book'])):?>
	<table class="table table-striped">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Contact Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($contact['Book'] as $book): ?>
		<tr>
			<td><?php echo $book['id'];?></td>
			<td><?php echo $book['contact_id'];?></td>
			<td><?php echo $book['created'];?></td>
			<td><?php echo $book['modified'];?></td>
			<td><?php echo $book['name'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'books', 'action' => 'view', $book['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'books', 'action' => 'edit', $book['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'books', 'action' => 'delete', $book['id']), null, __('Are you sure you want to delete # %s?', $book['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Book'), array('controller' => 'books', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
