<?php
App::uses('AppController', 'Controller');
/**
 * Images Controller
 *
 * @property Image $Image
 */
class ImagesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Image->recursive = 2;
		$this->set('images', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Image->id = $id;
		if (!$this->Image->exists()) {
			throw new NotFoundException(__('Invalid image'));
		}
		$this->set('image', $this->Image->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Image->create();
			if ($this->Image->save($this->request->data)) {
				$this->Session->setFlash(__('The image has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image could not be saved. Please, try again.'));
			}
		}
		$tags = $this->Image->Tag->find('list');
		$books = $this->Image->Book->find('list');
		$this->set(compact('tags', 'books'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Image->id = $id;
		if (!$this->Image->exists()) {
			throw new NotFoundException(__('Invalid image'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Image->save($this->request->data)) {
				$this->Session->setFlash(__('The image has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Image->read(null, $id);
		}
		$tags = $this->Image->Tag->find('list');
		$books = $this->Image->Book->find('list');
		$this->set(compact('tags', 'books'));
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
		$this->Image->id = $id;
		if (!$this->Image->exists()) {
			throw new NotFoundException(__('Invalid image'));
		}
		if ($this->Image->delete()) {
			$this->Session->setFlash(__('Image deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Image was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function tagged() {
		$result = array();
		if($this->RequestHandler->isAjax()) {
						$this->layout = 'ajax';
		}
		
		if ($this->request->is('post')) {

			$tag_id = 0;
			$image_id = $this->request->data['Image']['Image']['id'];
			$tag = $this->Image->Tag->findByName($this->request->data['Image']['Tag']['name']);
			
			if ($tag) {
				$tag_id = $tag['Tag']['id'];
			}
			else {
				if ($this->Image->Tag->save($this->request->data['Image']['Tag'])) {
					$tag_id = $this->Image->Tag->getLastInsertId();
				}
				else {
					$this->Session->setFlash(__('The tag could not be saved. Please, try again.'));
				}	
			}

			$result['tag_id'] = $tag_id;
			$result['object_id'] = $image_id;
			$result['label'] = $this->request->data['Image']['Tag']['name'];
			
			if ($tag_id) {
				$tagged = false;
				$tagged = $this->Image->ImagesTag->find('first', array('conditions'=>array('image_id'=>$image_id, 'tag_id'=>$tag_id)));
				if (!$tagged && $this->Image->ImagesTag->save(array('ImagesTag'=>array('image_id'=>$image_id, 'tag_id'=>$tag_id)))) {
					$result['create'] = true;
				}
				else {
				
				}
			}
			else {
				
			}
		}
		$this->set('result', $result);
	}
}
