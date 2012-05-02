<?php
App::uses('AppController', 'Controller');
/**
 * BooksImages Controller
 *
 * @property BooksImage $BooksImage
 */
class BooksImagesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BooksImage->recursive = 0;
		$this->set('booksImages', $this->paginate());
	}
  
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->BooksImage->id = $id;
		if (!$this->BooksImage->exists()) {
			throw new NotFoundException(__('Invalid books image'));
		}
		$this->set('booksImage', $this->BooksImage->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($bookid = null, $imageid = null) {
		if ($this->request->is('post')) {
			Controller::loadModel('Book');
			
			if ($bookid && $imageid) {
				$this->request->data['BooksImage']['book_id'] = $bookid;
				$this->request->data['BooksImage']['image_id'] = $imageid;
			}
			
			$book = $this->Book->read(null, $this->request->data['BooksImage']['book_id']);
			foreach($book['Image'] as $image) {
				if ($image['id'] == $this->request->data['BooksImage']['image_id']) {
					$this->Session->setFlash(__('This image is already in this book.'));
					$this->redirect(array('controller'=>'images', 'action' => 'index'));
				}
			}
			
			$this->BooksImage->create();
			if ($this->BooksImage->save($this->request->data)) {
				debug($this->request->data);
				
				$book = $this->Book->read(null, $this->request->data['BooksImage']['book_id']);
				$this->Session->write('Book', $book);
				
				$this->Session->setFlash(__('A page has been added to the book.'));
				//$this->redirect(array('controller'=>'images', 'action' => 'index'));
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The books image could not be saved. Please, try again.'));
			}
		}
		$books = $this->BooksImage->Book->find('list');
		$images = $this->BooksImage->Image->find('list');
		$this->set(compact('books', 'images'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->BooksImage->id = $id;
		if (!$this->BooksImage->exists()) {
			throw new NotFoundException(__('Invalid books image'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BooksImage->save($this->request->data)) {
				$this->Session->setFlash(__('The books image has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The books image could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->BooksImage->read(null, $id);
		}
		$books = $this->BooksImage->Book->find('list');
		$images = $this->BooksImage->Image->find('list');
		$this->set(compact('books', 'images'));
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
		$this->BooksImage->id = $id;
		if (!$this->BooksImage->exists()) {
			throw new NotFoundException(__('Invalid book page.'));
		}
		if ($this->BooksImage->delete()) {
			$this->Session->setFlash(__('Book page deleted'));
			//$this->redirect(array('controller'=>'images', 'action' => 'index'));
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Book page was not deleted'));
		$this->redirect(array('controller'=>'images', 'action' => 'index'));
	}
}
