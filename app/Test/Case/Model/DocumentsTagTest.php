<?php
App::uses('DocumentsTag', 'Model');

/**
 * DocumentsTag Test Case
 *
 */
class DocumentsTagTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.documents_tag', 'app.filename', 'app.tag', 'app.image', 'app.book', 'app.books_image', 'app.images_tag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DocumentsTag = ClassRegistry::init('DocumentsTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DocumentsTag);

		parent::tearDown();
	}

}
