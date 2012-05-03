<div class="tags" id="tags-for-<?php echo $id; ?>">
	<?php foreach($tags as $tag): ?>
  	<?php echo $this->Html->link($this->Bootstrap->label($tag['name']), array('controller'=>'tags', 'action'=>'view', $tag['id']), array('escape'=>false)); ?>
	<?php endforeach; ?>
	<?php echo $this->element('add_tag_to_' . $model, array('id'=>$id)); ?>
</div>