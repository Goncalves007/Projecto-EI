<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array(
          "Auth",
          "Acl",
          "Admin.AclPermissions"
		);

	public function beforeFilter(){
		parent::beforeFilter();
		$this->AclPermissions->filter();
	}

  public $paginate = array(
    'limit' => 5,
    'order' => array('AlertContrats.id' => 'Desc')
    );



	public function index($idUsr=null) {
   $ExternalRequests = $this->Report->ExternalRequest->find('all', 
     array(
        'conditions'=>array(
         'ExternalRequest.user_id'=> $idUsr
          ),
        'fields'=>array(
                    'ExternalRequest.id',
                    'ExternalRequest.user_id',
                    'ExternalRequest.reference_application',
                    'ExternalRequest.payment_details',
                    'ExternalRequest.created',
                    'ExternalRequest.request_status'
                ),
        'order' => 'ExternalRequest.created DESC'
        ));

   $InternalRequests = $this->Report->InternalRequest->find('all', 
     array(
        'conditions'=>array(
                    'InternalRequest.user_id'=> $idUsr
          ),
        'fields'=>array(
                    'InternalRequest.id',
                    'InternalRequest.user_id',
                    'InternalRequest.reference_application',
                    'InternalRequest.payment_details',
                    'InternalRequest.created',
                    'InternalRequest.request_status'
                ),
        'order' => 'InternalRequest.created DESC'
        ));

    $a[] = array();
    $b[] = array();

    foreach ($ExternalRequests as $ExternalRequest):
    $a[] = $ExternalRequest['ExternalRequest'];
    endforeach;

    foreach ($InternalRequests as $InternalRequest):
    $b[] = $InternalRequest['InternalRequest'];
    endforeach;

//Remover partes vazias
  $a = array_filter($a);
  $b = array_filter($b);

  $c = array_merge($a,$b);
  return $c;
  // if (empty($reports) ) {
    //  $this->render('/Errors/error001');
 //   }else{
     // $this->set('Reports',$b);
   // }
   
}
}
