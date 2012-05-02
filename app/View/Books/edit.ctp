<div class="books form">

<?php 
	echo $this->Bootstrap->button_link(
		$this->Bootstrap->icon('list', 'white') . ' ' . __('View Book'), 
		array(
			'controller'=>'books', 
			'action' => 'view', 
			$this->Session->read('Book.Book.id')
		), 
		 array(
			'class'=>'pull-right', 
			'escape' => false, 
			"style" => "primary", 
			"size" => "small"
		)
	); 

	?>
<?php 
	echo $this->Bootstrap->button_link(
		$this->Bootstrap->icon('trash', 'white') . ' ' . __('Delete Book'),
		array(
			'controller'=>'books', 
			'action' => 'delete', 
			$this->Session->read('Book.Book.id')
		), 
		array(
			'class'=>'pull-right', 
			'escape' => false, 
			"style" => "danger", 
			"size" => "small"
		), 
		'Are you sure?'
	); 

?>


<?php echo $this->Form->create('Book');?>
	<fieldset>
		<legend><?php echo __('Edit Book'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		//echo $this->Form->input('Image');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

	</ul>
</div>
