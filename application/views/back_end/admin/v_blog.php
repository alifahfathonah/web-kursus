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
					<h3 class="text-themecolor">Blog Management</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Web Content</a></li>
						<li class="breadcrumb-item active">Blog</li>
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
											<h4 class="card-title">Data Blog</h4>
											<h6 class="card-subtitle">List data Blog</h6>
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
												<a class="btn btn-success" data-toggle="modal" data-target="#addblogModal">Add Blog</a>
												<table id="tableData" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>No</th>
															<th>Judul Blog	</th>
															<th>Deskripsi Blog</th>
															<th>Alamat Blog</th>
															<th>Isactive</th>
														</tr>
													</thead>
													<tbody>
													<?php 
														$no=1;
														if(isset($data_blog)){
															foreach($data_blog as $blog){ 
													?>
														<tr>
															<td><?php echo $no++; ?></td>
															<td><a class="btn" data-toggle="modal" data-target="#blogModal<?php echo $blog->id_blog; ?>"><u><?php echo $blog->judul_blog; ?></u></a></td>
															<td><?php echo $blog->deskripsi_blog; ?></td>
															<td><?php echo $blog->alamat_blog; ?></td>
															<td align="center"><?php echo $blog->isactive; ?></td>
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
<!-- Start Modal Edit Blog -->
<!-- ============================================================== -->
<?php 
	if(isset($data_blog)){
		foreach($data_blog as $blog){ 
?>
<?php echo form_open_multipart('web_content/save_blog'); ?> 
<div class="modal fade bs-example-modal-lg" id="blogModal<?php echo $blog->id_blog; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Edit Blog</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
						<input type="hidden" class="form-control" name="id_blog" value="<?php echo $blog->id_blog; ?>" required>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Judul Blog</label>
						<input type="text" class="form-control" name="judul_blog" value="<?php echo $blog->judul_blog; ?>" required>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Deskripsi</label>
						<textarea class="textarea_editor<?php echo $blog->id_blog;?> form-control" name="deskripsi_blog" required><?php echo $blog->deskripsi_blog; ?></textarea>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Alamat Blog</label>
						<input type="url" class="form-control" name="alamat_blog" value="<?php echo $blog->alamat_blog; ?>" required>
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
<!-- End Modal Edit Blog -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- Start Modal Add Blog -->
<!-- ============================================================== -->
<?php echo form_open_multipart('web_content/add_blog'); ?> 
<div class="modal fade bs-example-modal-lg" id="addblogModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Add Blog</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="control-label">Judul Blog</label>
						<input type="text" class="form-control" name="judul_blog" required>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Deskripsi Blog</label>
						<textarea class="textarea_editor form-control" name="deskripsi_blog" required></textarea>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Alamat Blog</label>
						<input type="url" class="form-control" name="alamat_blog" required>
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
<!-- End Modal Add Blog -->
<!-- ============================================================== -->

