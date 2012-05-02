<?php
App::uses('GeneratedImage', 'Model');

/**
 * GeneratedImage Test Case
 *
 */
class GeneratedImageTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.generated_image', 'app.book', 'app.image', 'app.books_image', 'app.tag', 'app.images_tag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GeneratedImage = ClassRegistry::init('GeneratedImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GeneratedImage);

		parent::tearDown();
	}

}
