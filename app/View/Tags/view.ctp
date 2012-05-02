<div class="tags view">
<h2><?php  echo __('Tag');?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
	
	</ul>
</div>
<div class="clear"></div>
<div class="related">
	<h3><?php echo __('Tagged Images');?></h3> 
	<?php if (!empty($tag['Image'])):?>
	<table class="table table-striped">
	<tr>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Caption'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tag['Image'] as $image): ?>
		<tr>
			<td><?php echo $this->Html->link( $this->Html->image('/' . $image['dir'] .'/thumb/icon/'. $image['filename']), array('controller'=>'images', 'action'=>'view', $image['id']), array('escape'=>false));?></td>
			<td><?php echo $image['caption'];?> </td>
			<td class="actions">
										<?php 
				echo $this->Bootstrap->button_form(
					$this->Bootstrap->icon('trash', 'white') . ' ' . __('Remove From Tag'), 
					array('controller' => 'imagesTags', 'action' => 'delete', $image['ImagesTag']['id']), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "warning", 
						"size" => "small"
					),
					"Are you sure?"
				); 

				?>
					<?php 
	/*			echo $this->Bootstrap->button_link(
					$this->Bootstrap->icon('pencil', 'black') . ' ' . __('Edit'), 
					array('controller'=>'images', 'action' => 'edit', $image['id']), 
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
					array('controller'=>'images', 'action' => 'view', $image['id'] ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "default", 
						"size" => "small"
					)
				); 
*/
				?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>

<div class="clear"></div>

	<h3><?php echo __('Tagged Documents');?></h3>
	<?php if (!empty($tag['Document'])):?>
	<table class="table table-striped">
	<tr>
		<th><?php echo __('Filename'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tag['Document'] as $image): ?> 
		<tr>
			<td><?php echo $this->Html->link( $this->Html->image('/img/' . $image['mimetype'] . '.png') .' '. $image['filename'], array('controller'=>'documents', 'action'=>'view', $image['id'], 'download'), array('escape'=>false));?></td>
			<td class="actions">
			
			<?php 
				echo $this->Bootstrap->button_form(
					$this->Bootstrap->icon('trash', 'white') . ' ' . __('Remove From Tag'), 
					array('controller' => 'documentsTags', 'action' => 'delete', $image['DocumentsTag']['id']), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "warning", 
						"size" => "small"
					),
					"Are you sure?"
				); 

				?>
					<?php 
	/*			echo $this->Bootstrap->button_link(
					$this->Bootstrap->icon('pencil', 'black') . ' ' . __('Edit'), 
					array('controller'=>'documents', 'action' => 'edit', $image['id']), 
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
					$this->Bootstrap->icon('file', 'black') . ' ' . __('View'), 
					array('controller'=>'documents', 'action' => 'view', $image['id'] ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "default", 
						"size" => "small"
					)
				); 
  */
				?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>