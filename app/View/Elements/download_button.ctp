<?php
    $controller = $this->params->controller;
	$id = 1;
	echo $this->Bootstrap->button_dropdown($this->Bootstrap->icon('share', 'black') . " Download", array(
		"split" => false,
		"right" => false,
		"links" => array(
			array("PDF", array('controller'=>$controller, 'action'=>'view', $id, 'pdf')),
			array("ZIP", array('controller'=>$controller, 'action'=>'view', $id, 'zip')),
		)
	));
?>