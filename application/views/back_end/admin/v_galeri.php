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
					<h3 class="text-themecolor">Galeri Management</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Web Content</a></li>
						<li class="breadcrumb-item active">Galeri</li>
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
											<h4 class="card-title">Data Galeri</h4>
											<h6 class="card-subtitle">List data galeri</h6>
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
												<a class="btn btn-success" data-toggle="modal" data-target="#addGaleri">Add Galeri</a>
												<table id="tableData" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>No</th>
															<th>Tipe Galeri</th>
															<th>Nama Galeri</th>
															<th>Deskripsi Galeri</th>
															<th>Isactive</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
													<?php 
														$no=1;
														if(isset($data_galeri)){
															foreach($data_galeri as $galeri){ 
													?>
														<tr>
															<td><?php echo $no++; ?></td>
															<td><?php echo $galeri->tipe_galeri; ?></td>
															<td><?php echo $galeri->nama_galeri; ?></td>
															<td><?php echo $galeri->deskripsi_galeri; ?></td>
															<td align="center"><?php echo $galeri->isactive; ?></td>
															<td align="center"><a class="btn btn-success" data-toggle="modal" data-target="#galeriModal<?php echo $galeri->id_galeri; ?>">Edit</td>
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
<!-- Start Modal Edit Galeri -->
<!-- ============================================================== -->
<?php 
	if(isset($data_galeri)){
		foreach($data_galeri as $galeri){ 
?>
<?php echo form_open_multipart('web_content/save_galeri'); ?> 
<div class="modal fade bs-example-modal-lg" id="galeriModal<?php echo $galeri->id_galeri; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Edit Galeri</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
					<input type="hidden" class="form-control" name="id_galeri" value="<?php echo $galeri->id_galeri; ?>" required>
					<div class="form-group">
						<label for="message-text" class="control-label">Tipe Galeri</label>
						<select class="custom-select col-12" id="inlineFormCustomSelect" name="tipe_galeri" placeholder="Chose Tipe" required>       
							<option value="<?php echo $galeri->tipe_galeri; ?>"><?php echo $galeri->tipe_galeri; ?></option> 
                            <option value="foto">Foto</option>
							<option value="video">Video</option>
							<option value="ebook">Ebook</option>
                        </select> 
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Nama Galeri</label>
						<input type="text" class="form-control" name="nama_galeri" value="<?php echo $galeri->nama_galeri; ?>" required>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Deskripsi Galeri</label>
						<textarea class="textarea_editor form-control" name="deskripsi_galeri" required><?php echo $galeri->deskripsi_galeri; ?></textarea>
					</div>
					<fieldset class="form-group">
						<label>File Preview</label>
						<label class="custom-file d-block">
							<input type="hidden" class="form-control" name="file_preview_text" value="<?php echo $galeri->file_preview; ?>" required>
							<input type="file" accept="image/*" name="file_preview" onchange="ValidateSingleInputPriview(this);">
						</label>
					</fieldset>
					<fieldset class="form-group">
						<label>File galeri</label>
						<label class="custom-file d-block">
							<input type="hidden" class="form-control" name="file_galeri_text" value="<?php echo $galeri->file_galeri; ?>" required>
							<input type="file" accept="image/*,mp4,wmv,pdf" name="file_galeri" onchange="ValidateSingleInput(this);">
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
<!-- End Modal Edit Galeri -->
<!-- ============================================================== -->


<!-- ============================================================== -->
<!-- Start Modal Add Galeri -->
<!-- ============================================================== -->
<?php echo form_open_multipart('web_content/add_galeri'); ?> 
<div class="modal fade bs-example-modal-lg" id="addGaleri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Add Galeri</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
					<div class="form-group">
						<label for="message-text" class="control-label">Tipe Galeri</label>
						<select class="custom-select col-12" id="inlineFormCustomSelect" name="tipe_galeri" placeholder="Chose Tipe" required>       
							<option value="">Choose..</option>  
                            <option value="foto">Foto</option>
							<option value="video">Video</option>
							<option value="ebook">Ebook</option>
                        </select> 
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Nama Galeri</label>
						<input type="text" class="form-control" name="nama_galeri" required>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Deskripsi Galeri</label>
						<textarea class="textarea_editor form-control" name="deskripsi_galeri" required></textarea>
					</div>
					<fieldset class="form-group">
						<label>File Preview</label>
						<label class="custom-file d-block">
							<input type="file" accept="image/*" name="file_preview" onchange="ValidateSingleInputPriview(this);" required>
						</label>
					</fieldset>
					<fieldset class="form-group">
						<label>File galeri</label>
						<label class="custom-file d-block">
							<input type="file" accept="image/*,mp4,wmv,pdf" name="file_galeri" onchange="ValidateSingleInput(this);" required>
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
<!-- End Modal Add Galeri -->
<!-- ============================================================== -->

<script type="text/javascript">
var _validFileExtensionsPriview = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
function ValidateSingleInputPriview(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensionsPriview.length; j++) {
                var sCurExtension = _validFileExtensionsPriview[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Maaf, " + sFileName + " tipe file tersebut tidak diizinkan, tipe file yang diizinkan adalah : " + _validFileExtensionsPriview.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}
</script>


<script type="text/javascript">
var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png",".mp4",".wmv",".pdf"];    
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
