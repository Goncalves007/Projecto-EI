<?php
App::uses('AppController', 'Controller');
/**
 * Expedientes Controller
 *
 * @property Expediente $Expediente
 * @property PaginatorComponent $Paginator
 */
class ExpedientesController extends AppController {

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
    public function follow_expedient($idE = null) {
		App::uses('CakeTime', 'Utility');
		$confirmas = $this->Expediente->find('all',array(
			'conditions' => array(
     		'Expediente.id_remetente' => $idE,
     		'or' => array(
     			array('Expediente.status' => 0),
     			array('Expediente.status' => 1)
     			)
     		)
     	  )
		);

	if (isset($confirmas[0]['Expediente']['previsao_chegada']) && !empty($confirmas[0]['Expediente']['previsao_chegada'])) {
	if (CakeTime::isToday($confirmas[0]['Expediente']['previsao_chegada'])) {
            /* greet user with a happy birthday message
               Enviar um email alertando sobre a data quase vencida.
             */
            $vence_hoje = 'Chega Hoje';
            if (isset($vence_hoje) && empty($vence_hoje)) {
            	$vence_hoje = '';
            }
            $this->set('vence_hoje',$vence_hoje);
        }
	}	
     $this->set(compact('confirmas','idE'));
	}



    public function busca($idUser=null, $idGroup=null){
    $idUser = $idUser;
    if ($this->request->is('post')) {
    if (isset($this->request->data['Search']['search']) && !empty($this->request->data['Search']['search'])) {
      $nr_expediente =$this->request->data['Search']['search'];
      $userid =$this->request->data['Search']['userid'];
      $Reports = $this->Expediente->find('all', array(
          'conditions' => array(
            'Expediente.nr_expediente' =>$nr_expediente,
            'Expediente.id_remetente' =>$userid
            )
           )
         );
       $Label = 'S';
    }else{
      $Reports = '';
    }
   
   if(isset($this->request->data['Expediente']['dataI']) && isset($this->request->data['Expediente']['dataF']) && isset($this->request->data['Expediente']['req']) && !empty($this->request->data['Expediente']['office_id']) && !empty($this->request->data['Expediente']['user_id'])){
      		$start_date = $this->request->data['Expediente']['dataI'];
      		$end_date = $this->request->data['Expediente']['dataF'];
      		$status = $this->request->data['Expediente']['req'];
      		$office = $this->request->data['Expediente']['office_id'];
      		$usr = $this->request->data['Expediente']['user_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
          $caso = 'caso 1';
             
    if ($status == 'Ec') {
		 	$tag = 'Enviado & confirmado';
		 	$field  = 'status';
            $param = 1;
		 	$Label = 'Ec';
		 	
		 }elseif ($status == 'En') {
            $tag = 'Enviado nao confirmado';
		 	$field  = 'status';
		 	$param = 0;
		 	$Label = 'En';
		 	
		 }
        if ($status != 'T') {
        $Reports = $this->Expediente->find('all', array(
          'conditions' => array(
          	'Expediente.created between ? and ?' => array($start, $end),
          	'Expediente.id_remetente' => $idUser,
          	'Expediente.office_id' => $office,
          	'Expediente.user_id' => $usr,
          	"Expediente.$field" => $param
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Expediente->find('all', array(
          'conditions' => array(
          	'Expediente.created between ? and ?' => array($start, $end),
          	'Expediente.id_remetente' => $idUser,
          	'Expediente.office_id' => $office,
          	'Expediente.user_id' => $usr,
          	'or' => array(
          		array('Expediente.status' => 0),
          		array('Expediente.status' => 1)
          		)
          	)
           )
         );
    }
      		  
    }elseif (isset($this->request->data['Expediente']['dataI']) && isset($this->request->data['Expediente']['dataF']) && isset($this->request->data['Expediente']['req']) && !empty($this->request->data['Expediente']['office_id']) && empty($this->request->data['Expediente']['user_id'])) {
    	    $start_date = $this->request->data['Expediente']['dataI'];
      		$end_date = $this->request->data['Expediente']['dataF'];
      		$status = $this->request->data['Expediente']['req'];
      		$office = $this->request->data['Expediente']['office_id'];
      		//$usr = $this->request->data['Expediente']['user_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 2';
             
    if ($status == 'T') {
		 	$tag= 'Todos';
		 	$field  = 'status';
		 	$param = 0;
		 	$Label = 'T';
		 	
		 }elseif ($status == 'Ec') {
		 	$tag = 'Enviado & confirmado';
		 	$field  = 'status';
            $param = 1;
		 	$Label = 'Ec';
		 	
		 }elseif ($status == 'En') {
            $tag = 'Enviado nao confirmado';
		 	$field  = 'status';
		 	$param = 0;
		 	$Label = 'En';
		 	
		 }

    if ($status != 'T') {
        $Reports = $this->Expediente->find('all', array(
          'conditions' => array(
          	'Expediente.created between ? and ?' => array($start, $end),
          	'Expediente.id_remetente' => $idUser,
          	'Expediente.office_id' => $office,
          	//'Expediente.user_id' => $usr,
          	"Expediente.$field" => $param
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Expediente->find('all', array(
          'conditions' => array(
          	'Expediente.created between ? and ?' => array($start, $end),
          	'Expediente.id_remetente' => $idUser,
          	'Expediente.office_id' => $office,
          	//'Expediente.user_id' => $usr,
          	'or' => array(
          		array('Expediente.status' => 0),
          		array('Expediente.status' => 1)
          		)
          	)
           )
         );
    }
    }elseif (isset($this->request->data['Expediente']['dataI']) && isset($this->request->data['Expediente']['dataF']) && isset($this->request->data['Expediente']['req']) && empty($this->request->data['Expediente']['office_id']) && !empty($this->request->data['Expediente']['user_id'])) {
		 	$start_date = $this->request->data['Expediente']['dataI'];
      		$end_date = $this->request->data['Expediente']['dataF'];
      		$status = $this->request->data['Expediente']['req'];
      		//$office = $this->request->data['Expediente']['office_id'];
      		$usr = $this->request->data['Expediente']['user_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 3';
             
    if ($status == 'T') {
		 	$tag= 'Todos';
		 	$field  = 'status';
		 	$param = 0;
		 	$Label = 'T';
		 	
		 }elseif ($status == 'Ec') {
		 	$tag = 'Enviado & confirmado';
		 	$field  = 'status';
            $param = 1;
		 	$Label = 'Ec';
		 	
		 }elseif ($status == 'En') {
            $tag = 'Enviado nao confirmado';
		 	$field  = 'status';
		 	$param = 0;
		 	$Label = 'En';
		 	
		 }

    if ($status != 'T') {
        $Reports = $this->Expediente->find('all', array(
          'conditions' => array(
          	'Expediente.created between ? and ?' => array($start, $end),
          	'Expediente.id_remetente' => $idUser,
          	//'Expediente.office_id' => $office,
          	'Expediente.user_id' => $usr,
          	"Expediente.$field" => $param
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Expediente->find('all', array(
          'conditions' => array(
          	'Expediente.created between ? and ?' => array($start, $end),
          	'Expediente.id_remetente' => $idUser,
          	//'Expediente.office_id' => $office,
          	'Expediente.user_id' => $usr,
          	'or' => array(
          		array('Expediente.status' => 0),
          		array('Expediente.status' => 1)
          		)
          	)
           )
         );
    }
   }elseif (isset($this->request->data['Expediente']['dataI']) && isset($this->request->data['Expediente']['dataF']) && isset($this->request->data['Expediente']['req']) && empty($this->request->data['Expediente']['office_id']) && empty($this->request->data['Expediente']['user_id'])) {
   	        $start_date = $this->request->data['Expediente']['dataI'];
      		$end_date = $this->request->data['Expediente']['dataF'];
      		$status = $this->request->data['Expediente']['req'];
      		//$office = $this->request->data['Expediente']['office_id'];
      		//$usr = $this->request->data['Expediente']['user_id'];

      		$start = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
            $end = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
            $caso = 'caso 4';
             
    if ($status == 'Ec') {
		 	$tag = 'Enviado & confirmado';
		 	$field  = 'status';
            $param = 1;
		 	$Label = 'Ec';
		 	
		 }elseif ($status == 'En') {
            $tag = 'Enviado nao confirmado';
		 	$field  = 'status';
		 	$param = 0;
		 	$Label = 'En';
		 	
		 }

    if ($status != 'T') {
        $Reports = $this->Expediente->find('all', array(
          'conditions' => array(
          	'Expediente.created between ? and ?' => array($start, $end),
          	'Expediente.id_remetente' => $idUser,
          	//'Expediente.office_id' => $office,
          	//'Expediente.user_id' => $usr,
          	"Expediente.$field" => $param
          	)
           )
         );
    }elseif ($status == 'T') {
    	$Label = 'T';
    	$Reports = $this->Expediente->find('all', array(
          'conditions' => array(
          	'Expediente.created between ? and ?' => array($start, $end),
          	'Expediente.id_remetente' => $idUser,
          	//'Expediente.office_id' => $office,
          	//'Expediente.user_id' => $usr,
          	'or' => array(
          		array('Expediente.status' => 0),
          		array('Expediente.status' => 1)
          		)
          	)
           )
         );
    }
  }
}
  $offices = $this->Expediente->Office->find('list');
  $users = $this->Expediente->User->find('list', array(
			'conditions' => array(
				'User.group_id' =>$idGroup,
				'NOT' => array(
					'User.id' => array(
						$idUser))
				 )
			)
		);
  //$Reports = $this->Expediente->Confirma->find('all');
  $this->set(compact('users','offices','Reports','nr_expediente','Label','usr','field','param','caso'));
  }

	public function confirmar($id=null) {
		if ($this->request->is('post')) {
			if(isset($this->request->data['Expediente']['conf']) && !empty($this->request->data['Expediente']['conf'])){
				
				$status= $this->request->data['Expediente']['expStatus'];
				
				$id_expediente= $this->request->data['Expediente']['idExp'];
				$nr_expediente = $this->request->data['Expediente']['nr_exp'];
				$estado = $this->request->data['Expediente']['conf'];
				$obser = $this->request->data['Expediente']['observacao'];
				$proviniencia = $this->request->data['Expediente']['prov'];
				$emissor = $this->request->data['Expediente']['emissor'];
				$destinatario = $this->request->data['Expediente']['destinatario'];
				$idUser = $this->request->data['Expediente']['idUser'];

        $destino = $this->request->data['Expediente']['destino'];
        $ref = $this->request->data['Expediente']['ref'];
        $remetente = $this->request->data['Expediente']['remetente'];

                if($this->Expediente->read(null, $id_expediente)){
	        	$this->Expediente->set('status', 1);
	        	if ($this->Expediente->save()) {

      switch ($destino) {
        case 25:{ 
          $correio_destino = 'recepcao_maputo@escopil.com';
           if ($remetente == 26) {
            $remetente = 'MATOLA';
          }elseif ($remetente == 27) {
             $remetente = 'TETE';
          }
          $text = 'Escritorios de '.$remetente .' Acaba de CONFIRMAR a recepcao do Expediente com a referencia '.$ref;
          }
          break;
        case 26:{
          $correio_destino = 'recepcao_matola@escopil.com';
          if ($remetente == 25) {
            $remetente = 'MAPUTO';
          }elseif ($remetente == 27) {
             $remetente = 'TETE';
          }
          $text = 'Escritorios de '.$remetente .' Acaba de CONFIRMAR a recepcao do Expediente com a referencia '.$ref;
          }
          break;
        case 27:{
          $correio_destino = 'recepcao_tete@escopil.com';
          if ($remetente == 25) {
            $remetente = 'MAPUTO';
          }elseif ($remetente == 26) {
             $remetente = 'MATOLA';
          }
          $text = 'Escritorios de '.$remetente .' Acaba de CONFIRMAR a recepcao do Expediente com a referencia '.$ref;
          }
          break;
      }

            $this->email($text, $correio_destino);
	        	return $this->redirect(array('controller' => 'confirmas','action' => 'add',$nr_expediente,$estado,$obser,$proviniencia,$emissor,$destinatario,$idUser,$id_expediente));
                  }
                }
                
			}
		}else{
		$expedientes = $this->Expediente->find('all', array(
			'conditions' => array(
				'Expediente.id' => $id
				)
			)
		);

    $confirmas = $this->Expediente->Confirma->find('all');

      }
		$this->set(compact('expedientes','id_expediente','confirmas'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$id = $id;
		$expedientes = $this->Expediente->find('all', array(
			'conditions' => array(
				'Expediente.user_id' => $id,
				'Expediente.status' => 0
				)
			)
		);
	$this->set(compact('expedientes'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($idUser=null, $idGroup=null) {
		$guiaRef = uniqid();
        $guiaRef = substr($guiaRef, 7,4);
		$expediente = 'Exp#'.$guiaRef;
		$idUser = $idUser;
		$idGroup =  $idGroup;
		if ($this->request->is('post')) {
			$this->Expediente->create();
            $this->request->data['Expediente']['proviniencia'] = $this->request->data['Expediente']['Proviniencia'];
			$this->request->data['Expediente']['remitente'] = $this->request->data['Expediente']['Username'];
			$this->request->data['Expediente']['previsao_chegada'] = $this->request->data['Expediente']['dataP'];
			$this->request->data['Expediente']['id_remetente'] = $this->request->data['Expediente']['Userid'];
			$this->request->data['Expediente']['status'] = 0;
      
      $previsao_chegada = $this->request->data['Expediente']['dataP'];
      $previsao_chegada = $previsao_chegada['day'].'-'.$previsao_chegada['month'].'-'.$previsao_chegada['year'];
      $ref = $this->request->data['Expediente']['nr_expediente'];

      $remetente = $this->request->data['Expediente']['Userid'];
      $destino = $this->request->data['Expediente']['user_id'];
      switch ($destino) {
        case 25:{ 
          $correio_destino = 'recepcao_maputo@escopil.com';
           if ($remetente == 26) {
            $remetente = 'MATOLA';
          }elseif ($remetente == 27) {
             $remetente = 'TETE';
          }
          $text = 'Escritorios de '.$remetente .' Acaba de enviar um Expediente com a referencia '.$ref.', com a data de previsao e chegada: '.$previsao_chegada;
          }
          break;
        case 26:{
          $correio_destino = 'recepcao_matola@escopil.com';
          if ($remetente == 25) {
            $remetente = 'MAPUTO';
          }elseif ($remetente == 27) {
             $remetente = 'TETE';
          }
          $text = 'Escritorios de '.$remetente .' Acaba de enviar um Expediente com a referencia '.$ref.', com a data de previsao e chegada: '.$previsao_chegada;
          }
          break;
        case 27:{
          $correio_destino = 'recepcao_tete@escopil.com';
          if ($remetente == 25) {
            $remetente = 'MAPUTO';
          }elseif ($remetente == 26) {
             $remetente = 'MATOLA';
          }
          $text = 'Escritorios de '.$remetente .' Acaba de enviar um Expediente com a referencia '.$ref.', com a data de previsao e chegada: '.$previsao_chegada;
          }
          break;
      }
			if ($this->Expediente->save($this->request->data)) {
        //$lastID = $this->Expediente->getLastInsertID();
        $this->email($text, $correio_destino);
				return $this->redirect(array('action' => 'add',$idUser,$idGroup));
			} else {
        
			}
		}
    /*$gotedExpediente = $this->Expediente->findById(42);
    $gotedExpediente = $gotedExpediente['Expediente']['cc'];
    $gotedExpediente = explode(';', $gotedExpediente);

    for ($i=0; $i <sizeof($gotedExpediente) ; $i++) {
      $this->email('ola Mundo!', $gotedExpediente[$i]);
      if ($i==sizeof($gotedExpediente) - 1) {
        break;
      }
    }*/

		$offices = $this->Expediente->Office->find('list');
		$users = $this->Expediente->User->find('list', array(
			'conditions' => array(
				'User.group_id' =>$idGroup,
				'NOT' => array(
					'User.id' => array(
						$idUser))
				 )
			)
		);
		
		$motoristas = $this->Expediente->Motorista->find('list');
		$correios = $this->Expediente->Correio->find('list');
		$this->set(compact('offices', 'users', 'motoristas', 'correios','expediente','gotedExpediente'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Expediente->exists($id)) {
			throw new NotFoundException(__('Invalid expediente'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Expediente->save($this->request->data)) {
				$this->Session->setFlash(__('The expediente has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The expediente could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Expediente.' . $this->Expediente->primaryKey => $id));
			$this->request->data = $this->Expediente->find('first', $options);
		}
		$offices = $this->Expediente->Office->find('list');
		$users = $this->Expediente->User->find('list');
		$motoristas = $this->Expediente->Motoristum->find('list');
		$correios = $this->Expediente->Correio->find('list');
		$confirmas = $this->Expediente->Confirma->find('list');
		$this->set(compact('offices', 'users', 'motoristas', 'correios', 'confirmas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Expediente->id = $id;
		if (!$this->Expediente->exists()) {
			throw new NotFoundException(__('Invalid expediente'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Expediente->delete()) {
			$this->Session->setFlash(__('The expediente has been deleted.'));
		} else {
			$this->Session->setFlash(__('The expediente could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

  public function email($text, $correio_destino){
    $this->Mail->email2($text, $correio_destino);
  }

}
