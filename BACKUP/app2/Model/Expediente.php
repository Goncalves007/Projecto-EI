<?php
App::uses('AppModel', 'Model');
/**
 * Expediente Model
 *
 * @property Office $Office
 * @property User $User
 * @property Motorista $Motorista
 * @property Correio $Correio
 * @property Confirma $Confirma
 */
class Expediente extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Office' => array(
			'className' => 'Office',
			'foreignKey' => 'office_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Motorista' => array(
			'className' => 'Motorista',
			'foreignKey' => 'motorista_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Correio' => array(
			'className' => 'Correio',
			'foreignKey' => 'correio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'Confirma' => array(
			'className' => 'Confirma',
			'foreignKey' => 'nr_expediente',
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
