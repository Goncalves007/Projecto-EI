<?php
App::uses('AppController', 'Controller');
/**
 * ExternalRequests Controller
 *
 * @property ExternalRequest $ExternalRequest
 * @property PaginatorComponent $Paginator
 */
class ExternalRequestsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Mail');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ExternalRequest->recursive = 0;
		$this->set('externalRequests', $this->Paginator->paginate());
	}


  public function pdf($idObj){

    $pdfvalues = $this->ExternalRequest->find('all', array(
                'condictions' => array(
                  'ExternalRequest.id' => $idObj
                  )
                )
              );
    $ref = $pdfvalues[0]['ExternalRequest']['reference_application'];
    $office = $pdfvalues[0]['Office']['nome'];
    $adminst = $pdfvalues[0]['Administration']['label'];
    $dep = $pdfvalues[0]['Department']['label'];
    $benef = $pdfvalues[0]['ExternalBeneficiary']['name'];
    $amount = $pdfvalues[0]['ExternalRequest']['amount'];

    $this->layout = 'pdf';
    $this->set(compact('ref', 'office', 'adminst', 'dep', 'benef', 'amount'));
    $this->render();
  }


  public function check_status($sms = null){

    if ($this->request->is('post')) {
    if (isset($this->request->data['Search']['search']) && !empty($this->request->data['Search']['search'])) {
      $reference_application =$this->request->data['Search']['search'];
      $Reports = $this->ExternalRequest->Endorso->find('all', array(
          'conditions' => array(
            'ExternalRequest.reference_application' =>$reference_application
            )
           )
         );
       $label = 'S';
    }else{
      $Reports = '';
    }
  }
    
		if(isset($this->request->data['ExternalRequest']['dataI']) && isset($this->request->data['ExternalRequest']['dataF']) && isset($this->request->data['ExternalRequest']['req']) && !empty($this->request->data['ExternalRequest']['department_id']) && !empty($this->request->data['ExternalRequest']['external_beneficiary_id'])){
      		$start_date = $this->request->data['ExternalRequest']['dataI'];
      		$end_date = $this->request->data['ExternalRequest']['dataF'];
      		$status = $this->request->data['ExternalRequest']['req'];
      		$dep = $this->request->data['ExternalRequest']['department_id'];
      		$ext = $this->request->data['ExternalRequest']['external_beneficiary_id'];
          $case = 'caso 1';
             
    if ($status == 'P') {
		 	$tag= 'Requisicoes Nao Pagas';
		 	$field  = 'paga';
		 	$param = 0;
		 	$label = 'P';
		 	
		 }elseif ($status == 'J') {
		 	$tag = 'Requisicoes Nao Justificadas';
		 	$field  = 'justificada';
      $param = 0;
		 	$label = 'J';
		 	
		 }elseif ($status == 'Tp') {
      $tag = 'Requisicoes Paga';
		 	$field  = 'paga';
		 	$param = 1;
		 	$label = 'Tp';
		 	
		 }elseif ($status == 'Tj') {
		 	$tag= 'Requisicoes Justificadas';
		 	$field  = 'justificada';
      $param = 1;
		 	$label = 'Tj';
		 	
		 }elseif ($status = 'T') {
		 	$status= 'Todas Pagas';
		 	$field  = 'all';
      $param = 1;
		 	$label = 'T';
		 
		 }
    $start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
    $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];

    $Reports = $this->ExternalRequest->Endorso->find('all', array(
          'conditions' => array(
          	'Endorso.created between ? and ?' => array($start, $end),
            "Endorso.$field" => $param,
            'ExternalRequest.department_id' =>$dep,
            'ExternalRequest.external_beneficiary_id' =>$ext,
            'Endorso.type' =>'ext'
          	)
           )
         );
      		  
    }elseif (isset($this->request->data['ExternalRequest']['dataI']) && isset($this->request->data['ExternalRequest']['dataF']) && isset($this->request->data['ExternalRequest']['req']) && empty($this->request->data['ExternalRequest']['department_id']) && empty($this->request->data['ExternalRequest']['external_beneficiary_id'])) {
      $start_date = $this->request->data['ExternalRequest']['dataI'];
          $end_date = $this->request->data['ExternalRequest']['dataF'];
          $status = $this->request->data['ExternalRequest']['req'];
          $dep = $this->request->data['ExternalRequest']['department_id'];
          $ext = $this->request->data['ExternalRequest']['external_beneficiary_id'];
          $case = 'caso 2';
             
    if ($status == 'P') {
      $tag= 'Requisicoes Nao Pagas';
      $field  = 'paga';
      $param = 0;
      $label = 'P';
      
     }elseif ($status == 'J') {
      $tag = 'Requisicoes Nao Justificadas';
      $field  = 'justificada';
      $param = 0;
      $label = 'J';
      
     }elseif ($status == 'Tp') {
      $tag = 'Requisicoes Paga';
      $field  = 'paga';
      $param = 1;
      $label = 'Tp';
      
     }elseif ($status == 'Tj') {
      $tag= 'Requisicoes Justificadas';
      $field  = 'justificada';
      $param = 1;
      $label = 'Tj';
      
     }elseif ($status = 'T') {
      $status= 'Todas Pagas';
      $field  = 'all';
      $param = 1;
      $label = 'T';
     
     }
    $start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
    $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];

    $Reports = $this->ExternalRequest->Endorso->find('all', array(
          'conditions' => array(
            'Endorso.created between ? and ?' => array($start, $end),
            "Endorso.$field" => $param,
            'Endorso.type' =>'ext'
            )
           )
         );
    }elseif (isset($this->request->data['ExternalRequest']['dataI']) && isset($this->request->data['ExternalRequest']['dataF']) && isset($this->request->data['ExternalRequest']['req']) && !empty($this->request->data['ExternalRequest']['department_id']) && empty($this->request->data['ExternalRequest']['external_beneficiary_id'])) {
          $start_date = $this->request->data['ExternalRequest']['dataI'];
          $end_date = $this->request->data['ExternalRequest']['dataF'];
          $status = $this->request->data['ExternalRequest']['req'];
          $dep = $this->request->data['ExternalRequest']['department_id'];
          $ext = $this->request->data['ExternalRequest']['external_beneficiary_id'];
          $case = 'caso 3';
             
    if ($status == 'P') {
      $tag= 'Requisicoes Nao Pagas';
      $field  = 'paga';
      $param = 0;
      $label = 'P';
      
     }elseif ($status == 'J') {
      $tag = 'Requisicoes Nao Justificadas';
      $field  = 'justificada';
      $param = 0;
      $label = 'J';
      
     }elseif ($status == 'Tp') {
      $tag = 'Requisicoes Paga';
      $field  = 'paga';
      $param = 1;
      $label = 'Tp';
      
     }elseif ($status == 'Tj') {
      $tag= 'Requisicoes Justificadas';
      $field  = 'justificada';
      $param = 1;
      $label = 'Tj';
      
     }elseif ($status = 'T') {
      $status= 'Todas Pagas';
      $field  = 'all';
      $param = 1;
      $label = 'T';
     
     }
    $start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
    $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];

    $Reports = $this->ExternalRequest->Endorso->find('all', array(
          'conditions' => array(
            'Endorso.created between ? and ?' => array($start, $end),
            "Endorso.$field" => $param,
            'ExternalRequest.department_id' =>$dep,
            'Endorso.type' =>'ext'
            )
           )
         );
            
        }elseif (isset($this->request->data['ExternalRequest']['dataI']) && isset($this->request->data['ExternalRequest']['dataF']) && isset($this->request->data['ExternalRequest']['req']) && empty($this->request->data['ExternalRequest']['department_id']) && !empty($this->request->data['ExternalRequest']['external_beneficiary_id'])) {
          $start_date = $this->request->data['ExternalRequest']['dataI'];
          $end_date = $this->request->data['ExternalRequest']['dataF'];
          $status = $this->request->data['ExternalRequest']['req'];
          $dep = $this->request->data['ExternalRequest']['department_id'];
          $ext = $this->request->data['ExternalRequest']['external_beneficiary_id'];
          $case = 'caso 4';
             
    if ($status == 'P') {
      $tag= 'Requisicoes Nao Pagas';
      $field  = 'paga';
      $param = 0;
      $label = 'P';
      
     }elseif ($status == 'J') {
      $tag = 'Requisicoes Nao Justificadas';
      $field  = 'justificada';
      $param = 0;
      $label = 'J';
      
     }elseif ($status == 'Tp') {
      $tag = 'Requisicoes Paga';
      $field  = 'paga';
      $param = 1;
      $label = 'Tp';
      
     }elseif ($status == 'Tj') {
      $tag= 'Requisicoes Justificadas';
      $field  = 'justificada';
      $param = 1;
      $label = 'Tj';
      
     }elseif ($status = 'T') {
      $status= 'Todas Pagas';
      $field  = 'all';
      $param = 1;
      $label = 'T';
     
     }
    $start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
    $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];

    $Reports = $this->ExternalRequest->Endorso->find('all', array(
          'conditions' => array(
            'Endorso.created between ? and ?' => array($start, $end),
            "Endorso.$field" => $param,
            'ExternalRequest.external_beneficiary_id' =>$ext,
            'Endorso.type' =>'ext'
            )
           )
         );
            
        }
         else{
      		  $dataI = '';
      		  $dataF = '';
      		  $status = '';
            $dep = '';
            $ext = '';
      	}
