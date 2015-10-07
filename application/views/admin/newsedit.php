<script type="text/javascript">
			$(function() {
			
						
				$('.faili').click(function(){
				
				$(this).remove();
				$('#file').show();
				
				
				});
					
				$('#UploadImages').uberuploadcropper({
					//---------------------------------------------------
					// uploadify options..
					//---------------------------------------------------
					fineuploader: {
						//debug : true,
						request	: { 
							// params: {}
							endpoint: '<?php echo base_url();?>pictures/upload.php' 
						},						
						validation: {
							//sizeLimit	: 0,
							allowedExtensions: ['jpg','jpeg','png','gif']
						}
					},
					//---------------------------------------------------
					//now the cropper options..
					//---------------------------------------------------
					jcrop: {
					//	aspectRatio  : 150/150, 
						allowSelect  : true, //can reselect
						allowResize  : true,  //can resize selection
					//	setSelect    : [ 0, 0, 150, 150 ] //these are the dimensions of the crop box x1,y1,x2,y2
						//minSize      : [ 295, 166 ], //if you want to be able to resize, use these
						//maxSize      : [ 295, 166 ]
					},
					//---------------------------------------------------
					//now the uber options..
					//---------------------------------------------------
					folder           : '', // only used in uber, not passed to server
					cropAction       : '<?php echo base_url();?>pictures/crop.php', // server side request to crop image
					
					onComplete       : function(e,imgs,data){ 
						var $PhotoPrevs = $('#PhotoPrevs');
						
						for(var i=0,l=imgs.length; i<l; i++){
					
$PhotoPrevs.append('<div class="posters"><img src="<?php echo base_url();?>pictures/'+ imgs[i].filename +'?d='+ (new Date()).getTime() +'" /><input type="hidden" name="poster[]" value="'+ imgs[i].filename +'"/></div>');



	}


	
	}
			
				});
				
	});
		</script>  
		

