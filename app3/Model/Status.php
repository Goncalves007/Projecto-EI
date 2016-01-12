<?php
App::uses('AppModel', 'Model');
/**
 * Status Model
 *
 * @property Endorsement $Endorsement
 */
class Status extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'status';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'status';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Endorsement' => array(
			'className' => 'Endorsement',
			'foreignKey' => 'status_id',
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
