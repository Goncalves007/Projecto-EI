<?php
App::uses('AppController', 'Controller');
/**
 * Administrations Controller
 *
 * @property Administration $Administration
 * @property PaginatorComponent $Paginator
 */
class AdministrationsController extends AppController {

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
		$this->Administration->recursive = 0;
		$this->set('administrations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Administration->exists($id)) {
			throw new NotFoundException(__('Invalid administration'));
		}
		$options = array('conditions' => array('Administration.' . $this->Administration->primaryKey => $id));
		$this->set('administration', $this->Administration->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Administration->create();
			if ($this->Administration->save($this->request->data)) {
				$this->Session->setFlash(__('The administration has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The administration could not be saved. Please, try again.'));
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
		if (!$this->Administration->exists($id)) {
			throw new NotFoundException(__('Invalid administration'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Administration->save($this->request->data)) {
				$this->Session->setFlash(__('The administration has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The administration could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Administration.' . $this->Administration->primaryKey => $id));
			$this->request->data = $this->Administration->find('first', $options);
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
		$this->Administration->id = $id;
		if (!$this->Administration->exists()) {
			throw new NotFoundException(__('Invalid administration'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Administration->delete()) {
			$this->Session->setFlash(__('The administration has been deleted.'));
		} else {
			$this->Session->setFlash(__('The administration could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
