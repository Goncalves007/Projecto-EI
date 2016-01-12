<?php 

/**
* 
*/
class UrlComponent extends Component
{
   protected $_controller = null;

   public function startup( Controller $controller){
         $this->_controller = $controller;

   }

 public function UrlAtual(){
	 $dominio= $_SERVER['HTTP_HOST'];
	 $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
	 return $url;

 
 }
    
}