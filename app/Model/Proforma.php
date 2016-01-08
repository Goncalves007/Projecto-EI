<?php 
class Proforma extends AppModel{

public $belongsTo = array(
        'ExternalRequest' => array(
            'className' => 'ExternalRequest',
            'foreignKey' => 'request_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )

    );

public $validate = array(
    'report' => array(
        'rule1' => array(
            'rule'    => array(
            'extension',array('pdf')),
            'message' => 'Please upload pdf file only'
         )
    ),
    'proposal_value' => array(
        'rule' => '/([0-9]{2,8})$/',
        'message' => '(Formato valido: xxxxxx) Ex. 100000',
        'allowEmpty' => false
    ),
    'title' => array(
        'rule' => '/[a-zA-Z0-9\._-\s]$/',
        'message' => 'Campo Obrigatorio',
        'allowEmpty' => false
    ),
    'description' => array(
        'rule' => '/[a-zA-Z0-9\._-\s]$/',
        'message' => 'Campo Obrigatorio',
        'allowEmpty' => false
    ),
    'proposal_invoice_number' => array(
        'rule' => '/([a-zA-Z0-9]{5,})$/',
        'message' => 'Somente 5 Digitos',
        'allowEmpty' => false
    )
);
}
?>