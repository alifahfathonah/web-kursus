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
					<h3 class="text-themecolor">Tentang Kami</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Web Content</a></li>
						<li class="breadcrumb-item active">Tentang Kami</li>
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
											<h4 class="card-title">Data Tentang Kami</h4>
											<h6 class="card-subtitle">List data tentang kami</h6>
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
															<th>Text Tentang Kami</th>
															<th>Text Visi</th>
															<th>Text Misi</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
													<?php 
														$no=1;
														if(isset($data_tentang_kami)){
															foreach($data_tentang_kami as $tentang_kami){ 
													?>
														<tr>
															<td><?php echo $no++; ?></td>
															<td><?php echo $tentang_kami->text_tentang_kami; ?></td>
															<td><?php echo $tentang_kami->text_visi; ?></td>
															<td><?php echo $tentang_kami->text_misi; ?></td>
															<td><a class="btn btn-success" data-toggle="modal" data-target="#tentangKamiModal<?php echo $tentang_kami->id_tentang_kami; ?>">Edit</td>
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
<!-- Start Modal Edit Tentang Kami -->
<!-- ============================================================== -->
<?php 
	if(isset($data_tentang_kami)){
		foreach($data_tentang_kami as $tentang_kami){ 
?>
<?php echo form_open_multipart('web_content/save_tentangkami'); ?> 
<div class="modal fade bs-example-modal-lg" id="tentangKamiModal<?php echo $tentang_kami->id_tentang_kami; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Edit Tentang Kami</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
						<input type="hidden" class="form-control" name="id_tentang_kami" value="<?php echo $tentang_kami->id_tentang_kami; ?>" required>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Text Tentang Kami</label>
						<textarea class="textarea_editor form-control" name="text_tentang_kami" required><?php echo $tentang_kami->text_tentang_kami; ?></textarea>
					</div>
					<hr>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Text Visi</label>
						<textarea class="textarea_editor1 form-control" name="text_visi" required><?php echo $tentang_kami->text_visi; ?></textarea>
					</div>
					<hr>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Text Misi</label>
						<textarea class="textarea_editor2 form-control" name="text_misi" required><?php echo $tentang_kami->text_misi; ?></textarea>
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
<!-- End Modal Edit Tentang Kami -->
<!-- ============================================================== -->
