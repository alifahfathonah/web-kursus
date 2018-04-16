<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('assets/backend/assets/plugins/jquery/jquery.min.js')?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url('assets/backend/assets/plugins/bootstrap/js/popper.min.js')?>"></script>
    <script src="<?php echo base_url('assets/backend/assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url('assets/backend/material/js/jquery.slimscroll.js')?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('assets/backend/material/js/waves.js')?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url('assets/backend/material/js/sidebarmenu.js')?>"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url('assets/backend/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')?>"></script>
    <script src="<?php echo base_url('assets/backend/assets/plugins/sparkline/jquery.sparkline.min.js')?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url('assets/backend/material/js/custom.min.js')?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="<?php echo base_url('assets/backend/assets/plugins/chartist-js/dist/chartist.min.js')?>"></script>
    <script src="<?php echo base_url('assets/backend/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')?>"></script>
    <!--c3 JavaScript -->
    <script src="<?php echo base_url('assets/backend/assets/plugins/d3/d3.min.js')?>"></script>
    <script src="<?php echo base_url('assets/backend/assets/plugins/c3-master/c3.min.js')?>"></script>
    <!-- Chart JS -->
    <script src="<?php echo base_url('assets/backend/material/js/dashboard6.js')?>"></script> 
    <!-- This is data table -->
    <script src="<?php echo base_url('assets/backend/assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
    <!-- wysuhtml5 Plugin JavaScript -->
    <script src="<?php echo base_url('assets/backend/assets/plugins/html5-editor/wysihtml5-0.3.0.js')?>"></script>
    <script src="<?php echo base_url('assets/backend/assets/plugins/html5-editor/bootstrap-wysihtml5.js')?>"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('assets/backend/assets/plugins/styleswitcher/jQuery.style.switcher.js')?>"></script>
 	<!--script export table-->

	<script>
	$('#tableData').DataTable({
		dom: 'Bfrtip',
		buttons: [
		    'copy', 'csv', 'excel', 'pdf', 'print'
		]
	});
	</script>
	<script>
	$(document).ready(function() {

		$('.textarea_editor').wysihtml5();
		<?php for ($no = 1; $no <= 100; $no++) {?>
		$('.textarea_editor<?php echo $no;?>').wysihtml5();
		<?php } ?>

	});
	</script>
	
</html>
