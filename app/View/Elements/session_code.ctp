<?php
$user_id = $this->Session->read('Auth.User.id');
$username = $this->Session->read('Auth.User.name');
$departmant_head = $this->Session->read('Auth.User.boss');
$department_id = $this->Session->read('Auth.User.department_id');
$group_id = $this->Session->read('Auth.User.group_id');
$who = 'nobody';
switch ($group_id) {
  case '6':
    $who ='Head_Department'; 
    break;
  case '7':
    $who ='Finacial_Maneger'; 
    break;
  case '8':
    $who ='Treasurer'; 
    break;
  case '9':
    $who ='Process_Manager'; 
    break;
  default:
    # code...
    break;
}
?>