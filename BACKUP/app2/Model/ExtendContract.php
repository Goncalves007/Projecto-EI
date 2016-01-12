<?php
App::uses('AppModel', 'Model');
/**
 * ExtendContract Model
 *
 * @property AlertContrat $AlertContrat
 */
class ExtendContract extends AppModel {

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
		'AlertContrat' => array(
			'className' => 'AlertContrat',
			'foreignKey' => 'alert_contrat_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
