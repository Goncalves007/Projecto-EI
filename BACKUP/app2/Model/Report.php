<?php 
class Report extends AppModel{

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

public $validate = array(
    'report' => array(
        'rule1' => array(
            'rule'    => array(
            'extension',array('pdf')),
            'message' => 'Please upload pdf file only'
         ),
        'rule2' => array(
            'rule'    => array('fileSize', '<=', '1MB'),
            'message' => 'File must be less than 1MB'
        )
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
    )

);
}
?>