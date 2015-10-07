<div class="content">
<a href="<?php echo base_url('ge/admin/addnews');?>" class="add">სიახლის დამატება</a>
<?php echo form_input(array("search"=>"search", "class"=>'search', "placeholder"=>'ID'))?>
<table class="info" cellspacing='0' cellpadding='0'>
<tr>
<th>ID</th>
<th>სათაური(GE)</th>
<th>სათაური(EN)</th>
<th>კატეგორია</th>
<th align="center">მართვა</th>
</tr>
<?php 		
	$this->db->from('news');
	$this->db->order_by('id', 'desc');
	$query = $this->db->get();
	
                                      		    foreach($query->result() as $data)
			                                      {
                                                $id = $data->id;
                                                $sataurige = $data->sataurige;
                                                $sataurien = $data->sataurien;
                                                $category = $data->category;
                                              				
	if($category == 1){ $category = 'პოლიტიკა'; }
	if($category == 2){ $category = 'საზოგადოება'; }
	if($category == 3){ $category = 'კრიმინალი'; }
	if($category == 4){ $category = 'სამხედრო'; }
	if($category == 5){ $category = 'სპორტი'; }
	if($category == 6){ $category = 'ეკონომიკა'; }
	if($category == 7){ $category = 'სოც.მედია'; }															
															
												?>
		<tr id="<?php echo($id);?>" >
		<td style="width:20px!important;"><?php echo($id);?></td>
		<td ><?php echo($sataurige);?></td>
		<td ><?php echo($sataurien);?></td>
		<td ><?php echo($category);?></td>
		<td>
<a href="<?php echo base_url(); ?>ge/admin/newsedit/<?php echo($id);?>" >რედაქტირება</a>
<a href="<?php echo base_url(); ?>ge/admin/newsdel/<?php echo($id);?>" onclick="return confirm('დარწმუნებული ხართ რომ გსურთ წაშლა?')">წაშლა</a>
			</td>
		</tr>  <?php } ?>


</table>
</div>