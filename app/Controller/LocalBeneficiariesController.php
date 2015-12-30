<?php
App::uses('AppController', 'Controller');
/**
 * LocalBeneficiaries Controller
 *
 * @property LocalBeneficiary $LocalBeneficiary
 * @property PaginatorComponent $Paginator
 */
class LocalBeneficiariesController extends AppController {

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
		$this->LocalBeneficiary->recursive = 0;
		$this->set('localBeneficiaries', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LocalBeneficiary->exists($id)) {
			throw new NotFoundException(__('Invalid local beneficiary'));
		}
		$options = array('conditions' => array('LocalBeneficiary.' . $this->LocalBeneficiary->primaryKey => $id));
		$this->set('localBeneficiary', $this->LocalBeneficiary->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LocalBeneficiary->create();
			if ($this->LocalBeneficiary->save($this->request->data)) {
				$this->Session->setFlash(__('The local beneficiary has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The local beneficiary could not be saved. Please, try again.'));
			}
		}
		$departments = $this->LocalBeneficiary->Department->find('list');
		$this->set(compact('departments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->LocalBeneficiary->exists($id)) {
			throw new NotFoundException(__('Invalid local beneficiary'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LocalBeneficiary->save($this->request->data)) {
				$this->Session->setFlash(__('The local beneficiary has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The local beneficiary could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('LocalBeneficiary.' . $this->LocalBeneficiary->primaryKey => $id));
			$this->request->data = $this->LocalBeneficiary->find('first', $options);
		}
		$departments = $this->LocalBeneficiary->Department->find('list');
		$this->set(compact('departments'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->LocalBeneficiary->id = $id;
		if (!$this->LocalBeneficiary->exists()) {
			throw new NotFoundException(__('Invalid local beneficiary'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->LocalBeneficiary->delete()) {
			$this->Session->setFlash(__('The local beneficiary has been deleted.'));
		} else {
			$this->Session->setFlash(__('The local beneficiary could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
