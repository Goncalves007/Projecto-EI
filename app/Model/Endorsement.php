<?php
App::uses('AppModel', 'Model');
/**
 * Endorsement Model
 *
 * @property User $User
 * @property Status $Status
 */
class Endorsement extends AppModel {

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
		'InternalRequest' => array(
            'className' => 'InternalRequest',
            'foreignKey' => 'request_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'ExternalRequest' => array(
            'className' => 'ExternalRequest',
            'foreignKey' => 'request_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
	);
}
