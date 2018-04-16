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
									<div class="d-flex flex-wrap">
										<div>
											<div class="row pricing-plan">
												<?php 
													$no=1;
													if(isset($data_program)){
														foreach($data_program as $program){ 
												?>
												<div class="col-md-3 col-xs-12 col-sm-6 no-padding">
													<!--div class="pricing-box featured-plan">-->
													<div class="pricing-box b-l">
														<div class="pricing-body">
															<div class="pricing-header">
																<h4 class="text-center"><?php echo $program->nama_program; ?></h4>
																<h3 class="text-center"><span class="price-sign">Rp </span><?php $biaya=number_format($program->biaya,0,",","."); echo $biaya; ?></h3>
															</div>
															<div class="price-table-content">
																<div class="price-row"><?php echo $program->kode_program; ?></div>
																<div class="price-row"><?php echo $program->deskripsi; ?></div>
																<div class="price-row">
																	<a class="btn btn-success waves-effect waves-light m-t-20" href="<?php echo base_url(); ?>siswa/ambilprogram/<?php echo $program->kode_program; ?>">Daftar</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												<?php } }?>
											</div>
										</div>
									</div>
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
