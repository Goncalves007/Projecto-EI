<?php
App::uses('AppController', 'Controller');
/**
 * RenewBudgets Controller
 *
 * @property RenewBudget $RenewBudget
 * @property PaginatorComponent $Paginator
 */
class RenewBudgetsController extends AppController {

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
		$this->RenewBudget->recursive = 0;
		$this->set('renewBudgets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RenewBudget->exists($id)) {
			throw new NotFoundException(__('Invalid renew budget'));
		}
		$options = array('conditions' => array('RenewBudget.' . $this->RenewBudget->primaryKey => $id));
		$this->set('renewBudget', $this->RenewBudget->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id =null, $old_budget=null, $new_budget=null) {
		$this->Render = false;
		if ($this->request->is('get')) {
			$this->request->data['RenewBudget']['client_id'] = $id;
			$this->request->data['RenewBudget']['old_budget'] = $old_budget;
			$this->request->data['RenewBudget']['actual_budget'] = $new_budget;
			$this->RenewBudget->create();
			if ($this->RenewBudget->save($this->request->data)) {
				//$this->Session->setFlash(__('The renew budget has been saved.'));
				return $this->redirect(array('controller' =>'Clients','action' => 'update',$id));
			} else {
				//$this->Session->setFlash(__('The renew budget could not be saved. Please, try again.'));
			}
		}
		$clients = $this->RenewBudget->Client->find('list');
		$this->set(compact('clients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RenewBudget->exists($id)) {
			throw new NotFoundException(__('Invalid renew budget'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RenewBudget->save($this->request->data)) {
				$this->Session->setFlash(__('The renew budget has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The renew budget could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RenewBudget.' . $this->RenewBudget->primaryKey => $id));
			$this->request->data = $this->RenewBudget->find('first', $options);
		}
		$clients = $this->RenewBudget->Client->find('list');
		$this->set(compact('clients'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RenewBudget->id = $id;
		if (!$this->RenewBudget->exists()) {
			throw new NotFoundException(__('Invalid renew budget'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RenewBudget->delete()) {
			$this->Session->setFlash(__('The renew budget has been deleted.'));
		} else {
			$this->Session->setFlash(__('The renew budget could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
