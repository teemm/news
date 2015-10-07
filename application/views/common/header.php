<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?php if (($this->uri->segment(2) == 'news') && ($this->uri->segment(3) == 'view')){
		$saxeliTitle = $newsInfo[3].' - '.$title; 
		$saxeliKeys = $newsInfo[6].', '.$keywords; 
		$saxeliDescr = $newsInfo[7].', '.$description; 
		if (mb_strlen($saxeliTitle) > 60) {
			$stringCut = mb_substr($saxeliTitle, 0, 60);
			$saxeliTitle = mb_substr($stringCut, 0, mb_strrpos($stringCut, ' ')); 
		}	

		if (mb_strlen($saxeliKeys) > 160) {
			$stringCut = mb_substr($saxeliTitle, 0, 160);
			$saxeliKeys = mb_substr($stringCut, 0, mb_strrpos($stringCut, ' ')); 
		}	
		
		if (mb_strlen($saxeliDescr) > 160) {
			$stringCut = mb_substr($saxeliDescr, 0, 160);
			$saxeliDescr = mb_substr($stringCut, 0, mb_strrpos($stringCut, ' ')); 
		}
		
		
		?>
			<title><?php echo $saxeliTitle; ?></title>
			<meta name="keywords" content="<?php echo $saxeliKeys; ?>"/>
			<meta name="description"  content="<?php echo $saxeliDescr;?>"/>
			<meta property="og:title" content="<?php echo $saxeliTitle;?>" />
			<meta property="og:description" content="<?php echo $saxeliDescr;?>" />
			<meta property="og:url" content="<?php echo base_url("$language/news/view/$newsInfo[8]/$newsInfo[5]");?>" />
	<?php	} else { ?>
	<title><?php echo $title; ?></title>	
	<meta name="keywords" content="<?php echo $keywords; ?>"/>
	<meta name="description"  content="<?php echo $description;?>"/>
	<?php } ?>
	 <link rel="shortcut icon" href="<?php echo base_url('images/favicon.ico');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css');?>" />
	
	
			<script type="text/javascript" src="<?php echo base_url('js/jquery.min.js');?>"></script>
			<script type="text/javascript" src="<?php echo base_url('js/main.js');?>"></script>		
		
		<script type="text/javascript" src="<?php echo base_url('js/jquery.mousewheel-3.0.6.pack.js');?>"></script>

<link rel="stylesheet" href="<?php echo base_url('css/jquery.fancybox.css?v=2.1.5');?>" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo base_url('js/jquery.fancybox.pack.js?v=2.1.5');?>"></script>


	
	<!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="<?php echo base_url('css/ie.css');?>" /><![endif]-->
</head>

<body>
<!-- BEGIN wrapper -->
<div id="wrapper">
  <!-- BEGIN header -->
  <div id="header">
    <!-- begin pages -->
     <ul class="pages">
      <li><a href="<?php echo base_url($language);?>"><?php echo lang('main');?></a></li>
      <li><a href="<?php echo base_url($language.'/pages/about');?>"><?php echo lang('aboutus');?></a></li>
      <li><a href="<?php echo base_url($language);?>"><?php echo lang('ads');?></a></li>
      <li><a href="<?php echo base_url($language.'/pages/contact');?>"><?php echo lang('contact');?></a></li>
    </ul>
	
		<ul class="language">
			<li><a href="<?php echo base_url('ge');?>"><img src="<?php echo base_url('images/geo.png');?>" alt="Geo"/></a></li>
			<li><a href="<?php echo base_url('en');?>"><img src="<?php echo base_url('images/eng.png');?>" alt="English"/></a></li>
		</ul>
	
    <!-- end pages -->
    <form method="post" action='#' >
      <input type="text" name="s" id="s" value="" />
      <button type="submit"><?php echo lang('dzieba');?></button>
    </form>
    <div class="break"></div>
    <!-- begin logo -->
    <div class="logo">
		<a href="<?php echo base_url($language);?>"><img src="<?php echo base_url("images/logo$language.png");?>" alt="newsgi"></a>
    </div>
    <!-- end logo -->
    <!-- begin sponsor -->
		<div class="sponsor"> <a href="#"><img src="<?php echo base_url('images/ad468x60.gif');?>" alt="" /></a> </div>
    <!-- end sponsor -->
    <!-- begin categories -->
    <ul class="categories">
      <li <?php if($category==1)echo "class='active'";?>><a href="<?php echo base_url($language.'/news/index/1');?>"><?php echo lang('politika');?></a></li>
      <li <?php if($category==2)echo "class='active'";?>><a href="<?php echo base_url($language.'/news/index/2');?>"><?php echo lang('sazogadoeba');?></a></li>
      <li <?php if($category==3)echo "class='active'";?>><a href="<?php echo base_url($language.'/news/index/3');?>"><?php echo lang('kriminali');?></a></li>
      <li <?php if($category==4)echo "class='active'";?>><a href="<?php echo base_url($language.'/news/index/4');?>"><?php echo lang('samxedro');?></a></li>
      <li <?php if($category==5)echo "class='active'";?>><a href="<?php echo base_url($language.'/news/index/5');?>"><?php echo lang('sporti');?></a></li>
      <li <?php if($category==6)echo "class='active'";?>><a href="<?php echo base_url($language.'/news/index/6');?>"><?php echo lang('ekonomika');?></a></li>
      <li <?php if($category==7)echo "class='active'";?>><a href="<?php echo base_url($language.'/news/index/7');?>"><?php echo lang('socmedia');?></a></li>
      <li <?php if($category==8)echo "class='active'";?>><a href="<?php echo base_url($language.'/news/index/8');?>"><?php echo lang('finance');?></a></li>
      <li <?php if($category==9)echo "class='active'";?>><a href="<?php echo base_url($language.'/news/index/9');?>"><?php echo lang('tech');?></a></li>
      <li <?php if($category==10)echo "class='active'";?>><a href="<?php echo base_url($language.'/news/index/10');?>"><?php echo lang('moda');?></a></li>
      <li <?php if($category==11)echo "class='active'";?>><a href="<?php echo base_url($language.'/news/index/11');?>"><?php echo lang('culture');?></a></li>
    </ul>
    <!-- end categories -->
  </div>  
  <!-- END header -->