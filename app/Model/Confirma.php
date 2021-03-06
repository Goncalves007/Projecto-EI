<?php
App::uses('AppModel', 'Model');
/**
 * Confirma Model
 *
 * @property Expediente $Expediente
 */
class Confirma extends AppModel {

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
	public $belongsTo = array(
		'Expediente' => array(
            'className' => 'Expediente',
            'foreignKey' => 'nr_expediente',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
