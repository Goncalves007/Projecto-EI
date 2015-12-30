<?php 

/**
* 
*/
class AlertComponent extends Component
{
   protected $_controller = null;

   public function startup( Controller $controller){
         $this->_controller = $controller;

   }

    public function alert_dep($idDep = null) {
    $InternalRequests = $this->_controller->InternalRequest->Endorsement->find('all', array(
      'conditions' => array(
        'InternalRequest.department_id' => $idDep,
                'InternalRequest.request_status' => 0
        ),
      'fields' => array(
        'InternalRequest.reference_application',
        'InternalRequest.created',
        'InternalRequest.payment_details',
        'InternalRequest.request_status'
        ),
      ''
      ));
        
       /* $ExternalRequests = $this->Endorsement->ExternalRequest->find('all', array(
      'conditions' => array(
        'ExternalRequest.department_id' => $idDep,
        'ExternalRequest.request_status' => 0
        ),
      'fields' => array(
        'ExternalRequest.reference_application',
        'ExternalRequest.created',
        'ExternalRequest.payment_details',
        'ExternalRequest.request_status'
        )
      ));

    $this->set('InternalRequests',$InternalRequests);
    //$this->set('ExternalRequests',$ExternalRequests);


  $a[] = array();
    $b[] = array();

    foreach ($ExternalRequests as $ExternalRequest):
    $a[] = $ExternalRequest['ExternalRequest'];
    endforeach;

    foreach ($InternalRequests as $InternalRequest):
    $b[] = $InternalRequest['InternalRequest'];
    endforeach;

//Remover partes vazias
  $a = array_filter($a);
  $b = array_filter($b);

  $c = array_merge($a,$b);*/
  //$this->set('Reports',$c);
 //$this->set('InternalRequests',$InternalRequests);
   $alert = count($InternalRequests);
   return $alert;
  }



    
}
