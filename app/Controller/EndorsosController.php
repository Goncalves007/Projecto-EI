<?php
App::uses('AppController', 'Controller');

/**
 * Endorsos Controller
 *
 * @property Endorso $Endorso
 * @property PaginatorComponent $Paginator
 */
class EndorsosController extends AppController {

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

    public function add($idReq=null,$paga=null,$just=null,$n_guia=null,$n_factura=null,$type=null,$all=null) {
    	$this->autoRender = false;
		if ($this->request->is('get')) {
			$this->request->data['Endorso']['request_id'] = $idReq;
			$this->request->data['Endorso']['paga'] = $paga;
			$this->request->data['Endorso']['justificada'] = $just;
			$this->request->data['Endorso']['guia_entrega'] = $n_guia;
            $this->request->data['Endorso']['n_factura'] = $n_factura;
            $this->request->data['Endorso']['type'] = $type;
            $this->request->data['Endorso']['all'] = $all;

			$this->Endorso->create();
			if ($this->Endorso->save($this->request->data)) {
				//$this->Session->setFlash(__('The external request has been saved.'));
			   return $this->redirect(array('controller' => 'reports', 'action' => 'all'));
			} else {
				//$this->Session->setFlash(__('The external request could not be saved. Please, try again.'));
			}
	}elseif ($this->request->is('post')) {
		$id = $this->request->data['Endorso']['hidden'];
		$int = $this->request->data['Endorso']['int'];
		//$ext = $this->request->data['Endorso']['ext'];
	     if($this->Endorso->read(null, $id)){
	     	if (!empty($this->request->data['Endorso']['guia']) || !empty($this->request->data['Endorso']['factura'])) {
	     		$this->Endorso->set('guia_entrega',$this->request->data['Endorso']['guia']);
			    $this->Endorso->set('n_factura',$this->request->data['Endorso']['factura']);
			    if (isset($this->request->data['Endorso']['Pay']) && !empty($this->request->data['Endorso']['Pay'])) {
			    	$this->Endorso->set('paga',1);
			    }elseif (isset($this->request->data['Endorso']['Justify']) && !empty($this->request->data['Endorso']['Justify'])) {
			    	$this->Endorso->set('justificada',1);
			    }

            if ($this->Endorso->save($this->request->data)) {
            if ($int == "int") {
            	$Controller = 'internalRequests';
            }else{
            	$Controller = 'externalRequests';
            }
			return $this->redirect(array('controller' =>$Controller, 'action' => 'check_status'));
			 //return $this->redirect(array('controller' => 'reports', 'action' => 'all'));
			}

	     	}elseif((empty($this->request->data['Endorso']['guia'])) && (empty($this->request->data['Endorso']['factura']))){
	     	$this->Endorso->set('paga',0);
			$this->Endorso->set('justificada',0);
			$this->Endorso->set('guia_entrega',0);
			$this->Endorso->set('n_factura',0);
			if ($int == "int") {
            	$Controller = 'internalRequests';
            }else{
            	$Controller = 'externalRequests';
            }
			$sms = "Operacao nao foi executada, Campos Vasios";
             return $this->redirect(array('controller' =>'externalRequests', 'action' => 'check_status',$sms));
            }
			if ($this->Endorso->save($this->request->data)) {
				//$this->Session->setFlash(__('The external request has been saved.'));
			   return $this->redirect(array('controller' => 'externalRequests', 'action' => 'check_status'));
			}
	      }
	}
  }
 
    public function update_req($idReq=null,$paga=null,$just=null,$n_guia=null,$n_factura=null) {
		if ($this->request->is('get')) {
			if($this->Endorso->read(null, $idReq)){
			$this->Endorso->set('paga',$paga);
			$this->Endorso->set('justificada',$just);
			$this->Endorso->set('guia_entrega',$n_guia);
			$this->Endorso->set('N_factura',$n_factura);
        }
			$this->Endorso->create();
			if ($this->Endorso->save($this->request->data)) {
				//$this->Session->setFlash(__('The Endorso has been saved.'));
				return $this->redirect(array('Controller' => 'Endorsos', 'action' => 'view',$idDep));
			} else {
				//$this->Session->setFlash(__('The Endorso could not be saved. Please, try again.'));
			}
		}
		$internalRequests = $this->Endorso->InternalRequest->find('list');
		$externalRequests = $this->Endorso->ExternalRequest->find('list');
		$users = $this->Endorso->User->find('list');
		$statuses = $this->Endorso->Status->find('list');
		$this->set(compact('internalRequests', 'externalRequests', 'users', 'statuses'));
	}

	
	/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
}
