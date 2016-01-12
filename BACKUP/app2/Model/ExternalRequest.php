<?php
App::uses('AppModel', 'Model');
/**
 * ExternalRequest Model
 *
 * @property Office $Office
 * @property Department $Department
 * @property Administration $Administration
 * @property User $User
 * @property ExternalBeneficiary $ExternalBeneficiary
 * @property Provider $Provider
 * @property Currency $Currency
 */
class ExternalRequest extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'reference_application';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */

  public $validate = array(
  	'amount' => array(
  		'rule' => '/([0-9]{2,10})$/',
        'message' => '(Formato valido: xxxxxx) Ex. 100000',
        'allowEmpty' => false
    ),
    'payment_details' => array(
        'rule' => '/[a-zA-Z0-9\._-\s]$/',
        'message' => 'Campo Obrigatorio',
        'allowEmpty' => false
    ),
    'amount_in_words' => array(
        'rule' => '/[a-zA-Z0-9\._-\s]$/',
        'message' => 'Campo Obrigatorio',
        'allowEmpty' => false
    ),
    'office_id' => array(
        'rule' => '/([0-9]{1,})$/',
        'message' => 'Campo Obrigatorio',
        'allowEmpty' => false
    ),
    'department_id' => array(
        'rule' => '/([0-9]{1,})$/',
        'message' => 'Campo Obrigatorio',
        'allowEmpty' => false
    ),
    'administration_id' => array(
        'rule' => '/([0-9]{1,})$/',
        'message' => 'Campo Obrigatorio',
        'allowEmpty' => false
    ),
    'external_beneficiary_id' => array(
        'rule' => '/([0-9]{1,})$/',
        'message' => 'Campo Obrigatorio',
        'allowEmpty' => false
    ),
    'provider_id' => array(
        'rule' => '/([0-9]{1,})$/',
        'message' => 'Campo Obrigatorio',
        'allowEmpty' => false
    ),
    'project_id' => array(
        'rule' => '/([0-9]{1,})$/',
        'message' => 'Campo Obrigatorio',
        'allowEmpty' => true
    ),
    'currency_id' => array(
        'rule' => '/([0-9]{1,})$/',
        'message' => 'Campo Obrigatorio',
        'allowEmpty' => false
    )
    
      );

	public $belongsTo = array(
		'Office' => array(
			'className' => 'Office',
			'foreignKey' => 'office_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Department' => array(
			'className' => 'Department',
			'foreignKey' => 'department_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Administration' => array(
			'className' => 'Administration',
			'foreignKey' => 'administration_id',
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
		'ExternalBeneficiary' => array(
			'className' => 'ExternalBeneficiary',
			'foreignKey' => 'external_beneficiary_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Provider' => array(
			'className' => 'Provider',
			'foreignKey' => 'provider_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Currency' => array(
			'className' => 'Currency',
			'foreignKey' => 'currency_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Project' => array(
			'className' => 'Project',
			'foreignKey' => 'project_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
	));

    public $hasMany = array(
		'Report' => array(
			'className' => 'Report',
			'foreignKey' => 'request_id',
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
		'Endorsement' => array(
			'className' => 'Endorsement',
			'foreignKey' => 'request_id',
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
		'Endorso' => array(
			'className' => 'Endorso',
			'foreignKey' => 'request_id',
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
		'Proforma' => array(
			'className' => 'Proforma',
			'foreignKey' => 'request_id',
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
		'Budget' => array(
			'className' => 'Budget',
			'foreignKey' => 'department_id',
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
