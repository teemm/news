<?php echo form_open(base_url('ge/admin/addadmin')) ?>
 
	  <div class="content">
 <table class="addtable" >
 
 <tr><td>
 სახელი  
 </td><td> <?php echo form_input(array("name"=>"name","value"=>set_value("name")))?></td><td><?php echo form_error("name") ?></td>
 </tr>
 <tr><td>
 გვარი
 </td><td> <?php echo form_input(array("name"=>"lastname","value"=>set_value("lastname")))?></td><td><?php echo form_error("lastname") ?></td>
 </tr>
<tr><td>
E-Mail  
 </td><td> <?php echo form_input(array("name"=>"email","value"=>set_value("email")))?> </td><td><?php echo form_error("email") ?></td>
 </tr>
 <tr><td>
 პაროლი  
 </td><td> <?php echo form_password(array("name"=>"password"))?></td><td><?php echo form_error("password") ?></td>
 </tr> <tr><td>
 გაიმეორეთ პაროლი  
 </td><td> <?php echo form_password(array("name"=>"pass_conf"))?></td><td><?php echo form_error("pass_conf") ?></td>
 </tr>
 
 <tr> <td colspan='3' align="center">
 <?php echo form_submit(array("name"=>"submit", "class"=>"addsubmit","value"=>"დამატება"))?>
 </td></tr>
 </table>
 
 
	  </div>
 
<?php echo form_close() ?>