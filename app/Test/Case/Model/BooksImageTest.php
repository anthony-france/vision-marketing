<?php
App::uses('BooksImage', 'Model');

/**
 * BooksImage Test Case
 *
 */
class BooksImageTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.books_image', 'app.book', 'app.image', 'app.tag', 'app.images_tag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BooksImage = ClassRegistry::init('BooksImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BooksImage);

		parent::tearDown();
	}

}
