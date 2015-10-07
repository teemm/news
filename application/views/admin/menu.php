<script type="text/javascript" src="<?php echo base_url('css/admin/mainadmin.js');?>"></script>
<script>	var base_url='<?php echo base_url();?>';	</script>

<link href="<?php echo base_url();?>pictures/css/default.css" rel="stylesheet" type="text/css" />	
<link href="<?php echo base_url();?>pictures/scripts/jQuery-Impromptu/jquery-impromptu.css" rel="stylesheet" type="text/css" />	
<link href="<?php echo base_url();?>pictures/scripts/fineuploader/fineuploader.css" rel="stylesheet" type="text/css" />		
<link href="<?php echo base_url();?>pictures/scripts/Jcrop/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />		
		<script type="text/javascript" src="<?php echo base_url();?>pictures/scripts/jQuery-Impromptu/jquery-impromptu.js"></script>	
		<script type="text/javascript" src="<?php echo base_url();?>pictures/scripts/fineuploader/jquery.fineuploader-3.0.min.js"></script>	
		<script type="text/javascript" src="<?php echo base_url();?>pictures/scripts/Jcrop/jquery.Jcrop.min.js"></script>	
		<script type="text/javascript" src="<?php echo base_url();?>pictures/scripts/jquery-uberuploadcropper.js"></script>	
		
		
		<script type="text/javascript" src="<?php echo base_url('js/tinymce/tinymce.min.js');?>"></script>
		
		
		
		<div id="headerwrapper">
		<div id="header">
		<div class="logo"><a href="<?php echo base_url('ge/admin');?>"><img src="<?php echo base_url('css/admin/images/admin.png');?>"/></a></div>
		<div class="headmenu"><ul><li>სახელი: <?php echo ($this->session->userdata("name")); ?> <?php echo ($this->session->userdata("lastname")); ?></li>
		<li><a href="<?php echo base_url(); ?>" target="_blank">საიტის ნახვა</a></li>
		<li><a href="<?php echo base_url('ge/admin/admins'); ?>" >მომხმარებლები</a></li>
		<li><a href="<?php echo base_url('ge/admin/logout'); ?>">გასვლა</a></li></ul></div>
		</div></div>
		
<div id="menuwrapper" style="margin-top:20px;">
<div id="menu">

<div><a href="<?php echo base_url('ge/admin/news');?>"><img src="<?php echo base_url('css/admin/images/category.png');?>" />სიახლეები</a></div>

</div>
</div>
		 
</div>
</div>