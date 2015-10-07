
<div id='login'>
<table cellspacing="0" cellpadding="0">
<tr>
<td><?php echo form_input(array("name"=>"email", "class"=>"logininput", "value"=>$this->session->flashdata("email")))?></td>
<td><?php echo form_error("email")?></td>
</tr>
<tr>
<td><?php echo form_password(array("name"=>"password", "class"=>"logininput passwd"))?></td>
<td><?php if( $this->session->flashdata("pw_error") ) { 

                                echo $this->session->flashdata("pw_error");

                        } else {

                                echo form_error("password");

                        }

                ?>
</td></tr>
<tr ><td colspan='3' align="center"><?php echo form_submit(array("name"=>"submit", "class"=>"loginsubmit", "value"=>"შესვლა"))?></tr></td>

</table>
</div>
