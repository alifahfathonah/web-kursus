<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="section-padding padding" id="daftar">
	<section id="slogan" class="wow fadeIn" data-wow-duration="500ms" data-wow-delay="300ms"> 
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p class="pull-left">Bergabung bersama kami.</p>
					<a data-toggle="modal" data-target="#form-pendaftaran" class="pull-right bounce-top">Daftar</a> 
				</div>
			</div>
		</div> 
	</section>
</section>

<!--modal pendaftaran-->
<div id="form-pendaftaran" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 class="modal-title">Form Pendaftaran</h5>
			</div> 
			<?php echo form_open_multipart('front_end/simpanpendaftaran'); ?>
			<div class="modal-body"> 
					<div class="form-group">
						<label class="control-label mb-10">Nama:</label>
						<input type="text" class="form-control" name="nama"  value="<?php echo set_value('nama'); ?>" required>
					</div>
					<div class="form-group">
						<label class="control-label mb-10">Jenis Kelamin:</label>
						<select class="form-control selectpicker" data-style="form-control btn-default btn-outline" name="jenis_kelamin" required>
							<option value="">Pilih jenis kelamin</option>
							<option value="L">Laki-Laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label mb-10">Nomor Telepon:</label>
						<input type="text" class="form-control" name="no_telepon" maxlength="13" required>
					</div>
					<div class="form-group">
						<label class="control-label mb-10">Tanggal Lahir:</label>
						<input type="date" class="form-control datepicker" name="tanggal_lahir" required>
					</div>
					<div class="form-group">
						<label class="control-label mb-10">Email:</label>
						<input type="email" class="form-control" name="email" maxlength="50" required>
					</div>
					<div class="form-group">
						<label class="control-label mb-10">Alamat:</label>
						<textarea class="form-control" name="alamat" required></textarea>
					</div>
					<div class="form-group">
						<label class="control-label mb-10">Username:</label>
						<input type="text" class="form-control" name="username" maxlength="20" required>
					</div>
					<div class="form-group">
						<label class="control-label mb-10">Password:</label>
						<input type="password" class="form-control" name="password" required>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-danger">Save changes</button>
			</div>
			<?php echo form_close(); ?> 
		</div>
	</div>
</div>
<!--modal pendaftaran-->
