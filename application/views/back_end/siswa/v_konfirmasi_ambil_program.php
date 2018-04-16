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
					<h3 class="text-themecolor">Dashboard</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
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
				<div class="col-lg-12 col-md-7">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<?php 
										if(isset($data_transaksi)){
											foreach($data_transaksi as $transaksi){ 
									?>
										<div class="card-body">
												<h2 class="card-title">KonfirmasiAmbil Program</h2>
												<hr>
												<div class="form-group">
													<label for="recipient-name" class="control-label">Payment ID</label>
													<input type="text" class="form-control" name="payment_id" value="<?php echo $transaksi->payment_id; ?>" readonly required>
												</div>
												<div class="form-group">
													<label for="recipient-name" class="control-label">Kode Siswa</label>
													<input type="text" class="form-control" name="id_siswa" value="<?php echo $transaksi->id_siswa; ?>" readonly required>
												</div>
												<div class="form-group">
													<label for="recipient-name" class="control-label">Kode Program</label>
													<input type="text" class="form-control" name="id_program" value="<?php echo $transaksi->id_program; ?>" readonly required>
												</div>
												<div class="form-group">
													<label for="recipient-name" class="control-label">Payment Amount</label> 
													<?php $biaya=number_format($transaksi->payment_amount,0,",","."); ?>
													<input type="hidden" class="form-control" name="payment_amount" value="<?php echo $transaksi->payment_amount; ?>" readonly required>
													<input type="text" class="form-control" name="payment_amount_coma" value="<?php echo $biaya; ?>" readonly required>
												</div>
										</div>
										<div class="card-footer"> 
											<button id="pay-button" class="btn btn-primary">Submit</button>
										</div> 
									<?php }} else { echo "Data tidak ditemukan";  }?>
								</div>
							</div>
						</div>
					</div>
				</div>   
			<!-- ============================================================== -->
			<!-- Start Page Content -->
			<!-- ============================================================== -->
		</div>
		<!-- ============================================================== -->
		<!-- End Container fluid  -->
		<!-- ============================================================== -->
    </section>
</div>
</body>

<?php
foreach($web_config as $config){
	foreach($data_transaksi as $transaksi){
?>
<?php
require_once('payment-api/Veritrans.php');
//Set Your server key
Veritrans_Config::$serverKey = $config->server_key;
// Uncomment for production environment
// Veritrans_Config::$isProduction = true;
Veritrans_Config::$isSanitized = Veritrans_Config::$is3ds = true;

// Required
$transaction_details = array(
  'order_id' => $transaksi->payment_id,
  'gross_amount' => $transaksi->payment_amount, // no decimal allowed for creditcard
);

// Optional
$item1_details = array(
  'id' => $transaksi->id_program,
  'price' => $transaksi->payment_amount,
  'quantity' => 1,
  'name' => $transaksi->nama_program,
);

$item_details = array ($item1_details);

// Optional
$customer_details = array(
  'first_name'    => $transaksi->id_siswa,
  'last_name'    => $transaksi->nama_siswa,
  'email'    => "your@email.com",
  
);

// Optional, remove this to display all available payment methods
$enable_payments = array(
    'credit_card',
    'mandiri_clickpay',
    'cimb_clicks',
    'bca_klikbca',
    'bca_klikpay',
    'bri_epay',
    'telkomsel_cash',
    'echannel',
    'bbm_money',
    'xl_tunai',
    'indosat_dompetku',
    'mandiri_ecash',
    'permata_va',
    'bca_va',
    'other_va',
    'kioson',
    'Indomaret');

// Fill transaction details
$transaction = array(
  'enabled_payments' => $enable_payments,
  'transaction_details' => $transaction_details,
  'item_details' => $item_details,
  'customer_details' => $customer_details,
);

$snapToken = Veritrans_Snap::getSnapToken($transaction);
?>
<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo $config->client_key; ?>"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('<?=$snapToken?>');
      };
    </script>
<?php }  }?>
