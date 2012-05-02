<?php
App::uses('AppController', 'Controller');
/**
 * Documents Controller
 *
 * @property Document $Document
 */
class DocumentsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Document->recursive = 2;
		$this->set('documents', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null, $action='null') {
		$this->Document->id = $id;
		if (!$this->Document->exists()) {
			throw new NotFoundException(__('Invalid document'));
		}
		$document = $this->Document->read(null, $id);
		
		if (!empty($action)) {
			if ($action == 'download') {
				$this->redirect("/".$document['Document']['dir'].'/'.$document['Document']['filename']);
			}
		}
		$this->set('document', $document);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Document->create();
			if ($this->Document->save($this->request->data)) {
				$this->Session->setFlash(__('The document has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The document could not be saved. Please, try again.'));
			}
		}
		$tags = $this->Document->Tag->find('list');
		$this->set(compact('tags'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Document->id = $id;
		if (!$this->Document->exists()) {
			throw new NotFoundException(__('Invalid document'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Document->save($this->request->data)) {
				$this->Session->setFlash(__('The document has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The document could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Document->read(null, $id);
		}
		$tags = $this->Document->Tag->find('list');
		$this->set(compact('tags'));
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
		$this->Document->id = $id;
		if (!$this->Document->exists()) {
			throw new NotFoundException(__('Invalid document'));
		}
		if ($this->Document->delete()) {
			$this->Session->setFlash(__('Document deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Document was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function tagged() {
		if ($this->request->is('post')) {
			
			$document_id = $this->request->data['Document']['Document']['id'];
			$tag = $this->Document->Tag->findByName($this->request->data['Document']['Tag']['name']);
			
			if ($tag) {
				$tag_id = $tag['Tag']['id'];
			}
			else {
				if ($this->Document->Tag->save($this->request->data['Document']['Tag'])) {
					$tag_id = $this->Document->Tag->getLastInsertId();
							

				}
				else {
					$this->Session->setFlash(__('The tag could not be saved. Please, try again.'));
				}	
			}
			
			if ($tag_id) {
				$tagged = false;
				$tagged = $this->Document->DocumentsTag->find('first', array('conditions'=>array('document_id'=>$document_id, 'tag_id'=>$tag_id)));
				if (!$tagged && $this->Document->DocumentsTag->save(array('DocumentsTag'=>array('document_id'=>$document_id, 'tag_id'=>$tag_id)))) {
					$this->Session->setFlash(__('Document Tagged'));
				}
				else {
					$this->Session->setFlash(__('Already Tagged'));
				}
			}			
			
		}
	}
}




