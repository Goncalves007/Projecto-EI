<?php
App::uses('AppModel', 'Model');
/**
 * Office Model
 *
 * @property ExternalRequest $ExternalRequest
 * @property InternalRequest $InternalRequest
 */
class Office extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'User' => array(
    	'className' => 'Admin.User', 
    	'foreignKey' => 'office_id'
    	),
		'ExternalRequest' => array(
			'className' => 'ExternalRequest',
			'foreignKey' => 'office_id',
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
			'foreignKey' => 'office_id',
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
		'Expediente' => array(
			'className' => 'Expediente',
			'foreignKey' => 'office_id',
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
