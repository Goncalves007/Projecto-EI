<?php
App::uses('AppController', 'Controller');
/**
 * UpdateBudgets Controller
 *
 * @property UpdateBudget $UpdateBudget
 * @property PaginatorComponent $Paginator
 */
class UpdateBudgetsController extends AppController {

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
		$this->UpdateBudget->recursive = 0;
		$this->set('updateBudgets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UpdateBudget->exists($id)) {
			throw new NotFoundException(__('Invalid update budget'));
		}
		$options = array('conditions' => array('UpdateBudget.' . $this->UpdateBudget->primaryKey => $id));
		$this->set('updateBudget', $this->UpdateBudget->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id=null, $date_update=null, $used_budget=null, $balance=null) {
		$this->Render = false;
		if ($this->request->is('get')) {
			$this->UpdateBudget->create();
			$this->request->data['UpdateBudget']['client_id'] = $id;
			$this->request->data['UpdateBudget']['date_update'] = $date_update;
			$this->request->data['UpdateBudget']['used_budget'] = $used_budget;
			$this->request->data['UpdateBudget']['balance'] = $balance;

			if ($this->UpdateBudget->save($this->request->data)) {
				//$this->Session->setFlash(__('The update budget has been saved.'));
				return $this->redirect(array('controller' => 'clients','action' => 'update', $id));
			} else {
				//$this->Session->setFlash(__('The update budget could not be saved. Please, try again.'));
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
		if (!$this->UpdateBudget->exists($id)) {
			throw new NotFoundException(__('Invalid update budget'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UpdateBudget->save($this->request->data)) {
				$this->Session->setFlash(__('The update budget has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The update budget could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UpdateBudget.' . $this->UpdateBudget->primaryKey => $id));
			$this->request->data = $this->UpdateBudget->find('first', $options);
		}
		$clients = $this->UpdateBudget->Client->find('list');
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
		$this->UpdateBudget->id = $id;
		if (!$this->UpdateBudget->exists()) {
			throw new NotFoundException(__('Invalid update budget'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UpdateBudget->delete()) {
			$this->Session->setFlash(__('The update budget has been deleted.'));
		} else {
			$this->Session->setFlash(__('The update budget could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
