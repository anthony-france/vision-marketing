<?php
App::uses('Document', 'Model');

/**
 * Document Test Case
 *
 */
class DocumentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.document', 'app.tag', 'app.image', 'app.book', 'app.books_image', 'app.images_tag', 'app.documents_tag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Document = ClassRegistry::init('Document');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Document);

		parent::tearDown();
	}

}
