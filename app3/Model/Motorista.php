<?php
App::uses('AppModel', 'Model');
/**
 * Motorista Model
 *
 * @property Expediente $Expediente
 */
class Motorista extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Expediente' => array(
			'className' => 'Expediente',
			'foreignKey' => 'motorista_id',
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
