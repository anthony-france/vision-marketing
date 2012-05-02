<?php
App::uses('BuildsImage', 'Model');

/**
 * BuildsImage Test Case
 *
 */
class BuildsImageTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.builds_image', 'app.build', 'app.image', 'app.tag', 'app.images_tag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BuildsImage = ClassRegistry::init('BuildsImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BuildsImage);

		parent::tearDown();
	}

}
