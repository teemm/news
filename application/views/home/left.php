  <!-- BEGIN content -->
  <div id="content">
    <!-- begin recent posts -->
    <div class="recent">

	<?php if($news){
	
		foreach($news as $info){
				if($language == 'ge'){
					$satauri = $info->sataurige;
					$agwera = $info->agwerage;
				} else {
					$satauri = $info->sataurien;
					$agwera = $info->agweraen;
				}
					$id = $info->id;
					$seotitle = $info->seotitle;
					$poster = $info->poster;
					$category = $info->category;
					$slug = $info->slug;
					
		if (mb_strlen($agwera) > 260) {
			$agwera = strip_tags($agwera);
			$stringCut = mb_substr($agwera, 0, 260);
			$agwera = mb_substr($stringCut, 0, mb_strrpos($stringCut, ' ')); 
		}
				
		?>
      <!-- begin post -->
      <div class="e post">
		<?php if ($poster){
			$poster = explode(',', $poster);
			$poster = $poster[0];
		?><a href="<?php echo base_url("$language/news/view/$category/$slug");?>"><img src="<?php echo base_url("pictures/$poster");?>" alt="<?php echo $seotitle;?>" /></a>
		<?php } ?>
        <h1><?php echo $satauri;?></h1>
        <p><?php echo $agwera;?></p>       
 <p class="readmore">[ <a href="<?php echo base_url("$language/news/view/$category/$slug");?>"><?php echo lang('srulad');?></a> ]</p>
        <div class="break"></div>
      </div>
      <!-- end post -->
		<?php }
		
		}
		
		?>
		
		<ul class='page'><?php echo $links;?></ul>
    </div>
    <!-- end recent posts -->
  </div>
  <!-- END content -->  