<?php
App::uses('Beneficiary', 'Model');

/**
 * Beneficiary Test Case
 *
 */
class BeneficiaryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.beneficiary',
		'app.external_request',
		'app.office',
		'app.administration',
		'app.department',
		'app.internal_beneficiary',
		'app.internal_request',
		'app.user',
		'app.role',
		'app.local_beneficiary',
		'app.provider',
		'app.currency'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Beneficiary = ClassRegistry::init('Beneficiary');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Beneficiary);

		parent::tearDown();
	}

}
