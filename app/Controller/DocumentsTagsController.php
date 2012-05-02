<?php
App::uses('AppController', 'Controller'); 
/**
 * DocumentsTags Controller
 *
 * @property DocumentsTag $DocumentsTag
 */
class DocumentsTagsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DocumentsTag->recursive = 0;
		$this->set('documentsTags', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->DocumentsTag->id = $id;
		if (!$this->DocumentsTag->exists()) {
			throw new NotFoundException(__('Invalid documents tag'));
		}
		$this->set('documentsTag', $this->DocumentsTag->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
		
			$this->DocumentsTag->create();
			if ($this->DocumentsTag->save($this->request->data)) {
				$this->Session->setFlash(__('The documents tag has been saved'));
				$this->redirect($this->referer());
				//$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The documents tag could not be saved. Please, try again.'));
			}
		}
		$filenames = $this->DocumentsTag->Filename->find('list');
		$tags = $this->DocumentsTag->Tag->find('list');
		$this->set(compact('filenames', 'tags'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->DocumentsTag->id = $id;
		if (!$this->DocumentsTag->exists()) {
			throw new NotFoundException(__('Invalid documents tag'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DocumentsTag->save($this->request->data)) {
				$this->Session->setFlash(__('The documents tag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The documents tag could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->DocumentsTag->read(null, $id);
		}
		$filenames = $this->DocumentsTag->Filename->find('list');
		$tags = $this->DocumentsTag->Tag->find('list');
		$this->set(compact('filenames', 'tags'));
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
		$this->DocumentsTag->id = $id;
		if (!$this->DocumentsTag->exists()) {
			throw new NotFoundException(__('Invalid documents tag'));
		}
		if ($this->DocumentsTag->delete()) {
			$this->Session->setFlash(__('Documents tag deleted'));
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Documents tag was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
