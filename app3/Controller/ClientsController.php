<?php
App::uses('AppController', 'Controller');
/**
 * Clients Controller
 *
 * @property Client $Client
 * @property PaginatorComponent $Paginator
 */
class ClientsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
    public function prorrogar(){
     if ($this->request->is('post')) {
      
          $idU = $this->request->data['Client']['idU'];
          $start_dateU = $this->request->data['Client']['start_dateU'];
          $new_end_dateU = $this->request->data['Client']['new_end_dateU'];
          $new_end_dateU = $new_end_dateU['year'].'-'.$new_end_dateU['month'].'-'.$new_end_dateU['day'];
          
          if($this->Client->read(null, $idU)){
            $this->Client->set('status', 1);
            if($this->Client->save()){
               $this->redirect(array('controller' =>'extends', 'action' => 'add',$idU, $start_dateU, $new_end_dateU));
           }
        }
      }
    }
    
    public function renew_budget(){
        if ($this->request->is('post')) {
          $id = $this->request->data['Client']['id'];
          $new_budget = $this->request->data['Client']['new_budget'];
          $clientGoted = $this->Client->findById($id);
          
          $old_budget = $clientGoted['Client']['budget'];
          $old_balance = $clientGoted['Client']['balance'];
          
          $new_balance = ($old_balance + $new_budget);
          $new_budget = ($old_budget + $new_budget);

          if($this->Client->read(null, $id)){
            $this->Client->set('budget', $new_budget);
            $this->Client->set('balance', $new_balance);
            if($this->Client->save()){
              $this->redirect(array('controller' =>'renewBudgets', 'action' => 'add',$id, $old_budget, $new_budget));
            }
          }
          $this->set(compact('clientGoted','new_budget'));
        }
    }


    public function update($id=null){
      $data_actual = date('Y-m-d');
    	if ($this->request->is('post')) {
      		$balance = $this->request->data['Client']['valor1'];
      		$used_budget2 = $this->request->data['Client']['valor2'];

      		$used_budget = $this->request->data['Client']['used_budget'];
      		$date_update = $this->request->data['Client']['date_update'];
          $date_update = $date_update['year'].'-'.$date_update['month'].'-'.$date_update['day'];

      		$balance = ($balance - $used_budget);
      		$actual_used_budget = ($used_budget2 + $used_budget);

      		if($this->Client->read(null, $id)){
      			$this->Client->set('balance', $balance);
      			$this->Client->set('used_budget', $actual_used_budget);
      			if($this->Client->save()){
              $this->redirect(array('controller' =>'updateBudgets', 'action' => 'add',$id, $date_update, $used_budget, $balance));
    			 }
    		}
    	}

    	$Reports = $this->Client->find('all',array(
    			'conditions' =>
    			array(
    				'Client.id' => $id
    				)
    			)
    		);
      $Extends = $this->Client->Extend->find('all',array(
          'conditions' =>
          array(
            'Client.id' => $id
            )
          )
        );
      $UpdateBudgets = $this->Client->UpdateBudget->find('all',array(
        'conditions' => array(
          'UpdateBudget.client_id' => $id)));

      $RenewBudgets = $this->Client->RenewBudget->find('all',array(
        'conditions' => array(
          'RenewBudget.client_id' => $id)));

    	$this->set(compact('Reports','Extends','data_actual','UpdateBudgets','RenewBudgets'));
    }

	public function index() {
		$this->Client->recursive = 0;
		$this->set('clients', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Client->exists($id)) {
			throw new NotFoundException(__('Invalid client'));
		}
		$options = array('conditions' => array('Client.' . $this->Client->primaryKey => $id));
		$this->set('client', $this->Client->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
            $this->Client->create();
			$this->request->data['Client']['balance'] = ($this->request->data['Client']['budget'] - $this->request->data['Client']['used_budget']);
      $this->request->data['Client']['status'] = 0;
			if ($this->Client->save($this->request->data)) {
				return $this->redirect(array('action' => 'add'));
			}
		}
		$contractTypes = $this->Client->ContractType->find('list');

		$areas = $this->Client->Area->find('list');
		//$administration = $this->Client->Department->Administration->find('all');


		$partners = $this->Client->Partner->find('list');
		$renewables = $this->Client->Renewable->find('list');
		$this->set(compact('contractTypes', 'areas', 'partners', 'renewables', 'administration'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Client->exists($id)) {
			throw new NotFoundException(__('Invalid client'));
		}
		if ($this->request->is(array('post', 'put'))) {
      //$new_balance = ($this->request->data['Client']['budget'] + $this->request->data['Client']['balance']);
      $this->Client->read(null, $id);
      $this->Client->set('partner_id', $this->request->data['Client']['partner_id']);
      //$this->Client->set('balance', $new_balance);
      //$this->Client->set('modified', $this->data(date('Y-m-d')));
			if ($this->Client->save($this->request->data)) {
				return $this->redirect(array('action' => 'update',$id));
			}
		} else {
			$options = array('conditions' => array('Client.' . $this->Client->primaryKey => $id));
			$this->request->data = $this->Client->find('first', $options);
		}
		$contractTypes = $this->Client->ContractType->find('list');
		$areas = $this->Client->Area->find('list');
		$partners = $this->Client->Partner->find('list');
		$renewables = $this->Client->Renewable->find('list');
		$this->set(compact('contractTypes', 'areas', 'partners', 'renewables'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Client->id = $id;
		if (!$this->Client->exists()) {
			throw new NotFoundException(__('Invalid client'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Client->delete()) {
			$this->Session->setFlash(__('The client has been deleted.'));
		} else {
			$this->Session->setFlash(__('The client could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
   
   
	public function make_data($data, $anoConta,$mesConta,$diaConta){
		   
	$ano = substr($data,0,4);
	$mes = substr($data,5,2);
	$dia = substr($data,8,2);
    return date('Y–m–d',mktime (0, 0, 0, $mes-($mesConta), $dia-($diaConta), $ano-($anoConta)));	   
   }


    public function notification($mes=null){
    $x = array();
    $mes = 3;	
    $today = date('Y-m-d');
    $Reports = $this->Client->find('all');
    foreach ($Reports as $Report) {
	    //if (($Report['Client']['start_date']) < ($today)) { # Caso Sim: O contrado ja deu o inicio.
		    if (($Report['Client']['end_date']) > ($today)) { # Caso Sim: Esta dentro do Prazo, entao:
  			# Retira-se 3 mese na data-fim e compara-se com a actual, Caso A nova data-final for
  			# menor que actual, O contrato tem menos de 3 meses para Expirar.
            $x[] =	$this->make_data($Report['Client']['end_date'],0,$mes,0);

		    }
	    //}	
    }
   
    
    /*$z = array();
    for ($i=0; $i < sizeof($x) ; $i++) { 
    	if ($x[$i] < $today) {
    		$z[] = $x[$i];
    		$label = 'Contratos expire em menos de 3 meses';
    	}elseif ($x[$i] == $today) {
    		$z[] = $x[$i];
    		$label = 'Expira_hoje';
    	}elseif($x[$i] > $today){
    		$z[] = $x[$i];
    		$label = 'Contratos com mais de 3 Meses';
    	}
    }*/

    $this->set(compact('x'));
   }

	public function search(){
	$data_actual = date('Y-m-d');
    if ($this->request->is('post')) {
    if (isset($this->request->data['Client']['search']) && !empty($this->request->data['Client']['search'])) {
      $contract_name =$this->request->data['Client']['search'];
      $Reports = $this->Client->find('all', array(
          'conditions' => array(
            'Client.contract_name' =>$contract_name
            )
           )
         );
       $Label = 'S';
    }else{
      $Reports = '';
      $Label = '';
    }

    if(isset($this->request->data['Client']['dataI']) && isset($this->request->data['Client']['dataF']) && isset($this->request->data['Client']['req']) && !empty($this->request->data['Client']['contract_type_id']) && !empty($this->request->data['Client']['area_id']) && !empty($this->request->data['Client']['renewable_id']) && !empty($this->request->data['Client']['partner_id'])){
      		$start_date = $this->request->data['Client']['dataI'];
      		$end_date = $this->request->data['Client']['dataF'];
      		$status = $this->request->data['Client']['req'];
      		$contract_type_id = $this->request->data['Client']['contract_type_id'];
      		$area_id = $this->request->data['Client']['area_id'];
      		$renewable_id = $this->request->data['Client']['renewable_id'];
      		$partner_id = $this->request->data['Client']['partner_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 1';
            
       
        if ($status != 'T') {
        $Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	'Client.contract_type_id' => $contract_type_id,
          	'Client.area_id' => $area_id,
          	'Client.renewable_id' => $renewable_id,
          	'Client.partner_id' => $partner_id
          	)
           )
         );
        
        $Label = 'Ex';
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	'Client.contract_type_id' => $contract_type_id,
          	'Client.area_id' => $area_id,
          	'Client.renewable_id' => $renewable_id,
          	'Client.partner_id' => $partner_id
          	)
           )
         );
    }


    }
    if(isset($this->request->data['Client']['dataI']) && isset($this->request->data['Client']['dataF']) && isset($this->request->data['Client']['req']) && empty($this->request->data['Client']['contract_type_id']) && !empty($this->request->data['Client']['area_id']) && !empty($this->request->data['Client']['renewable_id']) && !empty($this->request->data['Client']['partner_id'])){
      		$start_date = $this->request->data['Client']['dataI'];
      		$end_date = $this->request->data['Client']['dataF'];
      		$status = $this->request->data['Client']['req'];
      		//$contract_type_id = $this->request->data['Client']['contract_type_id'];
      		$area_id = $this->request->data['Client']['area_id'];
      		$renewable_id = $this->request->data['Client']['renewable_id'];
      		$partner_id = $this->request->data['Client']['partner_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 2';

       
        if ($status != 'T') {
        
          $Label = 'Ex';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	//'Client.contract_type_id' => $contract_type_id,
          	'Client.area_id' => $area_id,
          	'Client.renewable_id' => $renewable_id,
          	'Client.partner_id' => $partner_id
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	//'Client.contract_type_id' => $contract_type_id,
          	'Client.area_id' => $area_id,
          	'Client.renewable_id' => $renewable_id,
          	'Client.partner_id' => $partner_id
          	)
           )
         );
    }
   }
   if(isset($this->request->data['Client']['dataI']) && isset($this->request->data['Client']['dataF']) && isset($this->request->data['Client']['req']) && !empty($this->request->data['Client']['contract_type_id']) && empty($this->request->data['Client']['area_id']) && !empty($this->request->data['Client']['renewable_id']) && !empty($this->request->data['Client']['partner_id'])){
      		$start_date = $this->request->data['Client']['dataI'];
      		$end_date = $this->request->data['Client']['dataF'];
      		$status = $this->request->data['Client']['req'];
      		$contract_type_id = $this->request->data['Client']['contract_type_id'];
      		//$area_id = $this->request->data['Client']['area_id'];
      		$renewable_id = $this->request->data['Client']['renewable_id'];
      		$partner_id = $this->request->data['Client']['partner_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 3';

       
        if ($status != 'T') {
       $Label = 'Ex';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	'Client.contract_type_id' => $contract_type_id,
          	//'Client.area_id' => $area_id,
          	'Client.renewable_id' => $renewable_id,
          	'Client.partner_id' => $partner_id
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	'Client.contract_type_id' => $contract_type_id,
          	//'Client.area_id' => $area_id,
          	'Client.renewable_id' => $renewable_id,
          	'Client.partner_id' => $partner_id
          	)
           )
         );
    }
   }
   if(isset($this->request->data['Client']['dataI']) && isset($this->request->data['Client']['dataF']) && isset($this->request->data['Client']['req']) && !empty($this->request->data['Client']['contract_type_id']) && !empty($this->request->data['Client']['area_id']) && empty($this->request->data['Client']['renewable_id']) && !empty($this->request->data['Client']['partner_id'])){
      		$start_date = $this->request->data['Client']['dataI'];
      		$end_date = $this->request->data['Client']['dataF'];
      		$status = $this->request->data['Client']['req'];
      		$contract_type_id = $this->request->data['Client']['contract_type_id'];
      		$area_id = $this->request->data['Client']['area_id'];
      		//$renewable_id = $this->request->data['Client']['renewable_id'];
      		$partner_id = $this->request->data['Client']['partner_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 4';

       
        if ($status != 'T') {
       $Label = 'Ex';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	'Client.contract_type_id' => $contract_type_id,
          	'Client.area_id' => $area_id,
          	//'Client.renewable_id' => $renewable_id,
          	'Client.partner_id' => $partner_id
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	'Client.contract_type_id' => $contract_type_id,
          	'Client.area_id' => $area_id,
          	//'Client.renewable_id' => $renewable_id,
          	'Client.partner_id' => $partner_id
          	)
           )
         );
    }
   }
   if(isset($this->request->data['Client']['dataI']) && isset($this->request->data['Client']['dataF']) && isset($this->request->data['Client']['req']) && !empty($this->request->data['Client']['contract_type_id']) && !empty($this->request->data['Client']['area_id']) && !empty($this->request->data['Client']['renewable_id']) && empty($this->request->data['Client']['partner_id'])){
      		$start_date = $this->request->data['Client']['dataI'];
      		$end_date = $this->request->data['Client']['dataF'];
      		$status = $this->request->data['Client']['req'];
      		$contract_type_id = $this->request->data['Client']['contract_type_id'];
      		$area_id = $this->request->data['Client']['area_id'];
      		$renewable_id = $this->request->data['Client']['renewable_id'];
      		//$partner_id = $this->request->data['Client']['partner_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 5';

       
        if ($status != 'T') {
        $Label = 'Ex';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	'Client.contract_type_id' => $contract_type_id,
          	'Client.area_id' => $area_id,
          	'Client.renewable_id' => $renewable_id,
          	//'Client.partner_id' => $partner_id
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	'Client.contract_type_id' => $contract_type_id,
          	'Client.area_id' => $area_id,
          	'Client.renewable_id' => $renewable_id,
          	//'Client.partner_id' => $partner_id
          	)
           )
         );
    }
   }
   if(isset($this->request->data['Client']['dataI']) && isset($this->request->data['Client']['dataF']) && isset($this->request->data['Client']['req']) && !empty($this->request->data['Client']['contract_type_id']) && empty($this->request->data['Client']['area_id']) && empty($this->request->data['Client']['renewable_id']) && empty($this->request->data['Client']['partner_id'])){
      		$start_date = $this->request->data['Client']['dataI'];
      		$end_date = $this->request->data['Client']['dataF'];
      		$status = $this->request->data['Client']['req'];
      		$contract_type_id = $this->request->data['Client']['contract_type_id'];
      		//$area_id = $this->request->data['Client']['area_id'];
      		//$renewable_id = $this->request->data['Client']['renewable_id'];
      		//$partner_id = $this->request->data['Client']['partner_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 6';

       
        if ($status != 'T') {
       $Label = 'Ex';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	'Client.contract_type_id' => $contract_type_id,
          	//'Client.area_id' => $area_id,
          	//'Client.renewable_id' => $renewable_id,
          	//'Client.partner_id' => $partner_id
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	'Client.contract_type_id' => $contract_type_id,
          	//'Client.area_id' => $area_id,
          	//'Client.renewable_id' => $renewable_id,
          	//'Client.partner_id' => $partner_id
          	)
           )
         );
    }
   }
   if(isset($this->request->data['Client']['dataI']) && isset($this->request->data['Client']['dataF']) && isset($this->request->data['Client']['req']) && !empty($this->request->data['Client']['contract_type_id']) && !empty($this->request->data['Client']['area_id']) && empty($this->request->data['Client']['renewable_id']) && empty($this->request->data['Client']['partner_id'])){
      		$start_date = $this->request->data['Client']['dataI'];
      		$end_date = $this->request->data['Client']['dataF'];
      		$status = $this->request->data['Client']['req'];
      		$contract_type_id = $this->request->data['Client']['contract_type_id'];
      		$area_id = $this->request->data['Client']['area_id'];
      		//$renewable_id = $this->request->data['Client']['renewable_id'];
      		//$partner_id = $this->request->data['Client']['partner_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 7';

       
        if ($status != 'T') {
       $Label = 'Ex';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	'Client.contract_type_id' => $contract_type_id,
          	'Client.area_id' => $area_id,
          	//'Client.renewable_id' => $renewable_id,
          	//'Client.partner_id' => $partner_id
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	'Client.contract_type_id' => $contract_type_id,
          	'Client.area_id' => $area_id,
          	//'Client.renewable_id' => $renewable_id,
          	//'Client.partner_id' => $partner_id
          	)
           )
         );
    }
   }
   if(isset($this->request->data['Client']['dataI']) && isset($this->request->data['Client']['dataF']) && isset($this->request->data['Client']['req']) && empty($this->request->data['Client']['contract_type_id']) && !empty($this->request->data['Client']['area_id']) && empty($this->request->data['Client']['renewable_id']) && empty($this->request->data['Client']['partner_id'])){
      		$start_date = $this->request->data['Client']['dataI'];
      		$end_date = $this->request->data['Client']['dataF'];
      		$status = $this->request->data['Client']['req'];
      		//$contract_type_id = $this->request->data['Client']['contract_type_id'];
      		$area_id = $this->request->data['Client']['area_id'];
      		//$renewable_id = $this->request->data['Client']['renewable_id'];
      		//$partner_id = $this->request->data['Client']['partner_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 8';

       
        if ($status != 'T') {
       $Label = 'Ex';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	//'Client.contract_type_id' => $contract_type_id,
          	'Client.area_id' => $area_id,
          	//'Client.renewable_id' => $renewable_id,
          	//'Client.partner_id' => $partner_id
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	//'Client.contract_type_id' => $contract_type_id,
          	'Client.area_id' => $area_id,
          	//'Client.renewable_id' => $renewable_id,
          	//'Client.partner_id' => $partner_id
          	)
           )
         );
    }
   }
   if(isset($this->request->data['Client']['dataI']) && isset($this->request->data['Client']['dataF']) && isset($this->request->data['Client']['req']) && empty($this->request->data['Client']['contract_type_id']) && !empty($this->request->data['Client']['area_id']) && !empty($this->request->data['Client']['renewable_id']) && empty($this->request->data['Client']['partner_id'])){
      		$start_date = $this->request->data['Client']['dataI'];
      		$end_date = $this->request->data['Client']['dataF'];
      		$status = $this->request->data['Client']['req'];
      		//$contract_type_id = $this->request->data['Client']['contract_type_id'];
      		$area_id = $this->request->data['Client']['area_id'];
      		$renewable_id = $this->request->data['Client']['renewable_id'];
      		//$partner_id = $this->request->data['Client']['partner_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 9';

       
        if ($status != 'T') {
        $Label = 'Ex';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	//'Client.contract_type_id' => $contract_type_id,
          	'Client.area_id' => $area_id,
          	'Client.renewable_id' => $renewable_id,
          	//'Client.partner_id' => $partner_id
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	//'Client.contract_type_id' => $contract_type_id,
          	'Client.area_id' => $area_id,
          	'Client.renewable_id' => $renewable_id,
          	//'Client.partner_id' => $partner_id
          	)
           )
         );
    }
   }
   if(isset($this->request->data['Client']['dataI']) && isset($this->request->data['Client']['dataF']) && isset($this->request->data['Client']['req']) && empty($this->request->data['Client']['contract_type_id']) && !empty($this->request->data['Client']['area_id']) && empty($this->request->data['Client']['renewable_id']) && !empty($this->request->data['Client']['partner_id'])){
      		$start_date = $this->request->data['Client']['dataI'];
      		$end_date = $this->request->data['Client']['dataF'];
      		$status = $this->request->data['Client']['req'];
      		//$contract_type_id = $this->request->data['Client']['contract_type_id'];
      		$area_id = $this->request->data['Client']['area_id'];
      		//$renewable_id = $this->request->data['Client']['renewable_id'];
      		$partner_id = $this->request->data['Client']['partner_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 10';

       
        if ($status != 'T') {
        $Label = 'Ex';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	//'Client.contract_type_id' => $contract_type_id,
          	'Client.area_id' => $area_id,
          	//'Client.renewable_id' => $renewable_id,
          	'Client.partner_id' => $partner_id
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	//'Client.contract_type_id' => $contract_type_id,
          	'Client.area_id' => $area_id,
          	//'Client.renewable_id' => $renewable_id,
          	'Client.partner_id' => $partner_id
          	)
           )
         );
    }
   }
   if(isset($this->request->data['Client']['dataI']) && isset($this->request->data['Client']['dataF']) && isset($this->request->data['Client']['req']) && empty($this->request->data['Client']['contract_type_id']) && empty($this->request->data['Client']['area_id']) && !empty($this->request->data['Client']['renewable_id']) && !empty($this->request->data['Client']['partner_id'])){
      		$start_date = $this->request->data['Client']['dataI'];
      		$end_date = $this->request->data['Client']['dataF'];
      		$status = $this->request->data['Client']['req'];
      		//$contract_type_id = $this->request->data['Client']['contract_type_id'];
      		//$area_id = $this->request->data['Client']['area_id'];
      		$renewable_id = $this->request->data['Client']['renewable_id'];
      		$partner_id = $this->request->data['Client']['partner_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 11';

       
        if ($status != 'T') {
       $Label = 'Ex';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	//'Client.contract_type_id' => $contract_type_id,
          	//'Client.area_id' => $area_id,
          	'Client.renewable_id' => $renewable_id,
          	'Client.partner_id' => $partner_id
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	//'Client.contract_type_id' => $contract_type_id,
          	//'Client.area_id' => $area_id,
          	'Client.renewable_id' => $renewable_id,
          	'Client.partner_id' => $partner_id
          	)
           )
         );
    }
   }
   if(isset($this->request->data['Client']['dataI']) && isset($this->request->data['Client']['dataF']) && isset($this->request->data['Client']['req']) && empty($this->request->data['Client']['contract_type_id']) && empty($this->request->data['Client']['area_id']) && !empty($this->request->data['Client']['renewable_id']) && empty($this->request->data['Client']['partner_id'])){
      		$start_date = $this->request->data['Client']['dataI'];
      		$end_date = $this->request->data['Client']['dataF'];
      		$status = $this->request->data['Client']['req'];
      		//$contract_type_id = $this->request->data['Client']['contract_type_id'];
      		//$area_id = $this->request->data['Client']['area_id'];
      		$renewable_id = $this->request->data['Client']['renewable_id'];
      		//$partner_id = $this->request->data['Client']['partner_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 12';

       
        if ($status != 'T') {
       $Label = 'Ex';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	//'Client.contract_type_id' => $contract_type_id,
          	//'Client.area_id' => $area_id,
          	'Client.renewable_id' => $renewable_id,
          	//'Client.partner_id' => $partner_id
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	//'Client.contract_type_id' => $contract_type_id,
          	//'Client.area_id' => $area_id,
          	'Client.renewable_id' => $renewable_id,
          	//'Client.partner_id' => $partner_id
          	)
           )
         );
    }
   }
   if(isset($this->request->data['Client']['dataI']) && isset($this->request->data['Client']['dataF']) && isset($this->request->data['Client']['req']) && empty($this->request->data['Client']['contract_type_id']) && empty($this->request->data['Client']['area_id']) && empty($this->request->data['Client']['renewable_id']) && !empty($this->request->data['Client']['partner_id'])){
      		$start_date = $this->request->data['Client']['dataI'];
      		$end_date = $this->request->data['Client']['dataF'];
      		$status = $this->request->data['Client']['req'];
      		//$contract_type_id = $this->request->data['Client']['contract_type_id'];
      		//$area_id = $this->request->data['Client']['area_id'];
      		//$renewable_id = $this->request->data['Client']['renewable_id'];
      		$partner_id = $this->request->data['Client']['partner_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 13';

       
        if ($status != 'T') {
        $Label = 'Ex';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	//'Client.contract_type_id' => $contract_type_id,
          	//'Client.area_id' => $area_id,
          	//'Client.renewable_id' => $renewable_id,
          	'Client.partner_id' => $partner_id
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	//'Client.contract_type_id' => $contract_type_id,
          	//'Client.area_id' => $area_id,
          	//'Client.renewable_id' => $renewable_id,
          	'Client.partner_id' => $partner_id
          	)
           )
         );
    }
   }
   if(isset($this->request->data['Client']['dataI']) && isset($this->request->data['Client']['dataF']) && isset($this->request->data['Client']['req']) && !empty($this->request->data['Client']['contract_type_id']) && empty($this->request->data['Client']['area_id']) && !empty($this->request->data['Client']['renewable_id']) && empty($this->request->data['Client']['partner_id'])){
      		$start_date = $this->request->data['Client']['dataI'];
      		$end_date = $this->request->data['Client']['dataF'];
      		$status = $this->request->data['Client']['req'];
      		$contract_type_id = $this->request->data['Client']['contract_type_id'];
      		//$area_id = $this->request->data['Client']['area_id'];
      		$renewable_id = $this->request->data['Client']['renewable_id'];
      		//$partner_id = $this->request->data['Client']['partner_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 14';

       
        if ($status != 'T') {
        $Label = 'Ex';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	'Client.contract_type_id' => $contract_type_id,
          	//'Client.area_id' => $area_id,
          	'Client.renewable_id' => $renewable_id,
          	//'Client.partner_id' => $partner_id
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	'Client.contract_type_id' => $contract_type_id,
          	//'Client.area_id' => $area_id,
          	'Client.renewable_id' => $renewable_id,
          	//'Client.partner_id' => $partner_id
          	)
           )
         );
    }
   }
   if(isset($this->request->data['Client']['dataI']) && isset($this->request->data['Client']['dataF']) && isset($this->request->data['Client']['req']) && !empty($this->request->data['Client']['contract_type_id']) && empty($this->request->data['Client']['area_id']) && empty($this->request->data['Client']['renewable_id']) && !empty($this->request->data['Client']['partner_id'])){
      		$start_date = $this->request->data['Client']['dataI'];
      		$end_date = $this->request->data['Client']['dataF'];
      		$status = $this->request->data['Client']['req'];
      		$contract_type_id = $this->request->data['Client']['contract_type_id'];
      		//$area_id = $this->request->data['Client']['area_id'];
      		//$renewable_id = $this->request->data['Client']['renewable_id'];
      		$partner_id = $this->request->data['Client']['partner_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 15';

       
        if ($status != 'T') {
        $Label = 'Ex';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	'Client.contract_type_id' => $contract_type_id,
          	//'Client.area_id' => $area_id,
          	//'Client.renewable_id' => $renewable_id,
          	'Client.partner_id' => $partner_id
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	'Client.contract_type_id' => $contract_type_id,
          	//'Client.area_id' => $area_id,
          	//'Client.renewable_id' => $renewable_id,
          	'Client.partner_id' => $partner_id
          	)
           )
         );
    }
   }
   if(isset($this->request->data['Client']['dataI']) && isset($this->request->data['Client']['dataF']) && isset($this->request->data['Client']['req']) && empty($this->request->data['Client']['contract_type_id']) && empty($this->request->data['Client']['area_id']) && empty($this->request->data['Client']['renewable_id']) && empty($this->request->data['Client']['partner_id'])){
      		$start_date = $this->request->data['Client']['dataI'];
      		$end_date = $this->request->data['Client']['dataF'];
      		$status = $this->request->data['Client']['req'];
      		//$contract_type_id = $this->request->data['Client']['contract_type_id'];
      		//$area_id = $this->request->data['Client']['area_id'];
      		//$renewable_id = $this->request->data['Client']['renewable_id'];
      		//$partner_id = $this->request->data['Client']['partner_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 16';

       
        if ($status != 'T') {
       $Label = 'Ex';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	//'Client.contract_type_id' => $contract_type_id,
          	//'Client.area_id' => $area_id,
          	//'Client.renewable_id' => $renewable_id,
          	//'Client.partner_id' => $partner_id
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Client->find('all', array(
          'conditions' => array(
          	'Client.created between ? and ?' => array($start, $end),
          	//'Client.contract_type_id' => $contract_type_id,
          	//'Client.area_id' => $area_id,
          	//'Client.renewable_id' => $renewable_id,
          	//'Client.partner_id' => $partner_id
          	)
           )
         );
    }
   }
  }
		$contractTypes = $this->Client->ContractType->find('list');
		$areas = $this->Client->Area->find('list');
		$partners = $this->Client->Partner->find('list');
		$renewables = $this->Client->Renewable->find('list');
		$this->set(compact('contractTypes', 'areas', 'partners', 'renewables','Reports','Label','caso','now','data_actual'));
	}
}
