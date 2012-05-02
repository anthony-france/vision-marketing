<div class="books index">
	<h2><?php echo __('Books');?></h2>
	<table class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th class="actions"></th>
	</tr>
	<?php
	foreach ($books as $book): ?>  
	<tr>
		<td>
			<div>
				<?php echo $this->Html->link($book['Book']['name'], array('controller'=>'books', 'action'=>'view', $book['Book']['id'])); ?> 
			</div>
			<div>
				<?php foreach($book['Image'] as $image):?> <?php echo $this->Html->link( $this->Html->image('/' . $image['dir'] .'/thumb/icon/'. $image['filename']), array('controller'=>'images', 'action'=>'view', $image['id']), array('escape'=>false));?><?php endforeach; ?>
			</div>
		</td>
		<td class="actions">  
			
			<?php 
				echo $this->Bootstrap->button_form(
					$this->Bootstrap->icon('trash', 'white') . ' ' . __('Delete'), 
					array('action' => 'delete', $book['Book']['id']), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "danger", 
						"size" => "small"
					),
					"Are you sure?"
				); 

				?>
				
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
	/*			echo $this->Bootstrap->button_link(
					$this->Bootstrap->icon('pencil', 'black') . ' ' . __('Edit'), 
					array('action' => 'edit', $book['Book']['id']), 
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
	/*
				echo $this->Bootstrap->button_link(
					$this->Bootstrap->icon('book', 'black') . ' ' . __('View'), 
					array('action' => 'view', $book['Book']['id'] ), 
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
				echo $this->Bootstrap->button_form(
					$this->Bootstrap->icon('asterisk', 'white') . ' ' . __('Select'), 
					array('action' => 'view', $book['Book']['id'], 1 ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "primary", 
						"size" => "small"
					)
				); 
			?>
			
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

	</ul>
</div>
