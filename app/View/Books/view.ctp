<div class="books view">
<h2><?php  echo __('Book');?></h2> 
			<?php echo $this->Bootstrap->button_link($this->Bootstrap->icon('trash', 'white') . ' ' . __('Delete Book'), array('controller'=>'books', 'action' => 'delete', $book['Book']['id'] ), array('class'=>'pull-right', 'escape' => false, "style" => "danger", "size" => "small"), 'Are you sure?'); ?>
			<?php echo $this->Bootstrap->button_link($this->Bootstrap->icon('pencil', 'white') . ' ' . __('Edit Book'), array('controller'=>'books', 'action' => 'edit', $book['Book']['id'] ), array('class'=>'pull-right', 'escape' => false, "style" => "primary", "size" => "small")); ?>
		
				<?php 
				echo $this->Bootstrap->button_form(
					$this->Bootstrap->icon('share', 'black') . ' ' . __('PDF'), 
					array('action' => 'view', $book['Book']['id'], 'pdf' ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "default", 
						"size" => "small"
					)
				); 

				?>
				  
				<?php 
				echo $this->Bootstrap->button_form(
					$this->Bootstrap->icon('share', 'black') . ' ' . __('ZIP'), 
					array('action' => 'view', $book['Book']['id'], 'zip' ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "default", 
						"size" => "small"
					)
				); 

				?>
				
				<?php 
				echo $this->Bootstrap->button_form(
					$this->Bootstrap->icon('asterisk', 'white') . ' ' . __('Set Active'), 
					array('action' => 'view', $book['Book']['id'], 1 ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "primary", 
						"size" => "small"
					)
				); 

				?>



	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($book['Book']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

	</ul>
</div>
<div class="clear"></div>
<div class="related">
	<h3><?php echo __('Images in this Book');?></h3>
	<?php if (!empty($book['Image'])):?>
	<table class="table table-striped">
	<tr>
				<th><?php echo __('File'); ?></th>
				<th><?php echo __('Caption'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($book['Image'] as $image): ?>
		<tr>
			<td><?php echo $this->Html->image('/' . $image['dir'] .'/thumb/index/'. $image['filename']);?></td>
			<td><?php echo $image['caption'];?></td>
			<td class="actions">
							<?php 
				echo $this->Bootstrap->button_form(
					$this->Bootstrap->icon('trash', 'white') . ' ' . __('Remove From Book'), 
					array('controller' => 'booksImages', 'action' => 'delete', $image['BooksImage']['id']), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "warning", 
						"size" => "small"
					),
					"Are you sure?"
				); 

				?>
					<?php 
		/*		echo $this->Bootstrap->button_link(
					$this->Bootstrap->icon('pencil', 'black') . ' ' . __('Edit'), 
					array('controller'=>'images', 'action' => 'edit', $image['id']), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "default", 
						"size" => "small"
					)
				); 
		*/
				?>					

			<?php 
	/*			echo $this->Bootstrap->button_link(
					$this->Bootstrap->icon('picture', 'black') . ' ' . __('View'), 
					array('controller'=>'images', 'action' => 'view', $image['id'] ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "default", 
						"size" => "small"
					)
				); 
	*/
				?>

			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
