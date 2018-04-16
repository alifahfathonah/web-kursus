<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<section class="section-padding padding" id="blog">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<p class="title">Stay always updated with Red And White</p>
				<h2 class="heading">Our Blog</h2>
			</div>
		</div>
		<div class="row">
			<div id="publication-slider" class="owl-carousel">
				<?php foreach($blog as $d_blog) { ?>
				<div class="item"> 
					<h4><?php echo $d_blog->judul_blog; ?></h4> 
					<p><?php echo $d_blog->deskripsi_blog; ?></p>
					<a class="btn btn-success" href="<?php echo $d_blog->alamat_blog; ?>">Join Us!</a>  
				</div>
				<?php } ?>
			</div>	
		</div>
	</div>
</section>

