<?php
App::uses('GeneratedPdf', 'Model');

/**
 * GeneratedPdf Test Case
 *
 */
class GeneratedPdfTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.generated_pdf', 'app.book', 'app.image', 'app.books_image', 'app.tag', 'app.images_tag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->GeneratedPdf = ClassRegistry::init('GeneratedPdf');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GeneratedPdf);

		parent::tearDown();
	}

}
