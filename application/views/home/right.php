  <!-- BEGIN sidebar -->
  <div id="sidebar">
    <!-- begin sponsors -->
    <div class="box">
      <p class="sponsors"> <a href="#"><img src="<?php echo base_url('images/ad125x125.jpg');?>" alt="ADS" /></a> <a href="#"><img src="<?php echo base_url('images/ad125x125.jpg');?>" alt="ADS" /></a> </p>
      <ul class="bookmarks">        
        <li class="fcb"><a href="https://www.facebook.com/newsgicom" target="_BLANK"><?php echo lang('fbPage');?></a></li>
       </ul>
    </div>
    <!-- end sponsors -->
	<?php if($popNews){ ?>
    <!-- begin popular posts -->
    <div class="box">
      <h2><?php echo lang('popart');?></h2>
      <ul class="popular">
      <?php foreach($popNews as $info){
	  
	  		if($language == 'ge'){
					$satauri = $info->sataurige;
					$agwera = $info->agwerage;
				} else {
					$satauri = $info->sataurien;
					$agwera = $info->agweraen;
				}
					$id = $info->id;
					$seotitle = $info->seotitle;
					$category = $info->category;
					$slug = $info->slug;
					
		
		?><li> <a href="<?php echo base_url("$language/news/view/$category/$slug");?>" title="<?php echo $seotitle; ?>"><?php echo $satauri;?></a>      </li>
		
		<?php } ?>
      </ul>
    </div>
    <!-- end popular posts -->
    <?php } ?>
	<?php /* ?>
	<!-- begin flickr images -->
    <div class="box">
      <h2>დღის სურათი</h2>
      <div class="flickr"> <a href="#"><img src="images/_flickr.jpg" alt="" /></a> <a href="#"><img src="images/_flickr.jpg" alt="" /></a> <a href="#"><img src="images/_flickr.jpg" alt="" /></a> <a href="#"><img src="images/_flickr.jpg" alt="" /></a> <a href="#"><img src="images/_flickr.jpg" alt="" /></a> <a href="#"><img src="images/_flickr.jpg" alt="" /></a> </div>
    </div>
    <!-- end flickr images -->
    <!-- begin featured video -->
    <div class="box">
      <h2>დღის ვიდეო</h2>
      <div class="video"> <img src="images/_video.jpg" alt="" /> </div>
    </div>
   <?php */ ?>
  </div>
  <!-- END sidebar -->
</div>
<!-- END wrapper -->