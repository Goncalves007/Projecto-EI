<?php
App::uses('AppController','Controller');

class RelatoriosController extends AppController {

	public $uses = array();


	public function index(){
	}

	public function view(){

		$this->layout = 'pdf';
        $this->render();
	}


}