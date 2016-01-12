<br>
<?php
$username = $this->Session->read('Auth.User.name');
$departmant_head = $this->Session->read('Auth.User.boss');
$department_id = $this->Session->read('Auth.User.department_id');
$group_id = $this->Session->read('Auth.User.group_id');
$department_name = null;
switch ($department_id) {
	case '1':{
		$department_name ='IT';
        }
		break;
    case '2':{
        $department_name ='INDUSTRIA';
        }
        break;
    case '3':{
        $department_name ='DFI';
        }
        break;
    case '4':{
        $department_name ='DARH';
        }
        break;
	case '5':{
        $department_name ='DDN';
        } 
        break;
	default:{
		$department_name ='Forwarding Agent';
        $forwarding_Agent_Name = '';
        if ($group_id == 7) {
            $forwarding_Agent_Name ='Finacial Maneger';
        }elseif ($group_id == 8) {
           $forwarding_Agent_Name ='Treasurer';
        }elseif ($group_id == 9) {
            $forwarding_Agent_Name ='Administrations';
        }
    }
		break;
}
?>
<br>
<div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                <center>
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>Welcome Back </b>
                        <br>
                        <i class="fa fa-folder-open"></i><b>&nbsp;User logged in : </b><em><?php echo $username ?></em>
                    </div>
                </center>    
                </div>
                <!--end  Welcome -->
            </div>