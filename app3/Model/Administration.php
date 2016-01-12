<?php
App::uses('AppModel', 'Model');
/**
 * Administration Model
 *
 * @property Department $Department
 * @property ExternalRequest $ExternalRequest
 * @property InternalRequest $InternalRequest
 */
class Administration extends AppModel {

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
		'User' => array(
    	'className' => 'Admin.User', 
    	'foreignKey' => 'administration_id'
    	),
		'Department' => array(
			'className' => 'Department',
			'foreignKey' => 'administration_id',
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
		'ExternalRequest' => array(
			'className' => 'ExternalRequest',
			'foreignKey' => 'administration_id',
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
			'foreignKey' => 'administration_id',
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
