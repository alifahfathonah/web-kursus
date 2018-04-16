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
					<h3 class="text-themecolor">Program Management</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Web Content</a></li>
						<li class="breadcrumb-item active">Program</li>
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
											<h4 class="card-title">Data Program</h4>
											<h6 class="card-subtitle">List data Program</h6>
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
												<a class="btn btn-success" data-toggle="modal" data-target="#addprogramModal">Add Program</a>
												<table id="tableData" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>No</th>
															<th>Kode Program</th>
															<th>Nama Program</th>
															<th>Deskripsi</th>
															<th>Biaya</th>
															<th>Isactive</th>
														</tr>
													</thead>
													<tbody>
													<?php 
														$no=1;
														if(isset($data_program)){
															foreach($data_program as $program){ 
													?>
														<tr>
															<td><?php echo $no++; ?></td>
															<td align="center"><a class="btn" data-toggle="modal" data-target="#programModal<?php echo $program->id_program; ?>"><u><?php echo $program->kode_program; ?></u></a></td>
															<td><?php echo $program->nama_program; ?></td>
															<td><?php echo $program->deskripsi; ?></td>
															<td><?php $biaya=number_format($program->biaya,0,",","."); echo "Rp. ".$biaya; ?></td>
															<td align="center"><?php echo $program->isactive; ?></td>
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
<!-- Start Modal Edit Program -->
<!-- ============================================================== -->
<?php 
	if(isset($data_program)){
		foreach($data_program as $program){ 
?>
<?php echo form_open_multipart('web_content/save_program'); ?> 
<div class="modal fade bs-example-modal-lg" id="programModal<?php echo $program->id_program; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Edit Program</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
						<input type="hidden" class="form-control" name="id_program" value="<?php echo $program->id_program; ?>" required>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Nama Program</label>
						<input type="text" class="form-control" name="nama_program" value="<?php echo $program->nama_program; ?>" required>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Deskripsi</label>
						<textarea class="textarea_editor<?php echo $program->id_program;?> form-control" name="deskripsi" required><?php echo $program->deskripsi; ?></textarea>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Biaya</label>
						<input type="text" class="form-control" name="biaya" value="<?php echo $program->biaya; ?>" required>
					</div>
					<div class="form-group">
						<label for="message-text" class="control-label">Isactive</label>
						<select class="custom-select col-12" id="inlineFormCustomSelect" name="isactive" placeholder="Chose Status" required>       
							<option value="">Choose..</option>  
                            <option value="1">Active</option>
							<option value="0">Inactive</option>
                        </select> 
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
<!-- End Modal Edit Program -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- Start Modal Add Program -->
<!-- ============================================================== -->
<?php echo form_open_multipart('web_content/add_program'); ?> 
<div class="modal fade bs-example-modal-lg" id="addprogramModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Add Program</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="control-label">Nama Program</label>
						<input type="text" class="form-control" name="nama_program" required>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Deskripsi</label>
						<textarea class="textarea_editor form-control" name="deskripsi" required></textarea>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Biaya</label>
						<input type="text" class="form-control" name="biaya" required>
					</div>
					<div class="form-group">
						<label for="message-text" class="control-label">Isactive</label>
						<select class="custom-select col-12" id="inlineFormCustomSelect" name="isactive" placeholder="Chose Status" required>       
							<option value="">Choose..</option>  
                            <option value="1">Active</option>
							<option value="0">Inactive</option>
                        </select> 
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
<!-- ============================================================== -->
<!-- End Modal Add Program -->
<!-- ============================================================== -->

