<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller 
 */
class AppController extends Controller {
	public $components = array('DebugKit.Toolbar', 'Session', 'RequestHandler');
	public $helpers = array("Byte","Date", "Session", "Html", 'Js', "Form", "Bootstrap" => array(
        "className" => "TwitterBootstrap.TwitterBootstrap"
    ));
	
	public function beforeFilter() {
		$this->loadModel('Contact');
		$this->loadModel('Book');
		
		// $this->Session->setFlash(__("Info"), "help", array(), "info");
		// $this->Session->setFlash(__("Error"), "default", array(), "error");
		// $this->Session->setFlash(__("warning"), "default", array(), "warning");
		// $this->Session->setFlash(__("success"), "default", array(), "success");
		
		$contact_id = $this->Session->read('Contact.Contact.id');
		$book_id = $this->Session->read('Book.Book.id');
		
		if (empty($contact_id)) {
			if ($this->params->controller != 'contacts') {
					$this->Session->setFlash(__("<img src=\"/img/flash-icons/info.png\" />Be sure to set a contact if you want to export any branded images!"), "default", array(), "info");
			}	
			
			if ($this->params->controller == 'images' || ($this->params->controller == 'books' && $this->params->action == 'view')) {
				$this->Session->setFlash(__("<img src=\"/img/flash-icons/warning.png\" /> To continue select the active contact or create a new one. "), "default", array(), "warning");
				$this->redirect(array('controller'=>'contacts', 'action'=>'index'));
			}	
		}
		else {
			$this->Session->write('Contact', $this->Contact->read(null, $contact_id));
		}

		if (empty($book_id)) {
				 if ($this->params->controller == 'images') {
						$this->Session->setFlash(__("<img src=\"\img\\flash-icons\\warning.png\" /> To continue select the active book or create a new one. "), "default", array(), "warning");
						$this->redirect(array('controller'=>'books', 'action'=>'index'));
				 }	
			}
			else {
				$this->Session->write('Book', $this->Book->read(null, $book_id));
		}
	
	}
}
