	<?php echo $this->Html->link($this->Bootstrap->label("+ Tag"), array('controller'=>'tags', 'action'=>'add'), array('class'=>'addtag', 'escape'=>false)); ?>
	<?php
		echo $this->Form->Create('Image', array('action'=>'tagged', 'class'=>'form-inline')); 		
		echo $this->Form->input('Image.Image.id', array('value'=>$id));
		echo $this->Form->input('Image.Tag.name');
		echo $this->Form->end('Submit');
	?>
