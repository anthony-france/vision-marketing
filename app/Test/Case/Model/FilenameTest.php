<?php
App::uses('Filename', 'Model');

/**
 * Filename Test Case
 *
 */
class FilenameTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.filename', 'app.tag', 'app.image', 'app.book', 'app.books_image', 'app.images_tag', 'app.filenames_tag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Filename = ClassRegistry::init('Filename');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Filename);

		parent::tearDown();
	}

}
