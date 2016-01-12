<?php
App::uses('AppController', 'Controller');
/**
 * InternalRequests Controller
 *
 * @property InternalRequest $InternalRequest
 * @property PaginatorComponent $Paginator
 */
class InternalRequestsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Mail', 'Alert');

/**
 * index method
 *
 * @return void
 */

    public function alertar($idDep){
    	$this->Alert->alert_dep($idDep);
    }

	public function index($idUser=null) {
		$reports = $this->InternalRequest->find('all', 
           array('conditions'=>array('InternalRequest.user_id'=>$idUser)));
		if (empty($reports) ) {
			$this->render('/Errors/error001');
		}else{
			$this->set('Reports',$reports);
		}

    
        
		//$offices = $this->InternalRequest->Office->find('list');
		$departments = $this->InternalRequest->Department->find('list');
		$administrations = $this->InternalRequest->Administration->find('list');
		$currencies = $this->InternalRequest->Currency->find('list');
		//$users = $this->InternalRequest->User->find('list');
		//$reports = $this->InternalRequest->Report->find('all');
		$beneficiaries = $this->InternalRequest->Beneficiary->find('list');
		$providers = $this->InternalRequest->Provider->find('list');
		$this->set(compact('offices', 'departments', 'administrations', 'users', 'beneficiaries', 'providers','currencies','reports'));
		//$this->set(compact('offices','administrations'));
	}

  public function pdf($idObj){

    $pdfvalues = $this->InternalRequest->find('all', array(
                'condictions' => array(
                  'InternalRequest.id' => $idObj
                  )
                )
              );
    $ref = $pdfvalues[0]['InternalRequest']['reference_application'];
    $office = $pdfvalues[0]['Office']['nome'];
    $adminst = $pdfvalues[0]['Administration']['label'];
    $dep = $pdfvalues[0]['Department']['label'];
    $benef = $pdfvalues[0]['Beneficiary']['name'];
    $amount = $pdfvalues[0]['InternalRequest']['amount'];

    $this->layout = 'pdf';
    $this->set(compact('ref', 'office', 'adminst', 'dep', 'benef', 'amount'));
    $this->render();
  }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $idDep = null, $sms = null) {
		if (!$this->InternalRequest->exists($id)) {
			throw new NotFoundException(__('Invalid internal request'));
		}
        $Budgets = $this->InternalRequest->Budget->find('all', array(
        	'conditions' => array(
        		'Budget.department_id' =>$idDep
        		),
        	'fields' => array(
        		'Budget.id',
        		'Budget.budget',
        		'Budget.modified')
        	)
        );
        $alert = $this->alertar($idDep);

		$options = array('conditions' => array('InternalRequest.' . $this->InternalRequest->primaryKey => $id));
		$this->set('internalRequest', $this->InternalRequest->find('first', $options));
       
        $this->set('Budgets', $Budgets);
        $this->set('alert', $alert);
        $this->set(compact('sms'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($idUsr=null,$idDep=null) {
		$reqRef = uniqid();
    $reqRef = substr($reqRef, 7,4);
		$ref = 'RefInt#'.$reqRef;
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
			$this->request->data['InternalRequest']['request_status'] = 0;
			$this->InternalRequest->create();
			if ($this->InternalRequest->save($this->request->data)) {
				//$this->Session->setFlash(__('The internal request has been saved.'));
			   $lastID = $this->InternalRequest->getLastInsertID();
			   $ref = $this->request->data['InternalRequest']['reference_application'];
				return $this->redirect(array('controller' => 'reports', 'action' => 'add', $lastID, $ref, $idUsr, $correio));
			} else {
				//$this->Session->setFlash(__('The internal request could not be saved. Please, try again.'));
			}
		}

		$currencies = $this->InternalRequest->Currency->find('list');
		$offices = $this->InternalRequest->Office->find('list');
		$departments = $this->InternalRequest->Department->find('list',array(
      'conditions' =>array(
        'Department.id' => $idDep
        )
      )
    );

    $administrations = $this->InternalRequest->Administration->find('list',array(
      'conditions' =>array(
        'Administration.id' => $idAdminstr
        )
      )
    );

		$users = $this->InternalRequest->User->find('list');
		$beneficiaries = $this->InternalRequest->Beneficiary->find('list');
		$providers = $this->InternalRequest->Provider->find('list');
		$projects = $this->InternalRequest->Project->find('list');
		$this->set(compact('currencies', 'offices', 'departments', 'administrations', 'users','beneficiaries', 'providers','ref','idUsr','request_status','projects','idDep','correio'));
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
    if (!$this->InternalRequest->exists($id)) {
      throw new NotFoundException(__('Invalid external request'));
    }else{
         if($sts == 1){
          if ($request_amount < $budget) {
         $new_budget = ($budget - $request_amount);  
       }else{
        $sms = 'Insuficiencia de budget para essa operacao!';
             return $this->redirect(array('controller' => 'InternalRequests', 'action' => 'view',$id,$idDep,$sms));
       }
         }elseif($sts == 0){
          $new_budget = $sts;
         }

    if ($this->request->is('get')) {  
          $this->InternalRequest->read(null, $id);
      $this->InternalRequest->set('request_status', $request_status);
      $this->InternalRequest->save();
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
		$this->InternalRequest->id = $id;
		if (!$this->InternalRequest->exists()) {
			throw new NotFoundException(__('Invalid internal request'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->InternalRequest->delete()) {
			$this->Session->setFlash(__('The internal request has been deleted.'));
		} else {
			$this->Session->setFlash(__('The internal request could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function check_status(){

    if ($this->request->is('post')) {
    if (isset($this->request->data['Search']['search']) && !empty($this->request->data['Search']['search'])) {
      $reference_application =$this->request->data['Search']['search'];
      $Reports = $this->InternalRequest->Endorso->find('all', array(
          'conditions' => array(
            'InternalRequest.reference_application' =>$reference_application
            )
           )
         );
       $label = 'S';
    }else{
      $Reports = '';
    }
  }
		
		if(isset($this->request->data['InternalRequest']['dataI']) && isset($this->request->data['InternalRequest']['dataF']) && isset($this->request->data['InternalRequest']['req']) && !empty($this->request->data['InternalRequest']['department_id']) && !empty($this->request->data['InternalRequest']['beneficiary_id'])){
      		$start_date = $this->request->data['InternalRequest']['dataI'];
      		$end_date = $this->request->data['InternalRequest']['dataF'];
      		$status = $this->request->data['InternalRequest']['req'];
      		$dep = $this->request->data['InternalRequest']['department_id'];
      		$ext = $this->request->data['InternalRequest']['beneficiary_id'];
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

    $Reports = $this->InternalRequest->Endorso->find('all', array(
          'conditions' => array(
          	'Endorso.created between ? and ?' => array($start, $end),
            "Endorso.$field" => $param,
            'InternalRequest.department_id' =>$dep,
            'InternalRequest.beneficiary_id' =>$ext,
            'Endorso.type' =>'int'
          	)
           )
         );
      		  
    }elseif (isset($this->request->data['InternalRequest']['dataI']) && isset($this->request->data['InternalRequest']['dataF']) && isset($this->request->data['InternalRequest']['req']) && empty($this->request->data['InternalRequest']['department_id']) && empty($this->request->data['InternalRequest']['beneficiary_id'])) {
      $start_date = $this->request->data['InternalRequest']['dataI'];
          $end_date = $this->request->data['InternalRequest']['dataF'];
          $status = $this->request->data['InternalRequest']['req'];
          $dep = $this->request->data['InternalRequest']['department_id'];
          $ext = $this->request->data['InternalRequest']['beneficiary_id'];
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

    $Reports = $this->InternalRequest->Endorso->find('all', array(
          'conditions' => array(
            'Endorso.created between ? and ?' => array($start, $end),
            "Endorso.$field" => $param,
            'Endorso.type' =>'int'
            )
           )
         );
    }elseif (isset($this->request->data['InternalRequest']['dataI']) && isset($this->request->data['InternalRequest']['dataF']) && isset($this->request->data['InternalRequest']['req']) && !empty($this->request->data['InternalRequest']['department_id']) && empty($this->request->data['InternalRequest']['beneficiary_id'])) {
          $start_date = $this->request->data['InternalRequest']['dataI'];
          $end_date = $this->request->data['InternalRequest']['dataF'];
          $status = $this->request->data['InternalRequest']['req'];
          $dep = $this->request->data['InternalRequest']['department_id'];
          $ext = $this->request->data['InternalRequest']['beneficiary_id'];
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

    $Reports = $this->InternalRequest->Endorso->find('all', array(
          'conditions' => array(
            'Endorso.created between ? and ?' => array($start, $end),
            "Endorso.$field" => $param,
            'InternalRequest.department_id' =>$dep,
            'Endorso.type' =>'int'
            )
           )
         );
            
        }elseif (isset($this->request->data['InternalRequest']['dataI']) && isset($this->request->data['InternalRequest']['dataF']) && isset($this->request->data['InternalRequest']['req']) && empty($this->request->data['InternalRequest']['department_id']) && !empty($this->request->data['InternalRequest']['beneficiary_id'])) {
          $start_date = $this->request->data['InternalRequest']['dataI'];
          $end_date = $this->request->data['InternalRequest']['dataF'];
          $status = $this->request->data['InternalRequest']['req'];
          $dep = $this->request->data['InternalRequest']['department_id'];
          $ext = $this->request->data['InternalRequest']['beneficiary_id'];
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

    $Reports = $this->InternalRequest->Endorso->find('all', array(
          'conditions' => array(
            'Endorso.created between ? and ?' => array($start, $end),
            "Endorso.$field" => $param,
            'InternalRequest.beneficiary_id' =>$ext,
            'Endorso.type' =>'int'
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


   if (!isset($label)) {
   	$label = '';
   }
   if (isset($status) && !empty($status)) {
     $status = $this->request->data['InternalRequest']['req'];
   
   }else{
   	  $status = 'Vasia';
   }
   if (isset($Reports) && !empty($Reports)) {
     $Reports = $Reports;
   
   }else{
   	  $Reports = '';
   }

		$departments = $this->InternalRequest->Department->find('list');
		$beneficiaries = $this->InternalRequest->Beneficiary->find('list');
		
		$this->set(compact('departments','beneficiaries'));


$this->set('Reports',$Reports);
$this->set('Label',$label);
$this->set('status',$status);

$this->set('dep',$dep);
$this->set('ext',$ext);
//$this->set('start',$start);
//$this->set('end',$end);
//$this->set('param',$param);
//$this->set('field',$field);
//$this->set('case',$case);

		
	}

	public function email($text, $correio){
		$this->Mail->email($text, $correio);
	}
}
