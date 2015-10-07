<div class="content">
<a href="<?php echo base_url('ge/admin/addadmin');?>" class="add">ადმინისტრატორის დამატება</a>
<?php echo form_input(array("search"=>"search", "class"=>'search', "placeholder"=>'ID'))?>
<?php echo form_input(array("name"=>"searchname", "class"=>'searchname', "placeholder"=>'სახელი, გვარი'))?>
<table class="info" cellspacing='0' cellpadding='0'>
<tr>
<th>ID</th>
<th>სახელი გვარი</th>
<th>E-Mail</th>
<th>სტატუსი</th>
<th align="center">მართვა</th>
</tr>

<?php 		
	$this->db->from('users');
	$this->db->order_by('level', 'desc');
	$query = $this->db->get();
	
	
	
                                      		    foreach($query->result() as $data)
			                                      {
                                                $id = $data->id;
                                                $name = $data->name;
                                                $lastname = $data->lastname;
                                                $email = $data->email;
                                                $level = $data->level;
												?>
		<tr id="<?php echo($id);?>" class="<?php echo($name.' '.$lastname);?>">
		<td ><?php echo($id);?></td>
		<td ><?php echo($name.' '.$lastname);?></td>
		<td ><?php echo($email);?></td>
		<td ><?php if ($level==1) { echo 'ადმინისტრატორი'; } else { echo 'მომხმარებელი'; } ?></td>
			<td>
<a href="<?php echo base_url(); ?>ge/admin/editadmin/<?php echo($id);?>">რედაქტირება</a>
<a href="<?php echo base_url(); ?>ge/admin/userdelete/<?php echo($id);?>" onclick="return confirm('დარწმუნებული ხართ რომ გსურთ იუზერის წაშლა?')">წაშლა</a>
			</td>
		</tr>  <?php } ?>


</table>
</div>