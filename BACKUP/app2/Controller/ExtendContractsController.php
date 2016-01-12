<?php
App::uses('AppController', 'Controller');
/**
 * ExtendContracts Controller
 *
 * @property ExtendContract $ExtendContract
 * @property PaginatorComponent $Paginator
 */
class ExtendContractsController extends AppController {

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
		$this->ExtendContract->recursive = 0;
		$this->set('extendContracts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ExtendContract->exists($id)) {
			throw new NotFoundException(__('Invalid extend contract'));
		}
		$options = array('conditions' => array('ExtendContract.' . $this->ExtendContract->primaryKey => $id));
		$this->set('extendContract', $this->ExtendContract->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id=null,$new_dt=null) {
		$this->Render = false;
		if ($this->request->is('get')) {
			$this->request->data['ExtendContract']['alert_contrat_id'] = $id;
			$this->request->data['ExtendContract']['extend_date'] = $new_dt;
			$this->ExtendContract->create();
			if ($this->ExtendContract->save($this->request->data)) {
				return $this->redirect(array('controller'=>'alertContrats', 'action'=>'view'));
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
		if (!$this->ExtendContract->exists($id)) {
			throw new NotFoundException(__('Invalid extend contract'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ExtendContract->save($this->request->data)) {
				$this->Session->setFlash(__('The extend contract has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The extend contract could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ExtendContract.' . $this->ExtendContract->primaryKey => $id));
			$this->request->data = $this->ExtendContract->find('first', $options);
		}
		$alertContrats = $this->ExtendContract->AlertContrat->find('list');
		$this->set(compact('alertContrats'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ExtendContract->id = $id;
		if (!$this->ExtendContract->exists()) {
			throw new NotFoundException(__('Invalid extend contract'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ExtendContract->delete()) {
			$this->Session->setFlash(__('The extend contract has been deleted.'));
		} else {
			$this->Session->setFlash(__('The extend contract could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
