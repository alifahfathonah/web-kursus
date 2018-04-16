<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="wow fadeInUp section-padding" id="galeri" data-wow-duration="500ms" data-wow-delay="900ms">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<p class="title"></p>
				<h2 class="heading">Galeri</h2>
				<div class="work-filter">
					<ul class="text-center">
						<li><a href="javascript:;" data-filter="all" class="filter">All</a></li>
						<li><a href="javascript:;" data-filter=".foto" class="filter">Foto</a></li>
						<li><a href="javascript:;" data-filter=".video" class="filter">video</a></li>
						<li><a href="javascript:;" data-filter=".ebook" class="filter">E-book</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>  
	<div class="container-fluid project-wrapper">
		<div class="zerogrid">
			<div class="wrap-container clearfix">
				<?php foreach ($galeri as $d_galeri) { ?>
				<div class="wrap-container">
					<div class="col-1-4 mix work-item <?php echo $d_galeri->tipe_galeri;?>">
						<div class="wrap-col">
							<div class="item-container"> 
								<a class="fancybox overlay text-center" data-fancybox-group="gallery" href="<?php echo base_url('assets/frontend/galeri/')?><?php echo $d_galeri->file_galeri; ?>">
									<div class="overlay-inner">
										<h4 class="base"><?php echo $d_galeri->nama_galeri;?></h4>
										<div class="line"></div>
										<p><?php echo $d_galeri->deskripsi_galeri;?></p>
									</div>
								</a>
								<img src="<?php echo base_url('assets/frontend/galeri/')?><?php echo $d_galeri->file_preview;?>" alt="work"/> 
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

