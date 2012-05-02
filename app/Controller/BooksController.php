<?php
App::uses('AppController', 'Controller');
/**
 * Books Controller
 *
 * @property Book $Book
 */
class BooksController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Book->recursive = 1;
		$this->set('books', $this->paginate());
	}
	
/**
 * view method
 *
 * @param string $id
 * @return void 
 */
	public function view($id = null, $active=null) {
		$this->Book->id = $id;
		
		if (!$this->Book->exists()) { 
			throw new NotFoundException(__('Invalid book'));
		}
		
		$book = $this->Book->read(null, $id);
		
		if ($active) {	
			$this->Session->write('Book', $book); 
			if ($active == 'pdf' || $active == 'zip') {
				foreach($book['Image'] as $image) {
					$files[] = $this->Book->generate_page($image, $this->Session->read('Contact.Contact'), $book['Book']);
				}
				if ($active == 'pdf') {
					require_once('/var/www/app/webroot/files/fpdf.php');
					$pdf = new FPDF('l');
					$images = $files; 
					
					reset($images);
					foreach ($files as $file) {
						$pdf->AddPage();
						$pdf->Image($file , 0,0, -102);
					}

					$pdf->Output($this->Session->read('Contact.Contact.name') . '-' . $book['Book']['name'] .'.pdf', 'D');
				}
				
				if ($active == 'zip') {
					$zipfile = $this->Book->create_zip($files, '/var/www/app/webroot/files/zip/' . Inflector::slug($this->Session->read('Contact.Contact.name')) . '-' . Inflector::slug($book['Book']['name']).'.zip', true); 
					$zipfile = str_replace('/var/www/app/webroot', '', $zipfile);
					$this->redirect($zipfile);
				}
			}
			$this->redirect(array('controller'=>'images', 'action'=>'index'));
		}
		
		$this->set('book', $book);
	}
		
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Book->create();
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('The book has been saved'));
				$this->redirect(array('controller'=>'books', 'action'=>'view', $this->Book->getLastInsertID(), 'active'));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.'));
			}
		}
		$images = $this->Book->Image->find('list');
		$this->set(compact('images'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void 
 */
	public function edit($id = null) {
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid book'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('The book has been saved'));
				$this->redirect(array('action' => 'view', $id, 1));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Book->read(null, $id);
		}
		$images = $this->Book->Image->find('list');

		$this->set(compact('images','contacts'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid book'));
		}
		if ($this->Book->delete()) {
			$this->Session->setFlash(__('Book deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Book was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
}