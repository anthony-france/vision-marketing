<div class="contacts index">
	<h2><?php echo __('Contacts');?></h2>
	<table class="table table-striped"> 
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('phone');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($contacts as $contact): ?> 
	<tr>
		<td><?php echo h($contact['Contact']['name']); ?>&nbsp;</td>
		<td><?php echo h($contact['Contact']['phone']); ?>&nbsp;</td>
		<td><?php echo h($contact['Contact']['email']); ?>&nbsp;</td>
		<td class="actions"> 

			<?php 
				echo $this->Bootstrap->button_form(
					$this->Bootstrap->icon('trash', 'white') . ' ' . __('Delete'), 
					array('action' => 'delete', $contact['Contact']['id']), 
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
					array('action' => 'edit', $contact['Contact']['id']), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "default", 
						"size" => "small"
					)
				); 
				?>					

				<?php 
			/*	echo $this->Bootstrap->button_link(
					$this->Bootstrap->icon('user', 'black') . ' ' . __('View'), 
					array('action' => 'view', $contact['Contact']['id'] ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "default", 
						"size" => "small"
					)
				); */
				?>
				
				<?php 
				echo $this->Bootstrap->button_form(
					$this->Bootstrap->icon('asterisk', 'white') . ' ' . __('Select'), 
					array('action' => 'view', $contact['Contact']['id'], 1 ), 
					 array(
						'class'=>'pull-right', 
						'escape' => false, 
						"style" => "primary", 
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
	
	</ul>
</div>
