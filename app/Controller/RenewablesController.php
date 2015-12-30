<?php
App::uses('AppController', 'Controller');
/**
 * Renewables Controller
 *
 * @property Renewable $Renewable
 * @property PaginatorComponent $Paginator
 */
class RenewablesController extends AppController {

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
		$this->Renewable->recursive = 0;
		$this->set('renewables', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Renewable->exists($id)) {
			throw new NotFoundException(__('Invalid renewable'));
		}
		$options = array('conditions' => array('Renewable.' . $this->Renewable->primaryKey => $id));
		$this->set('renewable', $this->Renewable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Renewable->create();
			if ($this->Renewable->save($this->request->data)) {
				$this->Session->setFlash(__('The renewable has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The renewable could not be saved. Please, try again.'));
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
		if (!$this->Renewable->exists($id)) {
			throw new NotFoundException(__('Invalid renewable'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Renewable->save($this->request->data)) {
				$this->Session->setFlash(__('The renewable has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The renewable could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Renewable.' . $this->Renewable->primaryKey => $id));
			$this->request->data = $this->Renewable->find('first', $options);
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
		$this->Renewable->id = $id;
		if (!$this->Renewable->exists()) {
			throw new NotFoundException(__('Invalid renewable'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Renewable->delete()) {
			$this->Session->setFlash(__('The renewable has been deleted.'));
		} else {
			$this->Session->setFlash(__('The renewable could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
