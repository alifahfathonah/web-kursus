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
					<h3 class="text-themecolor">Web Config</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Manage Web Config</a></li>
						<li class="breadcrumb-item active">Web Config</li>
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
					<div class="row">
						<div class="col-12"> 	
							<div class="col-md-12">
								<div class="card">
									<div class="card-body p-b-0">
										<h4 class="card-title">Data Web Config</h4>
										<h6 class="card-subtitle">List Web Config</h6>								
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
									<!-- Nav tabs -->
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#webconfig" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Web Config</span></a> </li>
										<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#emailconfig" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Email Config</span></a> </li>
									</ul>
									<!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active" id="webconfig" role="tabpanel">
											<!--Web Config-->
											<div class="table-responsive m-t-40">			
												<table id="tableData" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>No</th>
															<th>Nama Web</th>
															<th>File Logo</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
													<?php 
														$no=1;
														if(isset($data_web_config)){
															foreach($data_web_config as $web_config){ 
													?>
														<tr>
															<td><?php echo $no++; ?></td>
															<td><?php echo $web_config->nama_web; ?></td>
															<td>
																<?php if($web_config->file_logo <>""){ ?>
																<img src="<?php echo base_url('assets/frontend/images/');?><?php echo $web_config->file_logo; ?>" width="150px;" height="100px;"/>
																<?php } ?>
															</td> 
															<td><a class="btn btn-success" data-toggle="modal" data-target="#webconfigModal<?php echo $web_config->id_web_config; ?>">Edit</a></td>
														</tr>														
													  <?php }
														}
													  ?>
													</tbody>
												</table>
											</div>
										</div>
										<div class="tab-pane  p-20" id="emailconfig" role="tabpanel">
											<!--Email-->
											<div class="table-responsive m-t-40">			
												<table id="tableData" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>No</th>
															<th>Email</th>
															<th>Password</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
													<?php 
														$no=1;
														if(isset($data_email)){
															foreach($data_email as $email){ 
													?>
														<tr>
															<td><?php echo $no++; ?></td>
															<td><?php echo $email->email; ?></td>
															<td>*****************</td>
															<td><a class="btn btn-success" data-toggle="modal" data-target="#emailModal<?php echo $email->id_config_email; ?>">Edit</a></td>
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
<!-- Start Modal Edit Web Config -->
<!-- ============================================================== -->
<?php 
	if(isset($data_web_config)){
		foreach($data_web_config as $web_config){ 
?>
<?php echo form_open_multipart('web_config/save_web_config'); ?> 
<div class="modal fade bs-example-modal-lg" id="webconfigModal<?php echo $web_config->id_web_config; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Edit Web Config</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
						<input type="hidden" class="form-control" name="id_web_config" value="<?php echo $web_config->id_web_config; ?>" required>
						<input type="hidden" class="form-control" name="file_logo_text" value="<?php echo $web_config->file_logo; ?>" required>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Nama Web</label>
						<input type="text" class="form-control" name="nama_web" value="<?php echo $web_config->nama_web; ?>" required>
					</div>
					<fieldset class="form-group">
						<label>File Logo</label>
						<?php if($web_config->file_logo <>""){ ?>
						<label class="custom-file d-block">
							<img src="<?php echo base_url('assets/frontend/images/');?><?php echo $web_config->file_logo; ?>" width="75x;" height="50px;"/>
							<a href="<?php echo base_url()?>web_config/remove_logo/<?php echo $web_config->id_web_config; ?>"  onClick="javascript:return confirm('Are you sure to Delete?')">Remove file</a>
						</label><br>
						<?php } ?>
						<label class="custom-file d-block">
							<input type="file" accept="image/*" name="file_logo" onchange="ValidateSingleInput(this);" >
						</label>
					</fieldset>
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
<!-- End Modal Edit Web Config -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- Start Modal Edit Email Config -->
<!-- ============================================================== -->
<?php 
	if(isset($data_email)){
		foreach($data_email as $email){ 
?>
<?php echo form_open_multipart('web_config/save_email'); ?> 
<div class="modal fade bs-example-modal-lg" id="emailModal<?php echo $email->id_config_email; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Edit Email Config</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
						<input type="hidden" class="form-control" name="id_config_email" value="<?php echo $email->id_config_email; ?>" required>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Email</label>
						<input type="email" class="form-control" name="email" value="<?php echo $email->email; ?>" required>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Password</label>
						<input type="text" class="form-control" name="password" value="<?php echo $email->password; ?>" required>
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
<!-- End Modal Edit Email Config -->
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
