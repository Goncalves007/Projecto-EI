<?php 

/**
* 
*/
class DataComponent extends Component
{
   protected $_controller = null;

   public function startup( Controller $controller){
         $this->_controller = $controller;
   }

   function escreveData($data){
	$var = explode('-', $data);
	$novadata = $var[2] . '/' . $var[1] . '/' . $var[0];
	return $novadata;
	}

}