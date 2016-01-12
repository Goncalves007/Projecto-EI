<?php
App::uses('AppModel', 'Model');
/**
 * Currency Model
 *
 * @property ExternalRequest $ExternalRequest
 * @property InternalRequest $InternalRequest
 */
class Currency extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'label';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ExternalRequest' => array(
			'className' => 'ExternalRequest',
			'foreignKey' => 'currency_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'InternalRequest' => array(
			'className' => 'InternalRequest',
			'foreignKey' => 'currency_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
