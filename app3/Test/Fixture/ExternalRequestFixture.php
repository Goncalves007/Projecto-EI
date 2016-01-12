<?php
/**
 * ExternalRequestFixture
 *
 */
class ExternalRequestFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'reference_application' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'office_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'department_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'administration_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'external_beneficiary_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'provider_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'amount' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'currency_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'amount_in_words' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'payment_details' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'proposal_value' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'proposal_invoice_number' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'proforma_invoice' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'original_invoice' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'reference_application' => 'Lorem ipsum dolor sit amet',
			'office_id' => 1,
			'department_id' => 1,
			'administration_id' => 1,
			'user_id' => 1,
			'external_beneficiary_id' => 1,
			'provider_id' => 1,
			'amount' => 1,
			'currency_id' => 1,
			'amount_in_words' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'payment_details' => 'Lorem ipsum dolor sit amet',
			'proposal_value' => 1,
			'proposal_invoice_number' => 'Lorem ipsum dolor sit a',
			'proforma_invoice' => 'Lorem ipsum dolor sit amet',
			'original_invoice' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-09-22 13:16:05',
			'modified' => '2015-09-22 13:16:05'
		),
	);

}
