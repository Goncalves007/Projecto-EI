<?php
App::uses('AppModel', 'Model');
/**
 * AlertContrat Model
 *
 * @property ContractType $ContractType
 * @property ExtendContract $ExtendContract
 */
class AlertContrat extends AppModel {

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
		'ContractType' => array(
			'className' => 'ContractType',
			'foreignKey' => 'contract_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ExtendContract' => array(
			'className' => 'ExtendContract',
			'foreignKey' => 'alert_contrat_id',
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
