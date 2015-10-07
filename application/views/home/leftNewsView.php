  <div id="content">
    <!-- begin recent posts -->

    <div class="recent">
      <!-- begin post -->
      <div class="single">

	  <h2><?php echo $newsInfo[0];?></h2>
	  
	  	<?php if ($newsInfo[4]){
		$poster = explode(',', $newsInfo[4]);
	?>
	<img src="<?php echo base_url("pictures/$poster[0]");?>" alt="<?php echo $newsInfo[0]; ?>" class="floatIm" />
	<?php
	} ?>
        <p class="newsRight"><?php echo $newsInfo[1];?></p>

</div>


	<div class="tableThumbs">
	<?php 
	if($poster){
		$count = count($poster);
		
		for($i=1; $i<$count-1; $i++){
			$full = explode('.', $poster[$i]);
			$full = $full[0].'_FULLSIZE.'.$full[1];
			?>
			<a href="<?php echo base_url("pictures/$full");?>" class="fancybox" rel="group"><img src="<?php echo base_url("pictures/$poster[$i]");?>" class="thumbi" alt="<?php echo $newsInfo[3].' '.$i; ?>"/></a>
			<?php
		}
		
	}
	?>
	</div>









	 <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ka_GE/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-comments" data-href="<?php echo base_url("$language/news/view/$category/$newsInfo[5]");?>" data-width="625px" data-numposts="10" data-colorscheme="light"></div>
	 
      <!-- end post -->
    </div>
	
    <!-- end recent posts -->
  </div>
  <?php 
  $id = $newsInfo[2];
  $views = $newsInfo[9];
  $views = $views + 1;
  mysql_query("UPDATE news set view= '$views' where id = '$id'");  
  ?>