<form method="post" action="<?php echo base_url();?>ge/admin/newsedit" >
		     <?php
			 if (!($this->uri->segment(4))) { $idi = $idim; } else {
$idi = $this->uri->segment(4);
}
$query = $this->db->get_where('news', array("id"=>$idi));
									foreach($query->result() as $data)

			                                      {
                                          $sataurige = $data->sataurige;
                                          $agwerage = $data->agwerage;
                                          $sataurien = $data->sataurien;
                                          $agweraen = $data->agweraen;
                                          $seoTitle = $data->seotitle;
                                          $seokeys = $data->seoKeys;
                                          $seoDescr = $data->seoDescr;
                                          $ena = $data->ena;
                                          $category = $data->category;
                                          $thumb = $data->poster;
	
	echo form_input(array("name"=>"id", "type"=>"hidden", "value"=>$idi));
?>


<div class="content">
<table class="addtable" >

 <tr><td>
 აირჩიეთ ენა  
 </td><td>
 <select name="languageChoose">
	 <option value="1" <?php if ($ena == '1')echo 'selected';?>>ქართული</option>
	 <option value="2" <?php if ($ena == '2')echo 'selected';?>>ინგლისური</option>
 </select>

 </td><td></td>
 </tr>
 <tr><td>
 აირჩიეთ კატეგორია  
 </td><td>
 <select name="newsCategory">
	 <option value="1" <?php if ($category == 1)echo "selected";?>>პოლიტიკა</option>
	 <option value="2" <?php if ($category == 2)echo "selected";?>>საზოგადოება</option>
	 <option value="3" <?php if ($category == 3)echo "selected";?>>კრიმინალი</option>
	 <option value="4" <?php if ($category == 4)echo "selected";?>>სამხედრო</option>
	 <option value="5" <?php if ($category == 5)echo "selected";?>>სპორტი</option>
	 <option value="6" <?php if ($category == 6)echo "selected";?>>ეკონომიკა</option>
	 <option value="7" <?php if ($category == 7)echo "selected";?>>სოც.მედია</option>
	 <option value="8" <?php if ($category == 8)echo "selected";?>>მეცნიერება</option>
	 <option value="9" <?php if ($category == 9)echo "selected";?>>ტექნიკა</option>
	 <option value="10" <?php if ($category == 10)echo "selected";?>>მოდა</option>
	 <option value="11" <?php if ($category == 11)echo "selected";?>>კულტურა</option>
 </select></td><td></td>
 </tr>
 
 <tr class="langge"><td>
 სათაური (GE)
 </td><td> <?php echo form_input(array("name"=>"sataurige","value"=>$sataurige))?></td><td><?php echo form_error("sataurige") ?></td>
 </tr>
 <tr class="langge"><td>
 აღწერა (GE)
 </td><td> <?php echo form_textarea(array("name"=>"agwerage","value"=>$agwerage))?></td><td><?php echo form_error("agwerage") ?></td>
 </tr> 
 
 <tr class="langen"><td>
 სათაური (EN)
 </td><td> <?php echo form_input(array("name"=>"sataurien","value"=>$sataurien))?></td><td><?php echo form_error("sataurien") ?></td>
 </tr>
 
 <tr class="langen"><td>
 აღწერა (EN)
 </td><td> <?php echo form_textarea(array("name"=>"agweraen","value"=>$agweraen))?></td><td><?php echo form_error("agweraen") ?></td>
 </tr>
 
  <tr><td>
 SEO TITLE
 </td><td>(განმარტება: 2-დან 60-მდე ასო, მაგალითი: საუკეთესო სიახლეები)<br><?php echo form_input(array("name"=>"seoTitle", "id"=>"$idi", "value"=>$seoTitle))?><span class="<?php if((strlen($seoTitle) > 2) && (strlen($seoTitle) < 61)) { echo 'green'; } else { echo "red"; } ?>" id="seoTlength"><?php echo strlen($seoTitle); ?></span> ასო</td><td><?php echo form_error("seoTitle") ?></td>
 </tr>
 
  <tr><td>
 SEO Keywords
 </td><td>(განმარტება: საძიებო სიტყვები გამოყავით მძიმით, 2-დან 100-მდე ასო, მაგალითი: keyword1, keyword2)<br><?php echo form_input(array("name"=>"seoKey","value"=>$seokeys))?><span class="<?php if((strlen($seokeys) > 2) && (strlen($seokeys) < 101)) { echo 'green'; } else { echo "red"; } ?>" id="seoKlength"><?php echo strlen($seokeys);?></span> ასო</td><td><?php echo form_error("seoKey") ?></td>
 </tr> 
 
  <tr><td>
 SEO Description
 </td><td>(განმარტება: 2-დან 140-მდე ასო, მაგალითი: მოკლე აღწერა სიახლის შესახებ)<br><?php echo form_input(array("name"=>"seoDescr","value"=>$seoDescr))?><span class="<?php if((strlen($seokeys) > 2) && (strlen($seokeys) < 141)) { echo 'green'; } else { echo "red"; } ?>" id="seoDlength"><?php echo strlen($seoDescr);?></span> ასო</td><td><?php echo form_error("seoDescr") ?></td>
 </tr>
 
<tr><td>
სურათი
 </td><td>	
 
 
 	<?php 
if ($thumb){
	$poster = explode(',', $thumb);
	for($i=0; $i<count($poster) -1; $i++){
 ?>
<div class="faili">
<img id="removepicture" src='<?php echo base_url('pictures/'.$poster[$i]) ?>' />
<input type="hidden" id="pictinput" name="poster[]" value="<?php echo $poster[$i];?>"/>
</div>
<?php }  } ?>
 
 
 
<div id="UploadImages" ></div>
<div id="PhotoPrevs" ></div>
 </td>
 </tr>
 
 <tr> <td colspan='3' align="center">
 <?php echo form_submit(array("name"=>"submit", "class"=>"addsubmit","value"=>"რედაქტირება"))?>
 </td></tr>
 </table>
			
</div>

 <?php } echo form_close() ?>
