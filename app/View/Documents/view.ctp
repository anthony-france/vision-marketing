<div class="documents view">
<h2><?php echo h($document['Document']['filename']); ?></h2>
		<?php 
				echo $this->Bootstrap->button_form(
					$this->Bootstrap->icon('trash', 'white') . ' ' . __('Delete'), 
					array('controller' => 'documents', 'action' => 'delete', $document['Document']['id']), 
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
				echo $this->Bootstrap->button_link(
					$this->Bootstrap->icon('pencil', 'black') . ' ' . __('Edit'), 
					array('controller'=>'documents', 'action' => 'edit', $document['Document']['id']), 
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
					$this->Bootstrap->icon('picture', 'black') . ' ' . __('View'), 
					array('controller'=>'documents', 'action' => 'view', $document['Document']['id'] ), 
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
					$this->Bootstrap->icon('download-alt', 'white') . ' ' . __('Download'), 
					array('controller'=>'documents', 'action'=>'view', $document['Document']['id'], 'download'),
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "primary", 
						"size" => "small"
					)
				); 

				?>

<?php
       foreach ($document['Tag'] as $tag) {
		echo $this->Html->link($this->Bootstrap->label($tag['name']), array('controller'=>'tags', 'action'=>'view', $tag['id']), array('escape'=>false));		
	}
  ?>
  
	<dl>
		<dt><?php echo __('Filename'); ?></dt>
		<dd>
			<?php echo h($document['Document']['filename']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mimetype'); ?></dt>
		<dd>
			<?php echo h($document['Document']['mimetype']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filesize'); ?></dt>
		<dd>
			<?php echo h($document['Document']['filesize']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($this->Date->ago($document['Document']['created'])); ?>&nbsp;
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($this->Date->ago($document['Document']['modified'])); ?>&nbsp;
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Document'), array('action' => 'edit', $document['Document']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Document'), array('action' => 'delete', $document['Document']['id']), null, __('Are you sure you want to delete # %s?', $document['Document']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Documents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
