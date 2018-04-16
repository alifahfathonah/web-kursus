<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
<div class="page-wrapper">
    <section id="wrapper">    
		<!-- ============================================================== -->
		<!-- Container fluid  -->
		<!-- ============================================================== -->
		<div class="container-fluid">
			<!-- ============================================================== -->
			<!-- Bread crumb and right sidebar toggle -->
			<!-- ============================================================== -->
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor">Dashboard</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			</div>
			<!-- ============================================================== -->
			<!-- End Bread crumb and right sidebar toggle -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Start Page Content -->
			<!-- ============================================================== -->
			<!-- Row -->
			<div class="row">
				<!-- Column -->
				<div class="col-lg-12 col-md-7">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<?php 
										if(isset($data_program)){
											foreach($data_program as $program){ 
												if(isset($data_siswa)){
													foreach($data_siswa as $siswa){ 
									?>
									<?php echo form_open_multipart('siswa/save_transaction'); ?> 
										<div class="card-body">
												<h2 class="card-title">Ambil Program</h2>
												<hr>
												<div class="form-group">
													<label for="recipient-name" class="control-label">Nama Siswa</label>
													<input type="text" class="form-control" name="nama_siswa" value="<?php echo $siswa->nama; ?>" readonly required>
													<input type="hidden" class="form-control" name="id_siswa" value="<?php echo $siswa->kode_siswa; ?>" readonly required>
												</div>
												<div class="form-group">
													<label for="recipient-name" class="control-label">Nama Program</label>
													<input type="hidden" class="form-control" name="id_program" value="<?php echo $program->kode_program; ?>" readonly required>
													<input type="text" class="form-control" name="nama_program" value="<?php echo $program->nama_program; ?>" readonly required>
												</div>
												<div class="form-group">
													<label for="recipient-name" class="control-label">Biaya</label> 
													<?php $biaya=number_format($program->biaya,0,",","."); ?>
													<input type="hidden" class="form-control" name="payment_amount" value="<?php echo $program->biaya; ?>" readonly required>
													<input type="text" class="form-control" name="payment_amount_coma" value="<?php echo $biaya; ?>" readonly required>
												</div>
										</div>
										<div class="card-footer">
											<a href="<?php echo base_url('siswa')?>" class="btn btn-warning">Batal</a>
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									<?php echo form_close(); ?>
									<?php } } } }?>
								</div>
							</div>
						</div>
					</div>
				</div>   
			<!-- ============================================================== -->
			<!-- Start Page Content -->
			<!-- ============================================================== -->
		</div>
		<!-- ============================================================== -->
		<!-- End Container fluid  -->
		<!-- ============================================================== -->
    </section>
</div>
</body>

