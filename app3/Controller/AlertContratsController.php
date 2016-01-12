<?php
App::uses('AppController', 'Controller');
/**
 * AlertContrats Controller
 *
 * @property AlertContrat $AlertContrat
 * @property PaginatorComponent $Paginator
 */
class AlertContratsController extends AppController {

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
		$this->AlertContrat->recursive = 0;
		$this->set('alertContrats', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view(){
   
    if ($this->request->is('post')) {
    	if (isset($this->request->data['AlertContrats']['Search']) && !empty($this->request->data['AlertContrats']['Search']) && !empty($this->request->data['AlertContrats']['contract_type_id'])) {
      $contracted_name =$this->request->data['AlertContrats']['Search'];
      $contract_type_id =$this->request->data['AlertContrats']['contract_type_id'];

      $Contratados = $this->AlertContrat->find('all', array(
          'conditions' => array(
            'AlertContrat.nome_contratado LIKE' =>"%$contracted_name%",
            'AlertContrat.contract_type_id' =>$contract_type_id
            )
           )
         );
       $Label = 'S';
     }else{
      $Contratados = '';
      $Label = '';
     }

     if (isset($this->request->data['AlertContrats']['Search']) && !empty($this->request->data['AlertContrats']['Search']) && empty($this->request->data['AlertContrats']['contract_type_id'])) {
      $contracted_name =$this->request->data['AlertContrats']['Search'];
      $Contratados = $this->AlertContrat->find('all', array(
          'conditions' => array(
            'AlertContrat.nome_contratado LIKE' =>"%$contracted_name%"
            )
           )
         );
       $Label = 'T';
     }

     if (empty($this->request->data['AlertContrats']['Search']) && empty($this->request->data['AlertContrats']['contract_type_id']) && !empty($this->request->data['AlertContrats']['req'])) {
      $Contratados = $this->AlertContrat->find('all', array(
          'conditions' => array(
            'AlertContrat.td' =>1
            )
           )
         );
       $Label = 'K';
     }

     if (empty($this->request->data['AlertContrats']['Search']) && !empty($this->request->data['AlertContrats']['contract_type_id']) && !empty($this->request->data['AlertContrats']['req'])) {
      $contract_type_id =$this->request->data['AlertContrats']['contract_type_id'];

      $Contratados = $this->AlertContrat->find('all', array(
          'conditions' => array(
            'AlertContrat.td' =>1,
            'AlertContrat.contract_type_id' =>$contract_type_id
            )
           )
         );
       $Label = 'J';
     }

    }

    $contractTypes = $this->AlertContrat->ContractType->find('list');
	//$Contratados = $this->AlertContrat->find('all');
		
	$this->set(compact('contractTypes','Contratados'));
	}
	

/**
 * add method
 *
 * @return void
 */
	public function add($hint=null) {
		if ($this->request->is('post')) {
			$this->AlertContrat->create();
			$this->request->data['AlertContrat']['td'] = 1;
			if ($this->request->data['AlertContrat']['contract_type_id'] == 1) {
				$this->request->data['AlertContrat']['data_fim'] = '';
				$this->request->data['AlertContrat']['status'] = 1;
			}else{
				$this->request->data['AlertContrat']['status'] = 0;
			}

			if ($this->AlertContrat->save($this->request->data)) {
				//$this->Session->setFlash(__('The alert contrat has been saved.'));
				return $this->redirect(array('action' => 'add'));
			} else {
				//$this->Session->setFlash(__('The alert contrat could not be saved. Please, try again.'));
			}
		
	   }
		$contractTypes = $this->AlertContrat->ContractType->find('list');
		$Contratados = $this->AlertContrat->find('all');
		/*$this->paginate['AlertContrat']['limit'] = 3;
		$this->paginate['AlertContrat']['conditions'] = array(
                 'AlertContrat.status' => 2
			);
		$this->set('Contratados',$this->paginate());*/
		$this->set(compact('contractTypes','Contratados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		//$this->Render = false;
		if (!$this->AlertContrat->exists($id)) {
			throw new NotFoundException(__('Invalid alert contrat'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$contract_type = $this->request->data['AlertContrat']['contract_type_id'];
			if($this->AlertContrat->read(null, $id)){
				if ($contract_type == 1) {
					$this->AlertContrat->set('dt_prorogacao','');
					$this->AlertContrat->set('data_fim','');
				}
			if ($this->AlertContrat->save($this->request->data)) {
				//$this->Session->setFlash(__('The alert contrat has been saved.'));
				return $this->redirect(array('action' => 'view'));
			}} else {
				//$this->Session->setFlash(__('The alert contrat could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AlertContrat.' . $this->AlertContrat->primaryKey => $id));
			$this->request->data = $this->AlertContrat->find('first', $options);
		}
		$contractTypes = $this->AlertContrat->ContractType->find('list');
		$this->set(compact('contractTypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AlertContrat->id = $id;
		if (!$this->AlertContrat->exists()) {
			throw new NotFoundException(__('Invalid alert contrat'));
		}
		$this->request->is('post', 'get');
		if ($this->AlertContrat->delete()) {
			//$this->Session->setFlash(__('The alert contrat has been deleted.'));
		} else {
			//$this->Session->setFlash(__('The alert contrat could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'view'));
	}

	public function prorogar($id = null){
     if ($this->request->is('post')) {
       $new_dt = $this->request->data['AlertContrat']['dt_prorogacao'];
       $new_end_dt = $new_dt['year'].'-'.$new_dt['month'].'-'.$new_dt['day'];
       $id = $this->request->data['AlertContrat']['id'];
     	if($this->AlertContrat->read(null, $id)){
     		$this->AlertContrat->set('dt_prorogacao',$new_dt);
     		}
     		
     		$this->AlertContrat->create();
			if ($this->AlertContrat->save($this->request->data)) {
				return $this->redirect(array('controller'=>'extendContracts', 'action'=>'add',$id,$new_end_dt));
			} else {
				//$this->Session->setFlash(__('The Endorso could not be saved. Please, try again.'));
			}
     }
     $this->set(compact('id'));
	}

    public function search(){
    	if ($this->request->is('post')) {
          if (isset($this->request->data['AlertContrat']['search']) && !empty($this->request->data['Client']['search'])) {
      $contracted_name =$this->request->data['AlertContrat']['search'];
      $Contratados = $this->AlertContrat->find('all', array(
          'conditions' => array(
            'AlertContrat.nome_contratado' =>$contracted_name
            )
           )
         );
       $Label = 'S';
    }else{
      $Contratados = '';
      $Label = '';
    }      
      	}

      $this->set(compact('Contratados'));	
      $this->render('add');

    }
}
