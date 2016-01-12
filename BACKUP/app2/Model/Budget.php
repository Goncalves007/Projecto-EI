<?php
App::uses('AppModel', 'Model');
/**
 * Budget Model
 *
 * @property Department $Department
 */
class Budget extends AppModel {

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
            'foreignKey' => 'department_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'ExternalRequest' => array(
            'className' => 'ExternalRequest',
            'foreignKey' => 'department_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )

    );
}
