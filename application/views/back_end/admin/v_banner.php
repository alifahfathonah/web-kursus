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
					<h3 class="text-themecolor">Banner Management</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Web Content</a></li>
						<li class="breadcrumb-item active">Banner</li>
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
											<h4 class="card-title">Data Banner</h4>
											<h6 class="card-subtitle">List data banner</h6>
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
												<a class="btn btn-success" data-toggle="modal" data-target="#addBanner">Add Banner</a>
												<table id="tableData" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>No</th>
															<th>Text Banner</th>
															<th>File Banner</th>
															<th>Isactive</th>
														</tr>
													</thead>
													<tbody>
													<?php 
														$no=1;
														if(isset($data_banner)){
															foreach($data_banner as $banner){ 
													?>
														<tr>
															<td><?php echo $no++; ?></td>
															<td><a class="btn" data-toggle="modal" data-target="#bannerModal<?php echo $banner->id_banner; ?>"><u><?php echo $banner->text_banner; ?></u></a></td>
															<td align="center">
																<?php if($banner->file_banner <>""){ ?>
																<img src="<?php echo base_url('assets/frontend/images/banner/');?><?php echo $banner->file_banner; ?>" width="150px;" height="100px;"/>
																<?php } ?>
															</td>
															<td align="center"><?php echo $banner->isactive; ?></td>
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
<!-- Start Modal Edit Banner -->
<!-- ============================================================== -->
<?php 
	if(isset($data_banner)){
		foreach($data_banner as $banner){ 
?>
<?php echo form_open_multipart('web_content/save_banner'); ?> 
<div class="modal fade bs-example-modal-lg" id="bannerModal<?php echo $banner->id_banner; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Edit Banner</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
						<input type="hidden" class="form-control" name="id_banner" value="<?php echo $banner->id_banner; ?>" required>
						<input type="hidden" class="form-control" name="file_banner_text" value="<?php echo $banner->file_banner; ?>" required>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Text Banner</label>
						<input type="text" class="form-control" name="text_banner" value="<?php echo $banner->text_banner; ?>" required>
					</div>
					<fieldset class="form-group">
						<label>File Banner</label>
						<?php if($banner->file_banner <>""){ ?>
						<label class="custom-file d-block">
							<img src="<?php echo base_url('assets/frontend/images/banner/');?><?php echo $banner->file_banner; ?>" width="75x;" height="50px;"/>
							<a href="<?php echo base_url()?>web_content/remove_banner/<?php echo $banner->id_banner; ?>"  onClick="javascript:return confirm('Are you sure to Delete?')">Remove file</a>
						</label><br>
						<?php } ?>
						<label class="custom-file d-block">
							<input type="file" accept="image/*" name="file_banner" onchange="ValidateSingleInput(this);" >
						</label>
					</fieldset>
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
<!-- End Modal Edit Banner -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- Start Modal Add Banner -->
<!-- ============================================================== -->
<?php echo form_open_multipart('web_content/add_banner'); ?> 
<div class="modal fade bs-example-modal-lg" id="addBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Add Banner</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="control-label">Text Banner</label>
						<input type="text" class="form-control" name="text_banner" required>
					</div>
					<fieldset class="form-group">
						<label>File Banner</label>
						<label class="custom-file d-block">
							<input type="file" accept="image/*" name="file_banner" onchange="ValidateSingleInput(this);" required>
						</label>
					</fieldset>
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
<!-- End Modal Add Banner -->
<!-- ============================================================== -->

<script type="text/javascript">
var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Maaf, " + sFileName + " tipe file tersebut tidak diizinkan, tipe file yang diizinkan adalah : " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}
</script>

<script type="text/javascript">
function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
}
</script>
