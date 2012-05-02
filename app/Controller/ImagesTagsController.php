<?php
App::uses('AppController', 'Controller');
/**
 * ImagesTags Controller
 *
 * @property ImagesTag $ImagesTag
 */
class ImagesTagsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ImagesTag->recursive = 0;
		$this->set('imagesTags', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ImagesTag->id = $id;
		if (!$this->ImagesTag->exists()) {
			throw new NotFoundException(__('Invalid images tag'));
		}
		$this->set('imagesTag', $this->ImagesTag->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ImagesTag->create();
			if ($this->ImagesTag->save($this->request->data)) {
				$this->Session->setFlash(__('The images tag has been saved'));
				$this->redirect($this->referer());
				//$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The images tag could not be saved. Please, try again.'));
			}
		}
		$images = $this->ImagesTag->Image->find('list');
		$tags = $this->ImagesTag->Tag->find('list');
		$this->set(compact('images', 'tags'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ImagesTag->id = $id;
		if (!$this->ImagesTag->exists()) {
			throw new NotFoundException(__('Invalid images tag'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ImagesTag->save($this->request->data)) {
				$this->Session->setFlash(__('The images tag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The images tag could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ImagesTag->read(null, $id);
		}
		$images = $this->ImagesTag->Image->find('list');
		$tags = $this->ImagesTag->Tag->find('list');
		$this->set(compact('images', 'tags'));
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
		$this->ImagesTag->id = $id;
		if (!$this->ImagesTag->exists()) {
			throw new NotFoundException(__('Invalid images tag'));
		}
		if ($this->ImagesTag->delete()) {
			$this->Session->setFlash(__('Images tag deleted'));
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Images tag was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
