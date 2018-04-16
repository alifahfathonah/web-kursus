<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="section-padding" id="tentangkami">
	<div class="container">
		<div class="row">
		<div class="col-md-12 text-center wow fadeIn" data-wow-duration="100ms" data-wow-delay="100ms">
		<h2 class="heading">Tentang Kami</h2>
			<?php foreach($tentang_kami as $d_tentang_kami) { ?>
			<!--tentang kami-->
			<div class="col-md-4 col-sm-4 canvas-box magin30 text-center wow fadeInDown" data-wow-duration="100ms" data-wow-delay="100ms">  
				<h4 class="color6">Tentang Red And White</h4>
				<p><?php echo $d_tentang_kami->text_tentang_kami; ?></p>
			</div>
			<!--visi-->
			<div class="col-md-4 col-sm-4 canvas-box magin30 text-center wow fadeInDown" data-wow-duration="100ms" data-wow-delay="100ms">  
				<h4 class="color1">Visi</h4>
				<p><?php echo $d_tentang_kami->text_visi; ?></p>
			</div>
			<!--misi-->
			<div class="col-md-4 col-sm-4 canvas-box magin30 text-center wow fadeInDown" data-wow-duration="100ms" data-wow-delay="100ms">  
				<h4 class="color1">Misi</h4>
				<p><?php echo $d_tentang_kami->text_misi; ?></p>
			</div>
			<?php } ?>
		</div>
	</div>
</section>

<!--Quotes-->
<div style="position:relative;" class="top-padding">
	<section id="bg-paralax">
		<div class="container">
			<div class="row">
			<?php foreach($quotes as $d_quotes) { ?>
			<div class="col-md-12 text-center">
				<h2 class="magin30"><?php echo $d_quotes->isi_quotes; ?></h2>
				<p><?php echo $d_quotes->penulis_quotes; ?></p>
			</div>
			<?php } ?>
			</div>
		</div>
	</section>
</div>

<!--Jumlah Angka-->
<section id="facts" class="top-padding"> 
	<div class="container-fluid">
		<div class="row number-counters"> 
			<!--program-->
			<div class="col-md-3 col-sm-3 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="300ms">
				<div class="counters-item blue row">
					<i class="icon-icons42"></i> 
					<h2><strong data-to="<?php echo $jumlah_program; ?>">0</strong></h2>
					<p>Program</p>
				</div>
			</div>
			<!--siswa-->
			<div class="col-md-3 col-sm-3 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
				<div class="counters-item dark_gray row"> 
					<i class="icon-users"></i>
					<h2><strong data-to="<?php echo $jumlah_siswa; ?>">0</strong></h2>
					<p>Siswa</p>
				</div>
			</div>
			<!--pengajar-->
			<div class="col-md-3 col-sm-3 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="900ms">
				<div class="counters-item dark_gray row"> 
					<i class="icon-users"></i>
					<h2><strong data-to="<?php echo $jumlah_pengajar; ?>">0</strong></h2>
					<p>Pengajar</p>
				</div>
			</div>
			<!--jam operasional-->
			<div class="col-md-3 col-sm-3 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1200ms">
				<div class="counters-item green row"> 
					<i class="icon-alarmclock"></i>
					<h2><strong data-to="8">0</strong></h2>
					<p>Jam Operasional</p>
				</div>
			</div>
		</div>
	</div>
</section>

