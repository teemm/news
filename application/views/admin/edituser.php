<?php echo form_open(base_url('ge/admin/editadmin'));
if (!($this->uri->segment(4))) { $idi = $idim; } else {
$idi = $this->uri->segment(4);
}

$query = $this->db->get_where('users', array("id"=>$idi));
									foreach($query->result() as $data)

			                                      {
                                          $saxeli = $data->name;
                                          $gvari = $data->lastname;
                                          $meili = $data->email;
?>
 
	  <div class="content">
 <table class="addtable" >
 
 <tr><td>
 სახელი  
 </td><td> <?php echo form_input(array("name"=>"name","value"=>$saxeli))?> <?php echo form_input(array("name"=>"id", "type"=>"hidden", "value"=>$idi))?></td><td><?php echo form_error("name") ?></td>
 </tr>
 <tr><td>
 გვარი
 </td><td> <?php echo form_input(array("name"=>"lastname","value"=>$gvari))?></td><td><?php echo form_error("lastname") ?></td>
 </tr>
<tr><td>
E-Mail  
 </td><td> <?php echo form_input(array("name"=>"email","value"=>$meili))?> </td><td><?php echo form_error("email") ?></td>
 </tr>
 <tr><td>
 პაროლი  
 </td><td> <?php echo form_password(array("name"=>"password"))?></td><td><?php echo form_error("password") ?></td>
 </tr>
 
 <tr> <td colspan='3' align="center">
 <?php echo form_submit(array("name"=>"submit", "class"=>"addsubmit","value"=>"რედაქტირება"))?>
 </td></tr>
 </table>
 
 
	  </div>
 
<?php 

}

echo form_close();
?>