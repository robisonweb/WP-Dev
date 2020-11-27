<ul class="social-medias">
  
  <?php $available_social_networks = idg_wp_get_available_social_networks(); ?>
  
  <?php foreach ($available_social_networks as $slug => $social): ?>
	  
	  <?php if ($item = idg_wp_get_option('social_'.$slug.'_profile')): ?>
		  <li class="<?php echo $slug; ?>">
		    <a href="<?php echo $item; ?>" target="_blank"><?php echo $social['name']; ?></a>
		  </li>
	  <?php endif; ?>
	  
  <?php endforeach; ?>
  
</ul>