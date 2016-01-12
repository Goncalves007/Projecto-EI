<?php
App::uses('AppController', 'Controller','TableRegistry');

/**
 * Endorsements Controller
 *
 * @property Endorsement $Endorsement
 * @property PaginatorComponent $Paginator
 */
class EndorsementsController extends AppController {

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
	public function index() {
		$this->Endorsement->recursive = 0;
		$this->set('endorsements', $this->Paginator->paginate());
	}

	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function request($status = null) {

		$InternalRequests = $this->Endorsement->InternalRequest->find('all', array(
			'conditions' => array(
                'InternalRequest.request_status' => $status
				),
			'fields' => array(
				'InternalRequest.id',
				'InternalRequest.reference_application',
				'InternalRequest.created',
				'InternalRequest.payment_details'
				),
			''
			));
        $Endorsements = $this->Endorsement->find('all', array(
        	'fields' =>
        	    'request_id')
        );


        $ExternalRequests = $this->Endorsement->ExternalRequest->find('all', array(
			'conditions' => array(
				'ExternalRequest.request_status' => $status
				),
			'fields' => array(
				'ExternalRequest.id',
				'ExternalRequest.reference_application',
				'ExternalRequest.created',
				'ExternalRequest.payment_details'
				)
			));

		$this->set('InternalRequests',$InternalRequests);
		$this->set('ExternalRequests',$ExternalRequests);


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

  $c = array_merge($a,$b);
  $this->set('Reports',$c);
   $this->set('Endorsements',$Endorsements);
     

	}

	public function view($idDep = null) {
		$InternalRequests = $this->Endorsement->InternalRequest->find('all', array(
			'conditions' => array(
				'InternalRequest.department_id' => $idDep,
                'InternalRequest.request_status' => 0
				),
			'fields' => array(
				'InternalRequest.id',
				'InternalRequest.reference_application',
				'InternalRequest.created',
				'InternalRequest.payment_details',
				'InternalRequest.department_id'
				),
			''
			));
        $Endorsements = $this->Endorsement->find('all', array(
        	'fields' =>
        	    'request_id')
        );


        $ExternalRequests = $this->Endorsement->ExternalRequest->find('all', array(
			'conditions' => array(
				'ExternalRequest.department_id' => $idDep,
				'ExternalRequest.request_status' => 0
				),
			'fields' => array(
				'ExternalRequest.id',
				'ExternalRequest.reference_application',
				'ExternalRequest.created',
				'ExternalRequest.payment_details',
				'ExternalRequest.department_id'
				)
			));

		$this->set('InternalRequests',$InternalRequests);
		$this->set('ExternalRequests',$ExternalRequests);


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

  $c = array_merge($a,$b);
  $this->set('Reports',$c);

 
   $this->set('alert',count($c));
   $this->set('Endorsements',$Endorsements);
	}

public function requests() {
		$InternalRequests = $this->Endorsement->InternalRequest->find('all', 
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
                    'InternalRequest.reference_application',
                    'InternalRequest.payment_details',
                    'InternalRequest.created',
                    'InternalRequest.request_status'
                )
        ));

        $Endorsements = $this->Endorsement->find('all', 
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
                    'ExternalRequest.reference_application',
                    'ExternalRequest.payment_details',
                    'ExternalRequest.created',
                    'ExternalRequest.request_status'
                )
        ));

		$this->set('InternalRequests',$InternalRequests);
		$this->set('ExternalRequests',$ExternalRequests);


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

  $c = array_merge($a,$b);
  $this->set('Reports',$c);
   $this->set('Endorsements',$Endorsements);
	}



	public function details($idUser=null,$idApplicant=null,$idDep=null){
       $InternalRequests = $this->Endorsement->InternalRequest->find('all', array(
			'conditions' => array(
				'InternalRequest.user_id' => $idUser,
				'Endorsement.idApplicant' => $idApplicant,
				'InternalRequest.department_id' => $idDep
				),
			'fields' => array(
				'InternalRequest.id',
				'InternalRequest.reference_application',
				'InternalRequest.created',
				'InternalRequest.payment_details'
				)
			));
        $Endorsements = $this->Endorsement->find('all', array(
        	'conditions' => array(
        		'Endorsement.user_id' => $idUser,
				'Endorsement.idApplicant' => $idApplicant
        		)
        ));


        $ExternalRequests = $this->Endorsement->ExternalRequest->find('all', array(
			'conditions' => array(
				'ExternalRequest.user_id' => $idUser,
				'Endorsement.idApplicant' => $idApplicant,
				'ExternalRequest.department_id' => $idDep
				),
			'fields' => array(
				'ExternalRequest.id',
				'ExternalRequest.reference_application',
				'ExternalRequest.created',
				'ExternalRequest.payment_details'
				)
			));

		$this->set('InternalRequests',$InternalRequests);
		$this->set('ExternalRequests',$ExternalRequests);


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

  $c = array_merge($a,$b);
  $this->set('Reports',$c);
   $this->set('Endorsements',$Endorsements);
       

	}

	
/**
 * add method
 *
 * @return void
 */
	
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Endorsement->exists($id)) {
			throw new NotFoundException(__('Invalid endorsement'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Endorsement->save($this->request->data)) {
				$this->Session->setFlash(__('The endorsement has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The endorsement could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Endorsement.' . $this->Endorsement->primaryKey => $id));
			$this->request->data = $this->Endorsement->find('first', $options);
		}
		$internalRequests = $this->Endorsement->InternalRequest->find('list');
		$externalRequests = $this->Endorsement->ExternalRequest->find('list');
		$users = $this->Endorsement->User->find('list');
		$statuses = $this->Endorsement->Status->find('list');
		$this->set(compact('internalRequests', 'externalRequests', 'users', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Endorsement->id = $id;
		if (!$this->Endorsement->exists()) {
			throw new NotFoundException(__('Invalid endorsement'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Endorsement->delete()) {
			$this->Session->setFlash(__('The endorsement has been deleted.'));
		} else {
			$this->Session->setFlash(__('The endorsement could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
