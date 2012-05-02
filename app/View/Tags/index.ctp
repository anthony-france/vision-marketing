<div class="tags index">
	<h2><?php echo __('Tags');?></h2>
	<table class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo __('Files');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr> 
	<?php
	foreach ($tags as $tag): ?> 
	<tr>
		<td><?php echo h($tag['Tag']['name']); ?>&nbsp;</td>
	   <td>
			
			<?php if (!empty($tag['Image'])): ?>
				<div class="imagelist">
					<h3>Images</h3>
					<?php foreach($tag['Image'] as $image):?> <?php echo $this->Html->link( $this->Html->image('/' . $image['dir'] .'/thumb/icon/'. $image['filename']), array('controller'=>'images', 'action'=>'view', $image['id']), array('escape'=>false));?><?php endforeach; ?>
				</div>
			<? endif; ?>

			<?php if (!empty($tag['Document'])): ?>
				<div class="documentlist">
					<h3>Documents</h3>
					<?php foreach($tag['Document'] as $image):?><div class="list-item"> <?php echo $this->Html->link( $this->Html->image('/img/' . $image['mimetype'] . '.png').' '.$image['filename'], array('controller'=>'documents', 'action'=>'view', $image['id']), array('escape'=>false));?> </div><?php endforeach; ?>
				</div>
			<?php endif; ?>
	   </td>
		<td class="actions">
				<?php 
				echo $this->Bootstrap->button_form(
					$this->Bootstrap->icon('trash', 'white') . ' ' . __('Delete'), 
					array('action' => 'delete', $tag['Tag']['id']), 
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
					array('action' => 'edit', $tag['Tag']['id']), 
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
					$this->Bootstrap->icon('tag', 'black') . ' ' . __('View'), 
					array('action' => 'view', $tag['Tag']['id'] ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "default", 
						"size" => "small"
					)
				); 

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
		<li><?php echo $this->Html->link(__('New Tag'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
	</ul>
</div>
