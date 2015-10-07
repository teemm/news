
	
	<script type="text/javascript">
			$(function() {
					
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
						aspectRatio  : 150/150, 
						allowSelect  : true, //can reselect
						allowResize  : true,  //can resize selection
						setSelect    : [ 0, 0, 150, 150 ] //these are the dimensions of the crop box x1,y1,x2,y2
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
		
<form method="post" action="<?php echo base_url();?>ge/admin/addnews" >
		     
			 
<div class="content">
<table class="addtable" >

 <tr><td>
 აირჩიეთ ენა  
 </td><td>
 <select name="languageChoose">
	 <option value="1">ქართული</option>
	 <option value="2">ინგლისური</option>
 </select></td><td></td>
 </tr>
 <tr><td>
 აირჩიეთ კატეგორია  
 </td><td>
 <select name="newsCategory">
	 <option value="1">პოლიტიკა</option>
	 <option value="2">საზოგადოება</option>
	 <option value="3">კრიმინალი</option>
	 <option value="4">სამხედრო</option>
	 <option value="5">სპორტი</option>
	 <option value="6">ეკონომიკა</option>
	 <option value="7">სოც.მედია</option>
	 <option value="8">მეცნიერება</option>
	 <option value="9">ტექნიკა</option>
	 <option value="10">მოდა</option>
	 <option value="11">კულტურა</option>
 </select></td><td></td>
 </tr>
 
 <tr class="langge"><td>
 სათაური (GE)
 </td><td> <?php echo form_input(array("name"=>"sataurige","value"=>set_value("sataurige")))?></td><td><?php echo form_error("sataurige") ?></td>
 </tr>
 <tr class="langge"><td>
 აღწერა (GE)
 </td><td> <?php echo form_textarea(array("name"=>"agwerage","value"=>set_value("agwerage")))?></td><td><?php echo form_error("agwerage") ?></td>
 </tr> 
 
 <tr class="langen"><td>
 სათაური (EN)
 </td><td> <?php echo form_input(array("name"=>"sataurien","value"=>set_value("sataurien")))?></td><td><?php echo form_error("sataurien") ?></td>
 </tr>
 
 <tr class="langen"><td>
 აღწერა (EN)
 </td><td> <?php echo form_textarea(array("name"=>"agweraen","value"=>set_value("agweraen")))?></td><td><?php echo form_error("agweraen") ?></td>
 </tr>
 
  <tr><td>
 SEO TITLE
 </td><td>(განმარტება: 2-დან 60-მდე ასო, მაგალითი: საუკეთესო სიახლეები)<br><?php echo form_input(array("name"=>"seoTitle","value"=>set_value("seoTitle")))?><span class="red" id="seoTlength">0</span> ასო</td><td><?php echo form_error("seoTitle") ?></td>
 </tr>
 
  <tr><td>
 SEO Keywords
 </td><td>(განმარტება: საძიებო სიტყვები გამოყავით მძიმით, 2-დან 100-მდე ასო, მაგალითი: keyword1, keyword2)<br><?php echo form_input(array("name"=>"seoKey","value"=>set_value("seoKey")))?><span class="red" id="seoKlength">0</span> ასო</td><td><?php echo form_error("seoKey") ?></td>
 </tr> 
 
  <tr><td>
 SEO Description
 </td><td>(განმარტება: 2-დან 140-მდე ასო, მაგალითი: მოკლე აღწერა სიახლის შესახებ)<br><?php echo form_input(array("name"=>"seoDescr","value"=>set_value("seoDescr")))?><span class="red" id="seoDlength">0</span> ასო</td><td><?php echo form_error("seoDescr") ?></td>
 </tr>
 
  <tr><td>
სურათი
 </td><td>	
<div id="UploadImages" ></div>
<div id="PhotoPrevs" ></div>
 </td>
 </tr>
 
 <tr> <td colspan='3' align="center">
 <?php echo form_submit(array("name"=>"submit", "class"=>"addsubmit","value"=>"დამატება"))?>
 </td></tr>
 </table>
			
</div>
 <?php echo form_close() ?>
