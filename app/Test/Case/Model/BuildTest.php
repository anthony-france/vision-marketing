<?php
App::uses('Build', 'Model');

/**
 * Build Test Case
 *
 */
class BuildTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.build', 'app.image', 'app.tag', 'app.images_tag', 'app.builds_image');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Build = ClassRegistry::init('Build');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Build);

		parent::tearDown();
	}

}
