<div class="add-tag-container">
	<?php echo $this->Html->link($this->Bootstrap->label("+ Tag"), array('controller'=>'tags', 'action'=>'add'), array('class'=>'addtag', 'escape'=>false)); ?>
	<div class="add-form hidden">
		<?php
			echo $this->Form->Create('Document', array('action'=>'tagged', 'class'=>'form-inline add-tag-doc')); 		
			echo $this->Form->input('Document.Document.id', array('value'=>$id));
			echo $this->Form->input('Document.Tag.name', array('label'=>false));
			echo $this->Form->end('Submit');
		?>
	</div>
</div>