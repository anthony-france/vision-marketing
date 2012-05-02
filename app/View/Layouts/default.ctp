<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('header_link', 'Vision Marketing Builder');
?>
<!DOCTYPE html">
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap');
		
		
		echo $this->Html->script('jquery-1.7.2.min');
		echo $this->Html->script('bootstrap');
		echo $this->Html->script('core');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>

<body class="<?php echo $this->params->controller . ' ' . $this->params->action; ?>">
	<div id="container">
		<div id="header">
			<div class="navbar">
			  <div class="navbar-inner">
				<div class="container">
					<a class="brand" href="/">
						<?php echo $cakeDescription; ?>
					</a>
					<ul class="nav">
					  <li class="divider-vertical"></li>
					  <li class="dropdown">
				      <?php if ($this->Session->read('Contact.Contact.id')): ?>
							<?php echo $this->Html->link(
								$this->Bootstrap->icon("user", "white") . ' ' . $this->Session->read('Contact.Contact.name'),
								array('controller'=>'contacts','action'=>'index'),
								array('escape'=>false)
							); ?>
						<?php else: ?>
							<?php echo $this->Html->link(
								$this->Bootstrap->icon("ban-circle", "white")  . ' ' .  ' Contact Not Set', 
								array('controller'=>'contacts','action'=>'index'),
								array('escape'=>false)
							); 
							?>
														
						<?php endif; ?>
					  </li>
					  <li class="divider-vertical"></li>
					  <li class="dropdown">
				      <?php if ($this->Session->read('Book.Book.id')): ?>
							<?php echo $this->Html->link(
								$this->Bootstrap->icon("book", "white")  . ' ' .  $this->Session->read('Book.Book.name') . '<b class="caret"></b>',
								'#',
								array('escape' => false, 'class'=>'dropdown-toggle', 'data-toggle'=>'dropdown')
							); 
							?>
							<ul class="dropdown-menu">
							  <li><a href="/books"><?php echo $this->Bootstrap->icon("book", "black"); ?> Books</a></li>
							  <li><a href="/books/view/<?php echo $this->Session->read('Book.Book.id') ?>/pdf"><?php echo $this->Bootstrap->icon("share", "black"); ?>Download PDF</a></li>
							  <li><a href="/books/view/<?php echo $this->Session->read('Book.Book.id') ?>/zip"><?php echo $this->Bootstrap->icon("share", "black"); ?>Download ZIP</a></li>
							</ul>
						<?php else: ?>
							<?php echo $this->Html->link(
								$this->Bootstrap->icon("ban-circle", "white")  . ' ' .  'Book Not Set',
								array('controller'=>'books','action'=>'index'),
								array('escape'=>false)
							); 
							?> 
														
						<?php endif; ?>
					  </li>
					  <li class="divider-vertical"></li>
					  <li class="dropdown">
						<a href="#"
							  class="dropdown-toggle"
							  data-toggle="dropdown">
							  View
							  <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							  <li><a href="/books"><?php echo $this->Bootstrap->icon("book", "black"); ?> Books</a></li>
							  <li><a href="/images"><?php echo $this->Bootstrap->icon("picture", "black"); ?> Images</a></li>
							  <li><a href="/tags"><?php echo $this->Bootstrap->icon("tags", "black"); ?> Tags</a></li>
							  <li><a href="/contacts"><?php echo $this->Bootstrap->icon("user", "black"); ?> Contacts</a></li>
							  <li><a href="/documents"><?php echo $this->Bootstrap->icon("list-alt", "black"); ?> Documents</a></li>
						</ul>
					  </li>
					  <li class="divider-vertical"></li>
					  <li class="dropdown">
						<a href="#"
							  class="dropdown-toggle"
							  data-toggle="dropdown">
							  Add
							  <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							  <li><a href="/books/add"><?php echo $this->Bootstrap->icon("book", "black"); ?> Book</a></li>
							  <li><a href="/images/add"><?php echo $this->Bootstrap->icon("picture", "black"); ?> Image</a></li>
							  <li><a href="/tags/add"><?php echo $this->Bootstrap->icon("tag", "black"); ?> Tag</a></li>
							  <li><a href="/contacts/add"><?php echo $this->Bootstrap->icon("user", "black"); ?> Contact</a></li>
							  <li><a href="/documents/add"><?php echo $this->Bootstrap->icon("file", "black"); ?> Document</a></li>
						</ul>
					  </li>
					  
					</ul>
  
				</div>
			  </div>
			</div>
		</div>
		<div id="content">
			
			<?php if ($this->Session->read('Book') && $this->params->controller == 'images' && ($this->params->action != 'add' && $this->params->action != 'edit')): ?>
				<?php //echo $this->element('bookpages'); ?>
			<?php endif; ?>
			<?php echo $this->Bootstrap->flashes(array("auth" => true)); ?>
			<?php echo $this->fetch('content'); ?>

		</div>
		<div id="footer">
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
