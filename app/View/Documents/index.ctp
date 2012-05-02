<div class="documents index"> 
	<h2><?php echo __('Documents');?></h2> 
	<table class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('mimetype', 'Type');?></th>
			<th><?php echo $this->Paginator->sort('filename');?></th>
			<th><?php echo $this->Paginator->sort('filesize');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($documents as $document): ?>
	<tr>
		<td><?php echo $this->Html->link( $this->Html->image('/img/' . $document['Document']['mimetype'] . '.png') , array('controller'=>'documents', 'action'=>'view', $document['Document']['id'], 'download'), array('escape'=>false));?>&nbsp;</td>
		<td><?php echo $this->Html->link( $document['Document']['filename'], array('controller'=>'documents', 'action'=>'view', $document['Document']['id'], 'download'), array('escape'=>false));?>&nbsp;
		
			<?php foreach($document['Tag'] as $tag): ?>
				<?php echo $this->Html->link($this->Bootstrap->label($tag['name']), array('controller'=>'tags', 'action'=>'view', $tag['id']), array('escape'=>false)); ?>
			<?php endforeach; ?>
			<?php //echo $this->element('add_tag_to_document', array('id'=>$document['Document']['id'])); ?>
		
		</td>
		<td><?php echo $this->Byte->human($document['Document']['filesize'], 0); ?>&nbsp;</td>
		<td><?php echo h($this->Date->ago($document['Document']['modified'])); ?>&nbsp;</td> 
		<td class="actions">

				<?php 
				echo $this->Bootstrap->button_form(
					$this->Bootstrap->icon('trash', 'white') . ' ' . __('Delete'), 
					array('action' => 'delete', $document['Document']['id']), 
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
					array('action' => 'edit', $document['Document']['id']), 
					 array(
						'class'=>'pull-right', 
						'escape' => false,  
						"style" => "default", 
						"size" => "small"
					)
				); 

				?>					

			<?php 
		/*		echo $this->Bootstrap->button_link(
					$this->Bootstrap->icon('picture', 'black') . ' ' . __('View'), 
					array('action' => 'view', $document['Document']['id'] ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "default", 
						"size" => "small"
					)
				);  */
				?>

		</td>
	</tr>
<?php endforeach; ?>
	</table>
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
