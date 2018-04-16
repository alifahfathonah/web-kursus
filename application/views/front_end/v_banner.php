<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section id="main">
  <div class="tp-banner-container">
    <div class="fullscreenbanner tp-banner">      
      <ul>	
		<!-- SLIDE  -->
		<?php foreach($banner as $d_banner) { ?>
        <li data-transition="fade" data-slotamount="6" data-delay="5000">
			<!-- MAIN IMAGE -->
			<img  src="<?php echo base_url('assets/frontend/images/banner/')?><?php echo $d_banner->file_banner;?>" alt="slidebg1" data-bgfit="cover" data-bgposition="top center">
			<div class="counters-item blue row">
			   <!-- TEXT -->
			   <h2 class="tp-caption fade tp-resizeme text-left"
			   data-x="left"
			   data-y="160" 
			   data-speed="200"
			   data-start="300"
			   data-easing="Power3.easeInOut"
			   data-elementdelay="0.05"
			   data-endelementdelay="0.1"
			   style="z-index: 9; background-color:rgba(255, 0, 0, 0.5); color:#ffffff;"><?php echo $d_banner->text_banner; ?>
			   </h2>
			</div>
        </li>
        <?php } ?>
        <!-- SLIDE  -->
      </ul>
    </div>
  </div>
</section>