$pro = $this->ExternalRequest->Proforma->find('all');

   if (!isset($label)) {
   	$label = '';
   }
   if (isset($status) && !empty($status)) {
     $status = $this->request->data['ExternalRequest']['req'];
   
   }else{
   	  $status = 'Vasia';
   }
   if (isset($Reports) && !empty($Reports)) {
     $Reports = $Reports;
   
   }else{
   	  $Reports = '';
   }

		$departments = $this->ExternalRequest->Department->find('list');
		$externalBeneficiaries = $this->ExternalRequest->ExternalBeneficiary->find('list');
		
		$this->set(compact('departments','externalBeneficiaries'));


$this->set('Reports',$Reports);
$this->set('Label',$label);
$this->set('status',$status);
$this->set('pro',$pro);
$this->set('dep',$dep);
$this->set('ext',$ext);
$this->set('sms',$sms);
//$this->set('teste',$teste);
//$this->set('start',$start);
//$this->set('end',$end);
//$this->set('param',$param);
//$this->set('field',$field);
//$this->set('case',$case);

		
	}

  public function format_date($start_date=null, $end_date=null){
  	$inicio = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
    $fim = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
  }

	
   public function search_between($start_date=null, $end_date=null,$status=1){
   	      $inicio = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
          $fim = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
           $x = 'paga';
          return $this->ExternalRequest->Endorso->find('all', array(
          'conditions' => array(
          	'Endorso.created between ? and ?' => array($inicio, $fim),
            "Endorso.$x" => $status
          	)
           )
         );
   }
    

	public function check(){
  
      if ($this->request->is('post')) {
      	if (isset($this->request->data['ExternalRequest']['req'])) {
      		$who = $this->request->data['ExternalRequest']['req'];
      	}else{
      		$who='';
      	}

      	if(isset($this->request->data['ExternalRequest']['dataI']) && isset($this->request->data['ExternalRequest']['dataF'])){
      		  $dataI = $this->request->data['ExternalRequest']['dataI'];
      		  $dataF = $this->request->data['ExternalRequest']['dataF'];

      		  $teste =$this->search_between($dataI, $dataF);
      		
      	}else{
      		  $dataI = '';
      		  $dataF = '';
      		  $teste = '';
      	}

   }
  
   $EndorsosJ = $this->ExternalRequest->Endorso->find('all', array(
   	'conditions' => array(
   		  'Endorso.justificada' => 0
				)
			)
   );
   $EndorsosTj = $this->ExternalRequest->Endorso->find('all', array(
   	'conditions' => array(
   		  'Endorso.justificada' => 1
				)
			)
   );
   $EndorsosP = $this->ExternalRequest->Endorso->find('all', array(
   	'conditions' => array(
				'Endorso.paga' => 0
				)
			)
   );
    

    $EndorsosTp = $this->ExternalRequest->Endorso->find('all', array(
   	'conditions' => array(
				'Endorso.paga' => 1
				)
			)
   );

   $pro = $this->ExternalRequest->Proforma->find('all');

   if (!isset($label)) {
   	$label = '';
   }
   if (isset($who) && !empty($who)) {
     $sms = $who;
   
   }else{
   	  $sms = 'Vasia';
   }

 if ($sms == 'P') {
 	$sms = 'Requisicoes Nao Pagas';
 	$sms = $EndorsosP;
 	$label = 'P';
 }elseif ($sms == 'J') {
 	$sms = 'Requisicoes Nao Justificadas';
 	$sms = $EndorsosJ;
 	$label = 'J';
 }elseif ($sms == 'T') {
 	$sms = 'Todas Requisicoes';
 	$label = 'T';
 }elseif ($sms == 'Tp') {
 	$sms = 'Requisicoes Pagas';
 	$sms = $EndorsosTp;
 	$label = 'Tp';
 }elseif ($sms == 'Tj') {
 	$sms = 'Requisicoes Justificadas';
 	$sms = $EndorsosTj;
 	$label = 'Tj';
 }
$this->set('Reports',$sms);
$this->set('Label',$label);
$this->set('pro',$pro);
//$this->set('dataI',$dataI);
//$this->set('dataF',$dataF);
//$this->set('teste',$teste);
}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idDep = null, $sms = null) {
		if (!$this->ExternalRequest->exists($id)) {
			throw new NotFoundException(__('Invalid external request'));
		}
		$Budgets = $this->ExternalRequest->Budget->find('all', array(
        	'conditions' => array(
        		'Budget.department_id' =>$idDep
        		),
        	'fields' => array(
        		'Budget.id',
        		'Budget.budget',
        		'Budget.modified')
        	)
        );


		$options = array('conditions' => array('ExternalRequest.' . $this->ExternalRequest->primaryKey => $id));
		$this->set('externalRequest', $this->ExternalRequest->find('first', $options));

		$externalRequest = $this->ExternalRequest->find('first', $options);
		$this->set('Proformas', $externalRequest['Proforma']);

		$Endorsos = $this->ExternalRequest->Endorso->find('all');

     $pdfvalues = $this->ExternalRequest->find('all', array(
                'condictions' => array(
                  'ExternalRequest.id' => 83
                  )
                )
              );

		 $this->set('Budgets', $Budgets);
		 $this->set('Endorsos', $Endorsos);
     $this->set('var', $pdfvalues);
     $this->set(compact('sms'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($idUsr=null, $idDep=null) {
    $reqRef = uniqid();
    $reqRef = substr($reqRef, 7,4);
		$ref = 'RefExt#'.$reqRef;
    $idDep = $idDep;

   if ($idDep==1 || $idDep==2) {
      $idAdminstr = 4;
      $correio = 'dpo@escopil.com';
    }elseif ($idDep ==3) {
      $idAdminstr = 7;
      $correio = 'dfi@escopil.com';
    }elseif ($idDep ==4) {
     $idAdminstr = 8;
     $correio = 'darh@escopil.com';
    }elseif ($idDep ==5) {
     $idAdminstr = 5;
     $correio = 'ddn@escopil.com';
    }

		if ($this->request->is('post')) {
			$this->request->data['ExternalRequest']['request_status'] = 0;
			$this->ExternalRequest->create();
			if ($this->ExternalRequest->save($this->request->data)) {
				//$this->Session->setFlash(__('The external request has been saved.'));
			   $lastID = $this->ExternalRequest->getLastInsertID();
			   $ref = $this->request->data['ExternalRequest']['reference_application'];
			   return $this->redirect(array('controller' => 'reports', 'action' => 'add', $lastID, $ref, $idUsr, $correio));
			} else {
				//$this->Session->setFlash(__('The external request could not be saved. Please, try again.'));
			}
		}
		$offices = $this->ExternalRequest->Office->find('list');
		$departments = $this->ExternalRequest->Department->find('list',array(
      'conditions' =>array(
        'Department.id' => $idDep
        )
      )
    );
   
		$administrations = $this->ExternalRequest->Administration->find('list',array(
      'conditions' =>array(
        'Administration.id' => $idAdminstr
        )
      )
    );
		$users = $this->ExternalRequest->User->find('list');
		$externalBeneficiaries = $this->ExternalRequest->ExternalBeneficiary->find('list');
		$providers = $this->ExternalRequest->Provider->find('list');
		$currencies = $this->ExternalRequest->Currency->find('list');
		$proformas = $this->ExternalRequest->Proforma->find('list');
		$projects = $this->ExternalRequest->Project->find('list');
		$this->set(compact('offices', 'departments', 'administrations', 'users', 'externalBeneficiaries', 'providers', 'currencies', 'proformas','ref','idUsr','request_status','projects','correio'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function endorsement($id=null,$request_status=null,$idDep=null,$refReq=null,$id_budget=null,$budget = null,$request_amount = null, $sts=null, $correio=null) {
    $this->autoRender = false ;
    $correios = $correio;
    if (!$this->ExternalRequest->exists($id)) {
      throw new NotFoundException(__('Invalid external request'));
    }
    else{
         if($sts == 1){
          if ($request_amount < $budget) {
         $new_budget = ($budget - $request_amount);  
       }else{
        $sms = 'Insuficiencia de budget para essa operacao!';
             return $this->redirect(array('controller' => 'ExternalRequests', 'action' => 'view',$id,$idDep,$sms));
       }
         }elseif($sts == 0){
          $new_budget = $sts;
         }
      
    if ($this->request->is('get')) {  
      $this->ExternalRequest->read(null, $id);
      $this->ExternalRequest->set('request_status', $request_status);
      $this->ExternalRequest->save();
         if ($request_status==1 || $request_status==2) {
          if ($request_status==1) {
                $text = "Foi Deferida, Pelo Chefe de Departmento, a Requisicao com a Referencia: $refReq ";
                //$this->email($text, $correios);
               }elseif ($request_status==2) {
                $text = "Foi Indeferida, Pelo Chefe de Departmento, a Requisicao com Referencia: $refReq ";
                //$this->email($text, $correios);
               }
      return $this->redirect(array('controller' => 'endorsements', 'action' => 'view',$idDep));   

      } elseif($request_status==3 || $request_status==4 || $request_status==5 || $request_status==6 || $request_status==7 || $request_status==8 || $request_status==9) {
        if ($request_status==3) {
                  $text = "Foi Deferida, Pelo Gerente Financeito, a Requisicao com a Referencia: $refReq ";
                  //$this->email($text, $correios);
                }elseif ($request_status==4) {
                  $text = "Foi Indeferida, Pelo Gerente Financeiro, a Requisicao com Referencia: $refReq ";
                  //$this->email($text, $correios);
               }elseif ($request_status==5) {
                  $text = "<b>Tesoraria: </b> Ha disponibilidade de Fundo Para a Requisicao com a Referencia: $refReq ";
                  //$this->email($text, $correios);
                  return $this->redirect(array('controller' => 'budgets', 'action' => 'update_budget',$id_budget, $new_budget, $idDep, $id, $refReq));
               }elseif ($request_status==6) {
                  $text = "<b>Tesoraria: </b>Nao Ha disponibilidade de Fundo Para a Requisicao com a Referencia: $refReq ";
                  //$this->email($text, $correios);
               }elseif ($request_status==7) {
                  $text = "<b>Administracao: </b> Foi Submetida a Requisicao com a Referencia: $refReq ";
                  //$this->email($text, $correios);
               }elseif ($request_status==8) {
                  $text = "Por Programar";
                  //$this->email($text, $correios);
               }elseif ($request_status==9) {
                  $text = "<b>Administracao: </b> Foi Paga a Requisicao com a Referencia: $refReq ";
                 //$this->email($text, $correios);
               }

    return $this->redirect(array('controller' => 'reports', 'action' => 'all'));
      }
        
       }

    }
    
  }
		
	
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ExternalRequest->id = $id;
		if (!$this->ExternalRequest->exists()) {
			throw new NotFoundException(__('Invalid external request'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ExternalRequest->delete()) {
			$this->Session->setFlash(__('The external request has been deleted.'));
		} else {
			$this->Session->setFlash(__('The external request could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function email($text,$correio){
		$this->Mail->email($text,$correio);
	}


}
