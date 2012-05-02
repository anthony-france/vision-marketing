<?php
App::uses('ImagesTag', 'Model');

/**
 * ImagesTag Test Case
 *
 */
class ImagesTagTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.images_tag', 'app.image', 'app.tag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ImagesTag = ClassRegistry::init('ImagesTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ImagesTag);

		parent::tearDown();
	}

}
