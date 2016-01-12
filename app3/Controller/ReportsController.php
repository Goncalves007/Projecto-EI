<?php 
class ReportsController extends AppController{
  
  public $helpers=array('Html','Form','Js' => array('Jquery'));
  //public $helpers = array('Js' => array('Jquery'));
  public $components = array('Mail');


  
  public function over_all(){

    if ($this->request->is('post')) {
    if (isset($this->request->data['Search']['search']) && !empty($this->request->data['Search']['search'])) {
      $reference_application = $this->request->data['Search']['search'];

      if (substr($reference_application, 0,6)=='RefInt') {
        $Pesquiza = $this->Report->InternalRequest->find('all', array(
          'conditions' => array(
            'InternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }elseif (substr($reference_application, 0,6)=='RefExt') {
        $Pesquiza = $this->Report->ExternalRequest->find('all', array(
          'conditions' => array(
            'ExternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }
     }

   } 

    $ExternalRequests = $this->Report->ExternalRequest->find('all', 
     array(
        'conditions'=>array(
          'or'=>array(
            array('ExternalRequest.request_status' =>0),
            array('ExternalRequest.request_status' =>1),
            array('ExternalRequest.request_status' =>2),
            array('ExternalRequest.request_status' =>3),
            array('ExternalRequest.request_status' =>4),
            array('ExternalRequest.request_status' =>5),
            array('ExternalRequest.request_status' =>6),
            array('ExternalRequest.request_status' =>7),
            array('ExternalRequest.request_status' =>9)
           )
          ),
        'fields'=>array(
                    'ExternalRequest.id',
                    'ExternalRequest.user_id',
                    'ExternalRequest.reference_application',
                    'ExternalRequest.payment_details',
                    'ExternalRequest.created',
                    'ExternalRequest.request_status',
                    'ExternalRequest.department_id'
                ),
        'order' => 'ExternalRequest.created DESC'
        ));

   $InternalRequests = $this->Report->InternalRequest->find('all', 
     array(
        'conditions'=>array(
          'or'=>array(
            array('InternalRequest.request_status' =>0),
            array('InternalRequest.request_status' =>1),
            array('InternalRequest.request_status' =>2),
            array('InternalRequest.request_status' =>3),
            array('InternalRequest.request_status' =>4),
            array('InternalRequest.request_status' =>5),
            array('InternalRequest.request_status' =>6),
            array('InternalRequest.request_status' =>7),
            array('InternalRequest.request_status' =>9)
           )
          ),
        'fields'=>array(
                    'InternalRequest.id',
                    'InternalRequest.user_id',
                    'InternalRequest.reference_application',
                    'InternalRequest.payment_details',
                    'InternalRequest.created',
                    'InternalRequest.request_status',
                    'InternalRequest.department_id'
                ),
        'order' => 'InternalRequest.created DESC'
        ));

    $a[] = array();
    $b[] = array();

    foreach ($ExternalRequests as $ExternalRequest):
    $a[] = $ExternalRequest['ExternalRequest'];
    endforeach;

    foreach ($InternalRequests as $InternalRequest):
    $b[] = $InternalRequest['InternalRequest'];
    endforeach;

    if(!isset($Pesquiza) || empty($Pesquiza)) {
        $Pesquiza ='';
     }

//Remover partes vazias
  $a = array_filter($a);
  $b = array_filter($b);

  $c = array_merge($a,$b);
  $this->set('Reports',$c);
  $this->set('Pesquiza',$Pesquiza);

$this->render('index');
  }

  public function all(){

  if ($this->request->is('post')) {
    if (isset($this->request->data['Search']['search']) && !empty($this->request->data['Search']['search'])) {
      $reference_application = $this->request->data['Search']['search'];

      if (substr($reference_application, 0,6)=='RefInt') {
        $Pesquiza = $this->Report->InternalRequest->find('all', array(
          'conditions' => array(
            'InternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }elseif (substr($reference_application, 0,6)=='RefExt') {
        $Pesquiza = $this->Report->ExternalRequest->find('all', array(
          'conditions' => array(
            'ExternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }
     }

   }



    $ExternalRequests = $this->Report->ExternalRequest->find('all', 
     array(
        'conditions'=>array(
          'or'=>array(
            array('ExternalRequest.request_status' =>1),
            array('ExternalRequest.request_status' =>3),
            array('ExternalRequest.request_status' =>5),
            array('ExternalRequest.request_status' =>7)
           )
          ),
        'fields'=>array(
                    'ExternalRequest.id',
                    'ExternalRequest.user_id',
                    'ExternalRequest.reference_application',
                    'ExternalRequest.payment_details',
                    'ExternalRequest.created',
                    'ExternalRequest.department_id',
                    'ExternalRequest.request_status'
                ),
        'order' => 'ExternalRequest.created DESC'
        ));

   $InternalRequests = $this->Report->InternalRequest->find('all', 
     array(
        'conditions'=>array(
          'or'=>array(
            array('InternalRequest.request_status' =>1),
            array('InternalRequest.request_status' =>3),
            array('InternalRequest.request_status' =>5),
            array('InternalRequest.request_status' =>7)
           )
          ),
        'fields'=>array(
                    'InternalRequest.id',
                    'InternalRequest.user_id',
                    'InternalRequest.reference_application',
                    'InternalRequest.payment_details',
                    'InternalRequest.created',
                    'InternalRequest.department_id',
                    'InternalRequest.request_status'
                ),
        'order' => 'InternalRequest.created DESC'
        ));

    $a[] = array();
    $b[] = array();

    foreach ($ExternalRequests as $ExternalRequest):
    $a[] = $ExternalRequest['ExternalRequest'];
    endforeach;

    foreach ($InternalRequests as $InternalRequest):
    $b[] = $InternalRequest['InternalRequest'];
    endforeach;

if(!isset($Pesquiza) || empty($Pesquiza)) {
        $Pesquiza ='';
     }

//Remover partes vazias
  $a = array_filter($a);
  $b = array_filter($b);

  $c = array_merge($a,$b);
  $this->set('Reports',$c);
  $this->set('Pesquiza',$Pesquiza);

  $this->render('index');
  
  }

  public function rejected($idUsr=null,$depUser=null){

   if ($this->request->is('post')) {
    if (isset($this->request->data['Search']['search']) && !empty($this->request->data['Search']['search'])) {
      $reference_application = $this->request->data['Search']['search'];

      if (substr($reference_application, 0,6)=='RefInt') {
        $Pesquiza = $this->Report->InternalRequest->find('all', array(
          'conditions' => array(
            'InternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }elseif (substr($reference_application, 0,6)=='RefExt') {
        $Pesquiza = $this->Report->ExternalRequest->find('all', array(
          'conditions' => array(
            'ExternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }
     }

   } 

    $ExternalRequests = $this->Report->ExternalRequest->find('all', 
     array(
        'conditions'=>array(
         'ExternalRequest.user_id' => $idUsr,
         'ExternalRequest.department_id' => $depUser, 
          'or'=>array(
            array('ExternalRequest.request_status' =>2),
            array('ExternalRequest.request_status' =>4),
            array('ExternalRequest.request_status' =>6),
            )
          ),
        'fields'=>array(
                    'ExternalRequest.id',
                    'ExternalRequest.user_id',
                    'ExternalRequest.reference_application',
                    'ExternalRequest.payment_details',
                    'ExternalRequest.created',
                    'ExternalRequest.request_status',
                    'ExternalRequest.department_id'
                ),
        'order' => 'ExternalRequest.created DESC'
        ));

   $InternalRequests = $this->Report->InternalRequest->find('all', 
     array(
        'conditions'=>array(
         'InternalRequest.user_id' => $idUsr,
         'InternalRequest.department_id' => $depUser, 
          'or'=>array(
            array('InternalRequest.request_status' =>2),
            array('InternalRequest.request_status' =>4),
            array('InternalRequest.request_status' =>6),
            )
          ),
        'fields'=>array(
                    'InternalRequest.id',
                    'InternalRequest.user_id',
                    'InternalRequest.reference_application',
                    'InternalRequest.payment_details',
                    'InternalRequest.created',
                    'InternalRequest.request_status',
                    'InternalRequest.department_id'
                ),
        'order' => 'InternalRequest.created DESC'
        ));

    $a[] = array();
    $b[] = array();

    foreach ($ExternalRequests as $ExternalRequest):
    $a[] = $ExternalRequest['ExternalRequest'];
    endforeach;

    foreach ($InternalRequests as $InternalRequest):
    $b[] = $InternalRequest['InternalRequest'];
    endforeach;

  if(!isset($Pesquiza) || empty($Pesquiza)) {
        $Pesquiza ='';
     }

//Remover partes vazias
  $a = array_filter($a);
  $b = array_filter($b);

  $c = array_merge($a,$b);
  $this->set('Reports',$c);
  $this->set('Pesquiza',$Pesquiza);

  $this->render('index');
  }

  public function rejected_d($depUser=null){

    if ($this->request->is('post')) {
    if (isset($this->request->data['Search']['search']) && !empty($this->request->data['Search']['search'])) {
      $reference_application = $this->request->data['Search']['search'];

      if (substr($reference_application, 0,6)=='RefInt') {
        $Pesquiza = $this->Report->InternalRequest->find('all', array(
          'conditions' => array(
            'InternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }elseif (substr($reference_application, 0,6)=='RefExt') {
        $Pesquiza = $this->Report->ExternalRequest->find('all', array(
          'conditions' => array(
            'ExternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }
     }

   } 

    $ExternalRequests = $this->Report->ExternalRequest->find('all', 
     array(
        'conditions'=>array(
         //'ExternalRequest.user_id' => $idUsr,
         'ExternalRequest.department_id' => $depUser, 
          'or'=>array(
            array('ExternalRequest.request_status' =>2),
            array('ExternalRequest.request_status' =>4),
            array('ExternalRequest.request_status' =>6),
            )
          ),
        'fields'=>array(
                    'ExternalRequest.id',
                    'ExternalRequest.user_id',
                    'ExternalRequest.reference_application',
                    'ExternalRequest.payment_details',
                    'ExternalRequest.created',
                    'ExternalRequest.request_status',
                    'ExternalRequest.department_id'
                ),
        'order' => 'ExternalRequest.created DESC'
        ));

   $InternalRequests = $this->Report->InternalRequest->find('all', 
     array(
        'conditions'=>array(
         //'InternalRequest.user_id' => $idUsr,
         'InternalRequest.department_id' => $depUser, 
          'or'=>array(
            array('InternalRequest.request_status' =>2),
            array('InternalRequest.request_status' =>4),
            array('InternalRequest.request_status' =>6),
            )
          ),
        'fields'=>array(
                    'InternalRequest.id',
                    'InternalRequest.user_id',
                    'InternalRequest.reference_application',
                    'InternalRequest.payment_details',
                    'InternalRequest.created',
                    'InternalRequest.request_status',
                    'InternalRequest.department_id'
                ),
        'order' => 'InternalRequest.created DESC'
        ));

    $a[] = array();
    $b[] = array();

    foreach ($ExternalRequests as $ExternalRequest):
    $a[] = $ExternalRequest['ExternalRequest'];
    endforeach;

    foreach ($InternalRequests as $InternalRequest):
    $b[] = $InternalRequest['InternalRequest'];
    endforeach;

    if(!isset($Pesquiza) || empty($Pesquiza)) {
        $Pesquiza ='';
     }

//Remover partes vazias
  $a = array_filter($a);
  $b = array_filter($b);

  $c = array_merge($a,$b);
  $this->set('Reports',$c);
  $this->set('Pesquiza',$Pesquiza);

  $this->render('index');
  }

  public function finished_d($depUser=null){

  if ($this->request->is('post')) {
    if (isset($this->request->data['Search']['search']) && !empty($this->request->data['Search']['search'])) {
      $reference_application = $this->request->data['Search']['search'];

      if (substr($reference_application, 0,6)=='RefInt') {
        $Pesquiza = $this->Report->InternalRequest->find('all', array(
          'conditions' => array(
            'InternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }elseif (substr($reference_application, 0,6)=='RefExt') {
        $Pesquiza = $this->Report->ExternalRequest->find('all', array(
          'conditions' => array(
            'ExternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }
     }

   } 

    $ExternalRequests = $this->Report->ExternalRequest->find('all', 
     array(
        'conditions'=>array(
         //'ExternalRequest.user_id' => $idUsr,
         'ExternalRequest.department_id' => $depUser, 
          'or'=>array(
            array('ExternalRequest.request_status' =>9)
            )
          ),
        'fields'=>array(
                    'ExternalRequest.id',
                    'ExternalRequest.user_id',
                    'ExternalRequest.reference_application',
                    'ExternalRequest.payment_details',
                    'ExternalRequest.created',
                    'ExternalRequest.request_status',
                    'ExternalRequest.department_id'
                ),
        'order' => 'ExternalRequest.created DESC'
        ));

   $InternalRequests = $this->Report->InternalRequest->find('all', 
     array(
        'conditions'=>array(
         //'InternalRequest.user_id' => $idUsr,
         'InternalRequest.department_id' => $depUser, 
          'or'=>array(
            array('InternalRequest.request_status' =>9)
            )
          ),
        'fields'=>array(
                    'InternalRequest.id',
                    'InternalRequest.user_id',
                    'InternalRequest.reference_application',
                    'InternalRequest.payment_details',
                    'InternalRequest.created',
                    'InternalRequest.request_status',
                    'InternalRequest.department_id'
                ),
        'order' => 'InternalRequest.created DESC'
        ));

    $a[] = array();
    $b[] = array();

    foreach ($ExternalRequests as $ExternalRequest):
    $a[] = $ExternalRequest['ExternalRequest'];
    endforeach;

    foreach ($InternalRequests as $InternalRequest):
    $b[] = $InternalRequest['InternalRequest'];
    endforeach;

 if(!isset($Pesquiza) || empty($Pesquiza)) {
        $Pesquiza ='';
     }

//Remover partes vazias
  $a = array_filter($a);
  $b = array_filter($b);

  $c = array_merge($a,$b);
  $this->set('Reports',$c);

  $this->set('Pesquiza',$Pesquiza);
  $this->render('index');
  }

  public function process_d($depUser=null){
   
  if ($this->request->is('post')) {
    if (isset($this->request->data['Search']['search']) && !empty($this->request->data['Search']['search'])) {
      $reference_application = $this->request->data['Search']['search'];

      if (substr($reference_application, 0,6)=='RefInt') {
        $Pesquiza = $this->Report->InternalRequest->find('all', array(
          'conditions' => array(
            'InternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }elseif (substr($reference_application, 0,6)=='RefExt') {
        $Pesquiza = $this->Report->ExternalRequest->find('all', array(
          'conditions' => array(
            'ExternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }
     }

   }

    $ExternalRequests = $this->Report->ExternalRequest->find('all', 
     array(
        'conditions'=>array(
          //'ExternalRequest.user_id' => $idUsr,
          'ExternalRequest.department_id' => $depUser,
          'or'=>array(
            array('ExternalRequest.request_status' =>1),
            array('ExternalRequest.request_status' =>3),
            array('ExternalRequest.request_status' =>5),
            array('ExternalRequest.request_status' =>7)
            )
          ),
        'fields'=>array(
                    'ExternalRequest.id',
                    'ExternalRequest.user_id',
                    'ExternalRequest.reference_application',
                    'ExternalRequest.payment_details',
                    'ExternalRequest.created',
                    'ExternalRequest.request_status',
                    'ExternalRequest.department_id'
                ),
        'order' => 'ExternalRequest.created DESC'
        ));

   $InternalRequests = $this->Report->InternalRequest->find('all', 
     array(
        'conditions'=>array(
                    //'InternalRequest.user_id' => $idUsr,
                    'InternalRequest.department_id' => $depUser,
                    'or'=>array(
                      array('InternalRequest.request_status' =>1),
                      array('InternalRequest.request_status' =>3),
                      array('InternalRequest.request_status' =>5),
                      array('InternalRequest.request_status' =>7)
                      )              
          ),
        'fields'=>array(
                    'InternalRequest.id',
                    'InternalRequest.user_id',
                    'InternalRequest.reference_application',
                    'InternalRequest.payment_details',
                    'InternalRequest.created',
                    'InternalRequest.request_status',
                    'InternalRequest.department_id'
                ),
        'order' => 'InternalRequest.created DESC'
        ));

    $a[] = array();
    $b[] = array();

    foreach ($ExternalRequests as $ExternalRequest):
    $a[] = $ExternalRequest['ExternalRequest'];
    endforeach;
  
if(!isset($Pesquiza) || empty($Pesquiza)) {
        $Pesquiza ='';
     }

    foreach ($InternalRequests as $InternalRequest):
    $b[] = $InternalRequest['InternalRequest'];
    endforeach;

//Remover partes vazias
  $a = array_filter($a);
  $b = array_filter($b);

  $c = array_merge($a,$b);
  $this->set('Reports',$c);
  $this->set('Pesquiza',$Pesquiza);
   $this->render('index');
}


  public function progress_d($depUser=null,$status=null){

  if ($this->request->is('post')) {
    if (isset($this->request->data['Search']['search']) && !empty($this->request->data['Search']['search'])) {
      $reference_application = $this->request->data['Search']['search'];

      if (substr($reference_application, 0,6)=='RefInt') {
        $Pesquiza = $this->Report->InternalRequest->find('all', array(
          'conditions' => array(
            'InternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }elseif (substr($reference_application, 0,6)=='RefExt') {
        $Pesquiza = $this->Report->ExternalRequest->find('all', array(
          'conditions' => array(
            'ExternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }
     }

   }

    $ExternalRequests = $this->Report->ExternalRequest->find('all', 
     array(
        'conditions'=>array(
          'ExternalRequest.request_status' =>$status,
          'ExternalRequest.department_id' => $depUser
          ),
        'fields'=>array(
                    'ExternalRequest.id',
                    'ExternalRequest.user_id',
                    'ExternalRequest.reference_application',
                    'ExternalRequest.payment_details',
                    'ExternalRequest.created',
                    'ExternalRequest.department_id',
                    'ExternalRequest.request_status'
                ),
        'order' => 'ExternalRequest.created DESC'
        ));

   $InternalRequests = $this->Report->InternalRequest->find('all', 
     array(
        'conditions'=>array(
                    'InternalRequest.request_status' =>$status,
                    'InternalRequest.department_id' => $depUser
          ),
        'fields'=>array(
                    'InternalRequest.id',
                    'InternalRequest.user_id',
                    'InternalRequest.reference_application',
                    'InternalRequest.payment_details',
                    'InternalRequest.created',
                    'InternalRequest.department_id',
                    'InternalRequest.request_status'
                ),
        'order' => 'InternalRequest.created DESC'
        ));

    $a[] = array();
    $b[] = array();

    foreach ($ExternalRequests as $ExternalRequest):
    $a[] = $ExternalRequest['ExternalRequest'];
    endforeach;

    foreach ($InternalRequests as $InternalRequest):
    $b[] = $InternalRequest['InternalRequest'];
    endforeach;

if(!isset($Pesquiza) || empty($Pesquiza)) {
        $Pesquiza ='';
     }

//Remover partes vazias
  $a = array_filter($a);
  $b = array_filter($b);

  $c = array_merge($a,$b);
  $this->set('Reports',$c);
  $this->set('Pesquiza',$Pesquiza);
   $this->render('index');
}


  public function progress($idUsr=null,$depUser=null){
    
    if ($this->request->is('post')) {
    if (isset($this->request->data['Search']['search']) && !empty($this->request->data['Search']['search'])) {
      $reference_application = $this->request->data['Search']['search'];

      if (substr($reference_application, 0,6)=='RefInt') {
        $Pesquiza = $this->Report->InternalRequest->find('all', array(
          'conditions' => array(
            'InternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }elseif (substr($reference_application, 0,6)=='RefExt') {
        $Pesquiza = $this->Report->ExternalRequest->find('all', array(
          'conditions' => array(
            'ExternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }
     }

   }

    $ExternalRequests = $this->Report->ExternalRequest->find('all', 
     array(
        'conditions'=>array(
          'ExternalRequest.user_id' => $idUsr,
          'ExternalRequest.department_id' => $depUser,
          'or'=>array(
            array('ExternalRequest.request_status' =>0),
            array('ExternalRequest.request_status' =>1),
            array('ExternalRequest.request_status' =>3),
            array('ExternalRequest.request_status' =>5),
            array('ExternalRequest.request_status' =>7)
            )
          ),
        'fields'=>array(
                    'ExternalRequest.id',
                    'ExternalRequest.user_id',
                    'ExternalRequest.reference_application',
                    'ExternalRequest.payment_details',
                    'ExternalRequest.created',
                    'ExternalRequest.request_status',
                    'ExternalRequest.department_id'
                ),
        'order' => 'ExternalRequest.created DESC'
        ));

   $InternalRequests = $this->Report->InternalRequest->find('all', 
     array(
        'conditions'=>array(
                    'InternalRequest.user_id' => $idUsr,
                    'InternalRequest.department_id' => $depUser,
                    'or'=>array(
                      array('InternalRequest.request_status' =>0),
                      array('InternalRequest.request_status' =>1),
                      array('InternalRequest.request_status' =>3),
                      array('InternalRequest.request_status' =>5),
                      array('InternalRequest.request_status' =>7)
                      )              
          ),
        'fields'=>array(
                    'InternalRequest.id',
                    'InternalRequest.user_id',
                    'InternalRequest.reference_application',
                    'InternalRequest.payment_details',
                    'InternalRequest.created',
                    'InternalRequest.request_status',
                    'InternalRequest.department_id'
                ),
        'order' => 'InternalRequest.created DESC'
        ));

    $a[] = array();
    $b[] = array();

    foreach ($ExternalRequests as $ExternalRequest):
    $a[] = $ExternalRequest['ExternalRequest'];
    endforeach;

    foreach ($InternalRequests as $InternalRequest):
    $b[] = $InternalRequest['InternalRequest'];
    endforeach;

if(!isset($Pesquiza) || empty($Pesquiza)) {
        $Pesquiza ='';
     }

//Remover partes vazias
  $a = array_filter($a);
  $b = array_filter($b);

  $c = array_merge($a,$b);
  $this->set('Reports',$c);
  $this->set('Pesquiza',$Pesquiza);
  $this->render('index'); 
}



  /*function to display all files details*/
  public function finished($idUsr=null,$depUser=null){

  if ($this->request->is('post')) {
    if (isset($this->request->data['Search']['search']) && !empty($this->request->data['Search']['search'])) {
      $reference_application = $this->request->data['Search']['search'];

      if (substr($reference_application, 0,6)=='RefInt') {
        $Pesquiza = $this->Report->InternalRequest->find('all', array(
          'conditions' => array(
            'InternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }elseif (substr($reference_application, 0,6)=='RefExt') {
        $Pesquiza = $this->Report->ExternalRequest->find('all', array(
          'conditions' => array(
            'ExternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }
     }

   }

    $ExternalRequests = $this->Report->ExternalRequest->find('all', 
     array(
        'conditions'=>array(
         'ExternalRequest.user_id' => $idUsr,
         'ExternalRequest.department_id' => $depUser, 
          'or'=>array(
            array('ExternalRequest.request_status' =>9)
            )
          ),
        'fields'=>array(
                    'ExternalRequest.id',
                    'ExternalRequest.user_id',
                    'ExternalRequest.reference_application',
                    'ExternalRequest.payment_details',
                    'ExternalRequest.created',
                    'ExternalRequest.request_status',
                    'ExternalRequest.department_id'
                ),
        'order' => 'ExternalRequest.created DESC'
        ));

   $InternalRequests = $this->Report->InternalRequest->find('all', 
     array(
        'conditions'=>array(
         'InternalRequest.user_id' => $idUsr,
         'InternalRequest.department_id' => $depUser, 
          'or'=>array(
            array('InternalRequest.request_status' =>9)
            )
          ),
        'fields'=>array(
                    'InternalRequest.id',
                    'InternalRequest.user_id',
                    'InternalRequest.reference_application',
                    'InternalRequest.payment_details',
                    'InternalRequest.created',
                    'InternalRequest.request_status',
                    'InternalRequest.department_id'
                ),
        'order' => 'InternalRequest.created DESC'
        ));

    $a[] = array();
    $b[] = array();

    foreach ($ExternalRequests as $ExternalRequest):
    $a[] = $ExternalRequest['ExternalRequest'];
    endforeach;

    foreach ($InternalRequests as $InternalRequest):
    $b[] = $InternalRequest['InternalRequest'];
    endforeach;

  if(!isset($Pesquiza) || empty($Pesquiza)) {
        $Pesquiza ='';
     }

//Remover partes vazias
  $a = array_filter($a);
  $b = array_filter($b);

  $c = array_merge($a,$b);
  $this->set('Reports',$c);
  $this->set('Pesquiza',$Pesquiza);
  $this->render('index');
}

public function finished_o(){

if ($this->request->is('post')) {
    if (isset($this->request->data['Search']['search']) && !empty($this->request->data['Search']['search'])) {
      $reference_application = $this->request->data['Search']['search'];

      if (substr($reference_application, 0,6)=='RefInt') {
        $Pesquiza = $this->Report->InternalRequest->find('all', array(
          'conditions' => array(
            'InternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }elseif (substr($reference_application, 0,6)=='RefExt') {
        $Pesquiza = $this->Report->ExternalRequest->find('all', array(
          'conditions' => array(
            'ExternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }
     }

   }

    $ExternalRequests = $this->Report->ExternalRequest->find('all', 
     array(
        'conditions'=>array(
          'or'=>array(
            array('ExternalRequest.request_status' =>9)
            )
          ),
        'fields'=>array(
                    'ExternalRequest.id',
                    'ExternalRequest.user_id',
                    'ExternalRequest.reference_application',
                    'ExternalRequest.payment_details',
                    'ExternalRequest.created',
                    'ExternalRequest.request_status',
                    'ExternalRequest.department_id'
                ),
        'order' => 'ExternalRequest.created DESC'
        ));

   $InternalRequests = $this->Report->InternalRequest->find('all', 
     array(
        'conditions'=>array(
          'or'=>array(
            array('InternalRequest.request_status' =>9)
            )
          ),
        'fields'=>array(
                    'InternalRequest.id',
                    'InternalRequest.user_id',
                    'InternalRequest.reference_application',
                    'InternalRequest.payment_details',
                    'InternalRequest.created',
                    'InternalRequest.request_status',
                    'InternalRequest.department_id'
                ),
        'order' => 'InternalRequest.created DESC'
        ));

    $a[] = array();
    $b[] = array();

    foreach ($ExternalRequests as $ExternalRequest):
    $a[] = $ExternalRequest['ExternalRequest'];
    endforeach;

    foreach ($InternalRequests as $InternalRequest):
    $b[] = $InternalRequest['InternalRequest'];
    endforeach;

  if(!isset($Pesquiza) || empty($Pesquiza)) {
        $Pesquiza ='';
     }  

//Remover partes vazias
  $a = array_filter($a);
  $b = array_filter($b);

  $c = array_merge($a,$b);
  $this->set('Reports',$c);
  $this->set('Pesquiza',$Pesquiza);
  $this->render('index');
}



  public function index($idUsr=null,$depUser=null) {

    if ($this->request->is('post')) {
    if (isset($this->request->data['Search']['search']) && !empty($this->request->data['Search']['search'])) {
      $reference_application = $this->request->data['Search']['search'];
      
      if (substr($reference_application, 0,6)=='RefInt') {
        $Pesquiza = $this->Report->InternalRequest->find('all', array(
          'conditions' => array(
            'InternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }elseif (substr($reference_application, 0,6)=='RefExt') {
        $Pesquiza = $this->Report->ExternalRequest->find('all', array(
          'conditions' => array(
            'ExternalRequest.reference_application' =>$reference_application
            )
           )
         );
      }
     }
   } 

   $ExternalRequests = $this->Report->ExternalRequest->find('all', 
     array(
        'conditions'=>array(
         'ExternalRequest.user_id'=> $idUsr,
         'ExternalRequest.department_id' => $depUser
          ),
        'fields'=>array(
                    'ExternalRequest.id',
                    'ExternalRequest.user_id',
                    'ExternalRequest.reference_application',
                    'ExternalRequest.payment_details',
                    'ExternalRequest.created',
                    'ExternalRequest.request_status',
                    'ExternalRequest.department_id'
                ),
        'order' => 'ExternalRequest.created DESC'
        ));

   $InternalRequests = $this->Report->InternalRequest->find('all', 
     array(
        'conditions'=>array(
                    'InternalRequest.user_id'=> $idUsr,
                    'InternalRequest.department_id' => $depUser

          ),
        'fields'=>array(
                    'InternalRequest.id',
                    'InternalRequest.user_id',
                    'InternalRequest.reference_application',
                    'InternalRequest.payment_details',
                    'InternalRequest.created',
                    'InternalRequest.request_status',
                    'InternalRequest.department_id'
                ),
        'order' => 'InternalRequest.created DESC'
        ));

    $a[] = array();
    $b[] = array();

    foreach ($ExternalRequests as $ExternalRequest):
    $a[] = $ExternalRequest['ExternalRequest'];
    endforeach;

    foreach ($InternalRequests as $InternalRequest):
    $b[] = $InternalRequest['InternalRequest'];
    endforeach;

if(!isset($Pesquiza) || empty($Pesquiza)) {
        $Pesquiza ='';
     }

//Remover partes vazias
  $a = array_filter($a);
  $b = array_filter($b);

  $c = array_merge($a,$b);
  $this->set('Reports',$c);
   $this->set('Pesquiza',$Pesquiza);
  
}

  public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid Report'));
        }

        $Report = $this->Report->findById($id);
        if (!$Report) {
            throw new NotFoundException(__('Invalid Report'));
        }

        $this->set('Report', $Report);
    }
  
  /*function to add file record into the database */
  public function add($lastID=null, $ref=null, $idUsr=null, $correio=null) {
        $correios = $correio;
        if ($this->request->is('post')) {
            $this->Report->create();
  if(empty($this->data['Report']['report']['name'])){
         unset($this->request->data['Report']['report']);
    }
   if(!empty($this->data['Report']['report']['name'])){
       $file=$this->data['Report']['report'];
       $file['name']=$this->sanitize($file['name']);
       $this->request->data['Report']['report'] = time().$file['name'];
      
                 if($this->Report->save($this->request->data)) {
                  $title = $this->request->data['Report']['title'];
                  $desc = $this->request->data['Report']['description'];
       move_uploaded_file($file['tmp_name'], APP . 'outsidefiles' .DS. time().$file['name']);  
      // $this->Session->setFlash(__('Your Report has been saved.'));
       if (substr($ref, 0,6)=='RefInt') {
        $text = 'Ha Uma Nova Requisicao Feita, com a Referencia: '.$ref;
                  $this->email($text, $correios);
         return $this->redirect(array('controller' => 'reports', 'action' => 'index', $idUsr));
       }elseif (substr($ref, 0,6)=='RefExt') {
         return $this->redirect(array('controller' => 'proformas', 'action' => 'add', $lastID, $ref, $title, $desc, $idUsr, $correios));
       }
              
          }
     }
                  //$this->Session->setFlash(__('Unable to add your Report.'));
                   return $this->redirect(array('action' => 'add'));
        }

        $this->set('ref', $ref);
        $this->set('lastID', $lastID);
        $this->set('idUsr',$idUsr);
        $this->set('correio',$correio);
  }

  function sanitize($string, $force_lowercase = true, $anal = false) {
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]","}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;","â€”", "â€“", ",", "<",">", "/", "?");
    $clean = trim(str_replace($strip, "", strip_tags($string)));
    $clean = preg_replace('/\s+/', "-", $clean);
    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
    return ($force_lowercase) ?
        (function_exists('mb_strtolower')) ?
            mb_strtolower($clean, 'UTF-8') :
            strtolower($clean) :
        $clean;
  }
   
    public function viewdown($id=null,$download=false) {
     if($download){
      $download=true;
     }

     $files=$this->Report->findById($id);
      $filename=$files['Report']['report'];
      $name=explode('.',$filename);
     $this->viewClass = 'Media';
     
      // path will be app/outsidefiles/yourfilename.pdf
      $params = array(
            'id'        => $filename,
            'name'      => $name[0],
             'download'  => $download,
            'extension' => 'pdf',
            'path'      => APP . 'outsidefiles' . DS
        );
        
     $this->set($params);
    }

    public function email($text, $correio){
    $this->Mail->email($text, $correio);
  }

   public function search() {
    // nenhum layout e nenhuma view
    $this->render(false, false);
 
    // parâmetros da requisição
    debug($this->request->params);
}
 
} 
?>