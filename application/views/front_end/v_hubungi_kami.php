<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="info-section" id="hubungikami">
	<?php foreach($hubungi_kami as $d_hubungi_kami) { ?>
	<div class="row">
		<div class="col-md-6 block text-center wow fadeInLeftBig" data-wow-duration="500ms" data-wow-delay="300ms">
			<div class="center">
				<p class="title">Lokasi</p>
				<p class="margen"><?php echo $d_hubungi_kami->alamat;?></p>
				<p><strong>Phone : </strong><?php echo $d_hubungi_kami->no_telepon;?></p>
				<p><strong>Whatsapp : </strong><a class="btn btn-success" href="https://api.whatsapp.com/send?phone=<?php echo $d_hubungi_kami->no_telepon;?>&text=Hallo">Tekan untuk chat</a>
				</p>
				<p><strong>Email : </strong><?php echo $d_hubungi_kami->email;?></p>
				<ul class="social-link">
					<li><a href="<?php echo $d_hubungi_kami->facebook;?>" class="text-center"><i class="fa fa-facebook"></i><span></span></a></li>
					<li><a href="<?php echo $d_hubungi_kami->twitter;?>" class="text-center"><i class="fa fa-twitter"></i><span></span></a></li>
					<li><a href="<?php echo $d_hubungi_kami->googleplus;?>" class="text-center"><i class="fa fa-google-plus"></i><span></span></a></li>
					<li><a href="<?php echo $d_hubungi_kami->linkedin;?>" class="text-center"><i class="fa fa-linkedin"></i><span></span></a></li>
				</ul>
			</div>
		</div>
		<div class="col-md-6 block light text-center wow fadeInRightBig" data-wow-duration="500ms" data-wow-delay="300ms">
			<div class="center">
			<?php echo $d_hubungi_kami->maps;?>
			</div>
		</div>
	</div>
	<?php } ?>
</section>
