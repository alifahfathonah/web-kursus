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
					<h3 class="text-themecolor">Hubungi Kami</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Web Content</a></li>
						<li class="breadcrumb-item active">Hubungi Kami</li>
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
											<h4 class="card-title">Data Hubungi Kami</h4>
											<h6 class="card-subtitle">List data hubungi kami</h6>
											<div class="table-responsive m-t-40">												
												<!-- NOTIF -->
												<?php
												$message_sukses = $this->session->flashdata('notif-sukses');
												if($message_sukses){
													echo '<p class="alert alert-success text-center">'.$message_sukses .'</p>';
												}
												$message_gagal = $this->session->flashdata('notif-gagal');
												if($message_gagal){
													echo '<p class="alert alert-danger text-center">'.$message_gagal .'</p>';
												}
												?>  
												<table id="tableData" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>No</th>
															<th>Alamat</th>
															<th>No Telepon</th>
															<th>Email</th>
															<th>Maps</th>
															<th>Facebook</th>
															<th>Twitter</th>
															<th>Google Plus</th>
															<th>Linkedin</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
													<?php 
														$no=1;
														if(isset($data_hubungi_kami)){
															foreach($data_hubungi_kami as $hubungi_kami){ 
													?>
														<tr>
															<td><?php echo $no++; ?></td>
															<td><?php echo $hubungi_kami->alamat; ?></td>
															<td><?php echo $hubungi_kami->no_telepon; ?></td>
															<td><?php echo $hubungi_kami->email; ?></td>
															<td><?php echo $hubungi_kami->maps; ?></td>
															<td><?php echo $hubungi_kami->facebook; ?></td>
															<td><?php echo $hubungi_kami->twitter; ?></td>
															<td><?php echo $hubungi_kami->googleplus; ?></td>
															<td><?php echo $hubungi_kami->linkedin; ?></td>
															<td><a class="btn btn-success" data-toggle="modal" data-target="#tentangKamiModal<?php echo $hubungi_kami->id_hubungi_kami; ?>">Edit</td>
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

<!-- ============================================================== -->
<!-- Start Modal Edit Hubungi Kami -->
<!-- ============================================================== -->
<?php 
	if(isset($data_hubungi_kami)){
		foreach($data_hubungi_kami as $hubungi_kami){ 
?>
<?php echo form_open_multipart('web_content/save_hubungikami'); ?> 
<div class="modal fade bs-example-modal-lg" id="tentangKamiModal<?php echo $hubungi_kami->id_hubungi_kami; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Edit Hubungi Kami</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
						<input type="hidden" class="form-control" name="id_hubungi_kami" value="<?php echo $hubungi_kami->id_hubungi_kami; ?>" required>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Alamat</label>
						<textarea class="textarea_editor form-control" name="alamat" required><?php echo $hubungi_kami->alamat; ?></textarea>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">No Telepon</label>
						<input type="text" class="form-control" name="no_telepon" value="<?php echo $hubungi_kami->no_telepon; ?>" required>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Email</label>
						<input type="email" class="form-control" name="email" value="<?php echo $hubungi_kami->email; ?>" required>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Maps</label>
						<textarea class="form-control" name="maps" required><?php echo $hubungi_kami->maps; ?></textarea>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Facebook</label>
						<input type="text" class="form-control" name="facebook" value="<?php echo $hubungi_kami->facebook; ?>" required>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Twitter</label>
						<input type="text" class="form-control" name="twitter" value="<?php echo $hubungi_kami->twitter; ?>" required>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Google Plus</label>
						<input type="text" class="form-control" name="googleplus" value="<?php echo $hubungi_kami->googleplus; ?>" required>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Linkedin</label>
						<input type="text" class="form-control" name="linkedin" value="<?php echo $hubungi_kami->linkedin; ?>" required>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
<?php } }?>
<!-- ============================================================== -->
<!-- End Modal Edit Hubungi Kami -->
<!-- ============================================================== -->
