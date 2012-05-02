<div class="images index">
			<?php 
				echo $this->Bootstrap->button_link(
					$this->Bootstrap->icon('book', 'black') . ' ' . __('Preview Book'), 
					array('controller'=>'books', 'action' => 'view', $this->Session->read('Book.Book.id') ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "default", 
						"size" => "small"
					)
				); 

				?>
							<?php 
				echo $this->Bootstrap->button_link(
					$this->Bootstrap->icon('share', 'black') . ' ' . __('PDF'), 
					array('controller'=>'books', 'action' => 'view', $this->Session->read('Book.Book.id'), 'pdf' ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "default", 
						"size" => "small"
					)
				); 

				?>
				
				<?php 
				echo $this->Bootstrap->button_link(
					$this->Bootstrap->icon('share', 'black') . ' ' . __('ZIP'), 
					array('controller'=>'books', 'action' => 'view', $this->Session->read('Book.Book.id'), 'zip' ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "default", 
						"size" => "small"
					)
				); 

				?>

	<h2><?php echo __('Images');?></h2>
	<table class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('caption');?></th>
			<th><?php echo $this->Paginator->sort('filename');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	 
	<?php
	$book_pages = $this->Session->read('Book.Image');
	$page_ids = array();
	foreach($book_pages as $page) {
		$page_ids[] = $page['id'];
	}
	
	
	
	foreach ($images as $image): 
		
	?>
	<tr>
		<td>
		<div><?php echo h($image['Image']['caption']); ?>&nbsp;</div>
		<div>
			<?php
				   foreach ($image['Tag'] as $tag) {
					echo $this->Html->link($this->Bootstrap->label($tag['name']), array('controller'=>'tags', 'action' => 'view', $tag['id']), array('escape'=>false));		
				}
			  ?>
		</div>
		</td>
		<td><?php echo $this->Html->link($this->Html->image('/' . $image['Image']['dir'] .'/thumb/index/'. $image['Image']['filename']), array('controller'=>'images','action'=>'view', $image['Image']['id']), array('escape'=>false));?></td>
		<td class="actions">
	
				<?php 
	/*			echo $this->Bootstrap->button_form( 
					$this->Bootstrap->icon('trash', 'white') . ' ' . __('Delete'), 
					array('action' => 'delete', $image['Image']['id']), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "danger", 
						"size" => "small"
					),
					"Are you sure?"
				);  */

				?>
				
				<?php 
				/* echo $this->Bootstrap->button_link(
					$this->Bootstrap->icon('pencil', 'black') . ' ' . __('Edit'), 
					array('action' => 'edit', $image['Image']['id']), 
					 array(
						'class'=>'pull-right', 
						'escape' => false,  
						"style" => "default", 
						"size" => "small"
					)
				); 
				
				echo $this->Bootstrap->button_link(
					$this->Bootstrap->icon('picture', 'black') . ' ' . __('View'), 
					array('action' => 'view', $image['Image']['id'] ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "default", 
						"size" => "small"
					)
				);  */
				?>
				
				<?php				
					if (!in_array($image['Image']['id'], $page_ids)) {
						
						echo $this->Bootstrap->button_form(
							$this->Bootstrap->icon('book', 'white') . ' ' . __('Add to Book'), 
							array('controller' => 'booksImages', 'action'=>'add', $this->Session->read('Book.Book.id'), $image['Image']['id']), 
							 array(
								'class'=>'pull-right', 
								'escape' => false, 
								"style" => "primary", 
								"size" => "small"
							),
							"Are you sure?"
						); 
					}
					else {
						
						foreach($image['Book'] as $book) {
							if ($book['id'] == $this->Session->read('Book.Book.id')) {
								$glueid = $book['BooksImage']['id'];
							}
						} 
						
						echo $this->Bootstrap->button_form(
							$this->Bootstrap->icon('book', 'white') . ' ' . __('Remove from Book'), 
							array('controller' => 'booksImages', 'action'=>'delete',$glueid), 
							 array(
								'class'=>'pull-right', 
								'escape' => false, 
								"style" => "warning", 
								"size" => "small"
							),
							"Are you sure?"
						); 
					}
				?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
				<?php 
				echo $this->Bootstrap->button_link(
					$this->Bootstrap->icon('book', 'black') . ' ' . __('Preview Book'), 
					array('controller'=>'books', 'action' => 'view', $this->Session->read('Book.Book.id') ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "default", 
						"size" => "small"
					)
				); 

				?>
							<?php 
				echo $this->Bootstrap->button_link(
					$this->Bootstrap->icon('share', 'black') . ' ' . __('PDF'), 
					array('controller'=>'books', 'action' => 'view', $this->Session->read('Book.Book.id'), 'pdf' ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "default", 
						"size" => "small"
					)
				); 

				?>
				
				<?php 
				echo $this->Bootstrap->button_link(
					$this->Bootstrap->icon('share', 'black') . ' ' . __('ZIP'), 
					array('controller'=>'books', 'action' => 'view', $this->Session->read('Book.Book.id'), 'zip' ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "default", 
						"size" => "small"
					)
				); 

				?>

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
