<?php
App::uses('AppController', 'Controller');
/**
 * Confirmas Controller
 *
 * @property Confirma $Confirma
 * @property PaginatorComponent $Paginator
 */
class ConfirmasController extends AppController {

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


	public function follow_expedient($idE = null) {
		App::uses('CakeTime', 'Utility');
		$confirmas = $this->Confirma->Expediente->find('all',array(
			'conditions' => array(
     		'Expediente.user_id' => $idE
     		)
     	  )
		);

	if (isset($confirmas[0]['Expediente']['previsao_chegada']) && !empty($confirmas[0]['Expediente']['previsao_chegada'])) {
	if (CakeTime::isToday($confirmas[0]['Expediente']['previsao_chegada'])) {
            /* greet user with a happy birthday message
               Enviar um email alertando sobre a data quase vencida.
             */
            $vence_hoje = 'Chega Hoje';
            if (isset($vence_hoje) && empty($vence_hoje)) {
            	$vence_hoje = '';
            }
            $this->set('vence_hoje',$vence_hoje);
        }
	}	
     $this->set(compact('confirmas','idE'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Confirma->exists($id)) {
			throw new NotFoundException(__('Invalid confirma'));
		}
		$options = array('conditions' => array('Confirma.' . $this->Confirma->primaryKey => $id));
		$this->set('confirma', $this->Confirma->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($nr_expediente=null,$estado=null,$obser=null,$proviniencia=null,$emissor=null,$destinatario=null,$idUser=null,$id_expediente=null) {
		if ($this->request->is('get')) {
			$this->Confirma->create();
			$idUser = $idUser;
			    $this->request->data['Confirma']['nr_expediente'] = $nr_expediente;
			    $this->request->data['Confirma']['estado'] = $estado;
				$this->request->data['Confirma']['observacao'] = $obser;
				$this->request->data['Confirma']['proviniencia'] = $proviniencia;
				$this->request->data['Confirma']['emissor'] = $emissor;
				$this->request->data['Confirma']['destinatario'] = $destinatario;
				$this->request->data['Confirma']['id_distinatario'] = $idUser;
			if ($this->Confirma->save($this->request->data)) {

				//$this->Session->setFlash(__('The confirma has been saved.'));
				//return $this->redirect(array('controller' => 'expedientes','action' => 'update_status',$id_expediente,$idUser));
				return $this->redirect(array('controller' => 'expedientes', 'action' => 'view',$idUser));
			} else {
				//$this->Session->setFlash(__('The confirma could not be saved. Please, try again.'));
			}
		}

		//$this->set('id_expediente', $id_expediente);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Confirma->exists($id)) {
			throw new NotFoundException(__('Invalid confirma'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Confirma->save($this->request->data)) {
				$this->Session->setFlash(__('The confirma has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The confirma could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Confirma.' . $this->Confirma->primaryKey => $id));
			$this->request->data = $this->Confirma->find('first', $options);
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
		$this->Confirma->id = $id;
		if (!$this->Confirma->exists()) {
			throw new NotFoundException(__('Invalid confirma'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Confirma->delete()) {
			$this->Session->setFlash(__('The confirma has been deleted.'));
		} else {
			$this->Session->setFlash(__('The confirma could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
