<div class="addtag-container">
	<?php echo $this->Html->link($this->Bootstrap->label("+ Tag"), array('controller'=>'tags', 'action'=>'add'), array('escape'=>false)); ?>
	<?php
		echo $this->Form->Create('Document', array('action'=>'tagged', 'class'=>'form-inline')); 		
		echo $this->Form->input('Document.Document.id', array('value'=>$id);
		echo $this->Form->input('Document.Tag.name');
		echo $this->Form->end('Submit');
		
	?>
</div>