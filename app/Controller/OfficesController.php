<?php
App::uses('AppController', 'Controller');
/**
 * Offices Controller
 *
 * @property Office $Office
 * @property PaginatorComponent $Paginator
 */
class OfficesController extends AppController {

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
		$this->Office->recursive = 0;
		$this->set('offices', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Office->exists($id)) {
			throw new NotFoundException(__('Invalid office'));
		}
		$options = array('conditions' => array('Office.' . $this->Office->primaryKey => $id));
		$this->set('office', $this->Office->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Office->create();
			if ($this->Office->save($this->request->data)) {
				$this->Session->setFlash(__('The office has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The office could not be saved. Please, try again.'));
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
		if (!$this->Office->exists($id)) {
			throw new NotFoundException(__('Invalid office'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Office->save($this->request->data)) {
				$this->Session->setFlash(__('The office has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The office could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Office.' . $this->Office->primaryKey => $id));
			$this->request->data = $this->Office->find('first', $options);
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
		$this->Office->id = $id;
		if (!$this->Office->exists()) {
			throw new NotFoundException(__('Invalid office'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Office->delete()) {
			$this->Session->setFlash(__('The office has been deleted.'));
		} else {
			$this->Session->setFlash(__('The office could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
