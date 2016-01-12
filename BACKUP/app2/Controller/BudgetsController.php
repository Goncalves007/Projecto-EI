<?php
App::uses('AppController', 'Controller');
/**
 * ExternalRequests Controller
 *
 * @property ExternalRequest $ExternalRequest
 * @property PaginatorComponent $Paginator
 */
class BudgetsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Data');

/**
 * index method
 *
 * @return void
 */
	public function update_budget($id=null, $new_budget=null, $idDep=null,$idReq=null,$refReq=null){
		$this->autoRender = false ;

		if ($this->request->is('get')) {	
	        $this->Budget->read(null, $id);
			$this->Budget->set('budget', $new_budget);
			$this->Budget->set('modified', $this->data(date('Y-m-d')));
			$this->Budget->save();
			if (substr($refReq, 0,6)=='RefInt') {
                $type = 'int';
			  }elseif (substr($refReq, 0,6)=='RefExt') {
				  $type = 'ext';
			   }
				return $this->redirect(array('controller' => 'endorsos', 'action' => 'add',$idReq,0,0,0,0,$type,1));
			}
	}
	

   public function data($data){
   	$this->Data->escreveData($data);
   }


}
