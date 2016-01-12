<?php
App::uses('AppController', 'Controller');
/**
 * Extends Controller
 *
 * @property Extend $Extend
 * @property PaginatorComponent $Paginator
 */
class ExtendsController extends AppController {

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
		$this->Extend->recursive = 0;
		$this->set('extends', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Extend->exists($id)) {
			throw new NotFoundException(__('Invalid extend'));
		}
		$options = array('conditions' => array('Extend.' . $this->Extend->primaryKey => $id));
		$this->set('extend', $this->Extend->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($idU=null, $start_dateU=null, $new_end_dateU=null) {
		$this->Render = false;
		if ($this->request->is('get')) {
		 $this->Extend->create();
		  $this->request->data['Extend']['client_id'] = $idU;
          $this->request->data['Extend']['start_date'] = $start_dateU;
          $this->request->data['Extend']['new_end_date'] = $new_end_dateU;
			if ($this->Extend->save($this->request->data)) {
				return $this->redirect(array('controller' => 'clients','action' => 'update',$idU));
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
		if (!$this->Extend->exists($id)) {
			throw new NotFoundException(__('Invalid extend'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Extend->save($this->request->data)) {
				$this->Session->setFlash(__('The extend has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The extend could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Extend.' . $this->Extend->primaryKey => $id));
			$this->request->data = $this->Extend->find('first', $options);
		}
		$clients = $this->Extend->Client->find('list');
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
		$this->Extend->id = $id;
		if (!$this->Extend->exists()) {
			throw new NotFoundException(__('Invalid extend'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Extend->delete()) {
			$this->Session->setFlash(__('The extend has been deleted.'));
		} else {
			$this->Session->setFlash(__('The extend could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
