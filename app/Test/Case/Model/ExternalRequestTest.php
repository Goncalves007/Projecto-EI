<?php
App::uses('ExternalRequest', 'Model');

/**
 * ExternalRequest Test Case
 *
 */
class ExternalRequestTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.external_request',
		'app.office',
		'app.administration',
		'app.department',
		'app.beneficiary',
		'app.internal_request',
		'app.user',
		'app.role',
		'app.provider',
		'app.currency',
		'app.external_beneficiary'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ExternalRequest = ClassRegistry::init('ExternalRequest');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ExternalRequest);

		parent::tearDown();
	}

}
