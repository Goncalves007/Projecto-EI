<?php
App::uses('AppController', 'Controller');
/**
 * Correios Controller
 *
 * @property Correio $Correio
 * @property PaginatorComponent $Paginator
 */
class CorreiosController extends AppController {

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
		$this->Correio->recursive = 0;
		$this->set('correios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Correio->exists($id)) {
			throw new NotFoundException(__('Invalid correio'));
		}
		$options = array('conditions' => array('Correio.' . $this->Correio->primaryKey => $id));
		$this->set('correio', $this->Correio->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Correio->create();
			if ($this->Correio->save($this->request->data)) {
				//$this->Session->setFlash(__('The correio has been saved.'));
				return $this->redirect(array('action' => 'add'));
			} else {
				//$this->Session->setFlash(__('The correio could not be saved. Please, try again.'));
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
		if (!$this->Correio->exists($id)) {
			throw new NotFoundException(__('Invalid correio'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Correio->save($this->request->data)) {
				$this->Session->setFlash(__('The correio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The correio could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Correio.' . $this->Correio->primaryKey => $id));
			$this->request->data = $this->Correio->find('first', $options);
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
		$this->Correio->id = $id;
		if (!$this->Correio->exists()) {
			throw new NotFoundException(__('Invalid correio'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Correio->delete()) {
			$this->Session->setFlash(__('The correio has been deleted.'));
		} else {
			$this->Session->setFlash(__('The correio could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
