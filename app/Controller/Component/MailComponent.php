<?php 

/**
* 
*/
class MailComponent extends Component
{
   protected $_controller = null;

   public function startup( Controller $controller){
         $this->_controller = $controller;

   }

    public function email($text=null, $correio=null){ 
    App::uses('CakeEmail', 'Network/Email');
      
                $Email = new CakeEmail('gmail');
                $Email->to(array($correio,'financas@escopil.com','tesoureiro@escopil.com','administracao@escopil.com','lzunguene@escopil.co.mz'));
                $Email->emailFormat('html');
                
                $Email->template('notification')->viewVars(
                    array('text'=>$text));

                $Email->subject('Sistema de Notificacao');
                $Email->replyTo('the_mail_you_want_to_receive_replies@yourdomain.com');
                $Email->from ('your_user@gmail.com');
                $Email->send();

        //return $this->redirect(array('controller' => 'reports','action' => 'all'));
   }

   public function email2($text=null,$correio_destino){ 
    App::uses('CakeEmail', 'Network/Email');
      
                $Email = new CakeEmail('gmail');
                $Email->to(array($correio_destino,'recepcao@yopmail.fr'));
                $Email->emailFormat('html');
                
                $Email->template('notification')->viewVars(
                    array('text'=>$text));

                $Email->subject('Sistema de Notificacao');
                $Email->replyTo('the_mail_you_want_to_receive_replies@yourdomain.com');
                $Email->from ('your_user@gmail.com');
                $Email->send();

        //return $this->redirect(array('controller' => 'reports','action' => 'all'));
   }
    
}

