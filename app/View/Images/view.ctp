<div class="images view">
<h2><?php  echo __('Image');?></h2>  
	<?php $book_pages = $this->Session->read('Book.Image');
	$page_ids = array();
	foreach($book_pages as $page) {
		$page_ids[] = $page['id'];  
	}

	foreach($image['Book'] as $book) {
		if ($book['id'] == $this->Session->read('Book.Book.id')) {
			$glueid = $book['BooksImage']['id'];
		}
	}
	
	if (!empty($glueid)) {							echo $this->Bootstrap->button_form(
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
	else {
 
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
	?>
	
<?php echo $this->Bootstrap->button_link($this->Bootstrap->icon('pencil', 'black') . ' ' . __('Edit Image'), array('controller'=>'images', 'action' => 'edit', $image['Image']['id'] ), array('class'=>'pull-right', 'escape' => false, "style" => "default", "size" => "small")); ?>

<div class="clear"></div>
  <?php echo $this->element('tags', array('tags'=>$image['Tag'], 'model'=>'image', 'id'=>$image['Image']['id'])); ?>

	<dl>
		<dt><?php echo __('Caption'); ?></dt>
		<dd>
			<?php echo h($image['Image']['caption']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->image('/' . $image['Image']['dir'] .'/'. $image['Image']['filename']);?> 
			&nbsp;
		</dd>
		
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

	</ul>
</div>



