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
					<h3 class="text-themecolor">List Transaksi</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">List Transaksi</a></li>
						<li class="breadcrumb-item active">Transaksi</li>
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
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-12"> 
									<div class="card">
										<div class="card-body"> 
											<h4 class="card-title">Data Transaksi</h4>
											<h6 class="card-subtitle">List data transaksi</h6>
											<div class="table-responsive m-t-40">	
												<table id="tableData" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>No</th>
															<th>Payment ID</th>
															<th>Payment Amount</th>
															<th>Nama Siswa</th>
															<th>Nama Program</th>
															<th>Tanggal Transaksi</th>
															<th>Status Transaksi</th>
														</tr>
													</thead>
													<tbody>
													<?php 
														$no=1;
														if(isset($data_transaksi)){
															foreach($data_transaksi as $transaksi){ 
													?>
														<tr>
															<td><?php echo $no++; ?></td>
															<td><?php echo $transaksi->payment_id; ?></td>
															<td><?php $payment_amount=number_format($transaksi->payment_amount,0,",","."); echo "Rp. ".$payment_amount; ?></td>
															<td><?php echo $transaksi->nama_siswa; ?></td>
															<td><?php echo $transaksi->nama_program; ?></td>
															<td><?php echo $transaksi->tanggal_transaksi; ?></td>
															<td><?php echo $transaksi->status_transaksi; ?></td>
														</tr>														
													  <?php }
														}
													  ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>   
			<!-- ============================================================== -->
			<!-- End Page Content -->
			<!-- ============================================================== -->
		</div>
		<!-- ============================================================== -->
		<!-- End Container fluid  -->
		<!-- ============================================================== -->
    </section>
</div>
</body>

