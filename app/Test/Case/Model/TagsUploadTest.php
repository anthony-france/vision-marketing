<?php
App::uses('TagsUpload', 'Model');

/**
 * TagsUpload Test Case
 *
 */
class TagsUploadTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.tags_upload', 'app.upload', 'app.tag', 'app.image', 'app.book', 'app.books_image', 'app.images_tag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TagsUpload = ClassRegistry::init('TagsUpload');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TagsUpload);

		parent::tearDown();
	}

}
