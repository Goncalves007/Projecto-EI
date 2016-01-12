<?php
App::uses('AppController', 'Controller');
/**
 * ContractTypes Controller
 *
 * @property ContractType $ContractType
 * @property PaginatorComponent $Paginator
 */
class ContractTypesController extends AppController {

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
		$this->ContractType->recursive = 0;
		$this->set('contractTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ContractType->exists($id)) {
			throw new NotFoundException(__('Invalid contract type'));
		}
		$options = array('conditions' => array('ContractType.' . $this->ContractType->primaryKey => $id));
		$this->set('contractType', $this->ContractType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ContractType->create();
			if ($this->ContractType->save($this->request->data)) {
				$this->Session->setFlash(__('The contract type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contract type could not be saved. Please, try again.'));
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
		if (!$this->ContractType->exists($id)) {
			throw new NotFoundException(__('Invalid contract type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ContractType->save($this->request->data)) {
				$this->Session->setFlash(__('The contract type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contract type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ContractType.' . $this->ContractType->primaryKey => $id));
			$this->request->data = $this->ContractType->find('first', $options);
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
		$this->ContractType->id = $id;
		if (!$this->ContractType->exists()) {
			throw new NotFoundException(__('Invalid contract type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ContractType->delete()) {
			$this->Session->setFlash(__('The contract type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The contract type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
