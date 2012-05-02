<?php
App::uses('FilenamesTag', 'Model');

/**
 * FilenamesTag Test Case
 *
 */
class FilenamesTagTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.filenames_tag', 'app.filename', 'app.tag', 'app.image', 'app.book', 'app.books_image', 'app.images_tag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FilenamesTag = ClassRegistry::init('FilenamesTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FilenamesTag);

		parent::tearDown();
	}

}
