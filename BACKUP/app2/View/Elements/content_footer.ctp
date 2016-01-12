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
                        <?php
                        if ($departmant_head == 1 AND $group_id == 6) { ?>
                        <b> As <?php echo $department_name ?></b> <em>Head Department</em>  
                       <?php  }elseif ($group_id == 9 || $group_id == 8 || $group_id == 7) {?>
                           <b> As <em><?php echo $forwarding_Agent_Name ?></em></b>  
                       <?php }?>
                    </div>
                </center>    
                </div>
                <!--end  Welcome -->
            </div>
</div>

    </div>
   </div>
  </div>
 </div>
</div>