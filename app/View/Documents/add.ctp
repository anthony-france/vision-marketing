<div class="documents form"> 
<?php echo $this->Form->create('Document', array('type' => 'file'));?>
	<fieldset>
		<legend><?php echo __('Add Document'); ?></legend>
	<?php
		echo $this->Form->input('filename', array('type' => 'file')); 
		echo $this->Form->input('dir', array('type' => 'hidden'));
		echo $this->Form->input('mimetype', array('type' => 'hidden'));
		echo $this->Form->input('filesize', array('type' => 'hidden'));
		echo $this->Form->input('Tag', array('multiple' => 'checkbox'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

	</ul>
</div>
