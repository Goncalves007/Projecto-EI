<?php
App::uses('AppController', 'Controller');
/**
 * ExternalBeneficiaries Controller
 *
 * @property ExternalBeneficiary $ExternalBeneficiary
 * @property PaginatorComponent $Paginator
 */
class ExternalBeneficiariesController extends AppController {

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
		$this->ExternalBeneficiary->recursive = 0;
		$this->set('externalBeneficiaries', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ExternalBeneficiary->exists($id)) {
			throw new NotFoundException(__('Invalid external beneficiary'));
		}
		$options = array('conditions' => array('ExternalBeneficiary.' . $this->ExternalBeneficiary->primaryKey => $id));
		$this->set('externalBeneficiary', $this->ExternalBeneficiary->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($hint=null,$idUser=null,$idDep=null) {
		if ($this->request->is('post')) {
			$this->ExternalBeneficiary->create();
			if ($this->ExternalBeneficiary->save($this->request->data)) {
				if ($hint == 'ext') {
					$Controller='externalRequests';
				}elseif ($hint == 'int') {
					$Controller='internalRequests';
				}
			return $this->redirect(array('controller' => $Controller, 'action' => 'add',$idUser,$idDep));

			} else {
				//$this->Session->setFlash(__('The provider could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ExternalBeneficiary->exists($id)) {
			throw new NotFoundException(__('Invalid external beneficiary'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ExternalBeneficiary->save($this->request->data)) {
				$this->Session->setFlash(__('The external beneficiary has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The external beneficiary could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ExternalBeneficiary.' . $this->ExternalBeneficiary->primaryKey => $id));
			$this->request->data = $this->ExternalBeneficiary->find('first', $options);
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
		$this->ExternalBeneficiary->id = $id;
		if (!$this->ExternalBeneficiary->exists()) {
			throw new NotFoundException(__('Invalid external beneficiary'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ExternalBeneficiary->delete()) {
			$this->Session->setFlash(__('The external beneficiary has been deleted.'));
		} else {
			$this->Session->setFlash(__('The external beneficiary could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
