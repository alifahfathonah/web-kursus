<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="we-do bg-grey padding" id="program">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center wow fadeIn"> 
				<p class="title">PROGRRAM</p>
				<h2 class="heading">OUR PROGRAM</h2>
			</div>
			<?php foreach($program as $d_program){?>
			<div class="col-md-4 wow fadeInUp" data-wow-duration="100ms" data-wow-delay="200ms"> 
				<div class="do-wrap text-center"> 
					<div class="dark_gray top"></div> 
					<span class="dark_gray"> <i class="icon-icons42"></i></span>
					<h4><?php echo $d_program->nama_program;?></h4>
					<p><?php echo $d_program->deskripsi;?></p>
					<a href="#" class="readmore">&nbsp;</a>
				</div>
				<div>&nbsp;</div>
			</div>
			<?php } ?>
		</div>
	</div>
</section>
