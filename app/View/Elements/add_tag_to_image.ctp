<div class="add-tag-container">
	<?php echo $this->Html->link($this->Bootstrap->label("+ Tag"), array('controller'=>'tags', 'action'=>'add'), array('class'=>'addtag', 'escape'=>false)); ?>
	<div class="add-form hidden">
		<?php
			echo $this->Form->Create('Image', array('action'=>'tagged', 'class'=>'form-inline add-tag-img')); 		
			echo $this->Form->input('Image.Image.id', array('value'=>$id));
			echo $this->Form->input('Image.Tag.name', array('label'=>false));
			echo $this->Form->end('Submit');
		?>
	</div>
</div>