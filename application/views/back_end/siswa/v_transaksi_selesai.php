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
				<div class="col-lg-8 col-md-7">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<h2 class="card-title">Transaksi Selesai</h2>
									<hr>
									<div class="d-flex flex-wrap">
										<div>
											<?php
											foreach($web_config as $config){ 
												
												require_once('payment-api/Veritrans.php');
												Veritrans_Config::$isProduction = false;
												Veritrans_Config::$serverKey = $config->server_key;



												if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {


												 try {
												  $notif = new Veritrans_Notification();
												} catch (Exception $e) {
												  echo "Exception: ".$e->getMessage()."\r\n";
												  echo "Notification received: ".file_get_contents("php://input");
												  exit();
												} 
												$transaction = $notif->transaction_status;
												$type = $notif->payment_type;
												$order_id = $notif->order_id;
												$fraud = $notif->fraud_status;
												if ($transaction == 'capture') {
												  // For credit card transaction, we need to check whether transaction is challenge by FDS or not
												  if ($type == 'credit_card'){
													if($fraud == 'challenge'){
													  // TODO set payment status in merchant's database to 'Challenge by FDS'
													  // TODO merchant should decide whether this transaction is authorized or not in MAP
													  echo "Transaction order_id: " . $order_id ." is challenged by FDS";
													  }
													  else {
													  // TODO set payment status in merchant's database to 'Success'
													  echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
													  }
													}
												  }
												else if ($transaction == 'settlement'){
												  // TODO set payment status in merchant's database to 'Settlement'
												  echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
												  }
												  else if($transaction == 'pending'){
												  // TODO set payment status in merchant's database to 'Pending'
												  echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
												  }
												  else if ($transaction == 'deny') {
												  // TODO set payment status in merchant's database to 'Denied'
												  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
												  }
												  else if ($transaction == 'expire') {
												  // TODO set payment status in merchant's database to 'expire'
												  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
												  }
												  else if ($transaction == 'cancel') {
												  // TODO set payment status in merchant's database to 'Denied'
												  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
												}


												} else {


													//
													// order_id=776981683&status_code=200&transaction_status=capture

													$order_id = $_GET['order_id'];
													$statusCode = $_GET['status_code'];
													$transaction  = $_GET['transaction_status'];


													if($transaction == 'capture') {
													  echo "<p>Transaksi berhasil.</p>";
													  echo "<p>Status transaksi untuk order id : " . $order_id;

													}
													// Deny
													else if($transaction == 'deny') {
													  echo "<p>Transaksi ditolak.</p>";
													  echo "<p>Status transaksi untuk order id .: " . $order_id;

													}
													// Challenge
													else if($transaction == 'challenge') {
													  echo "<p>Transaksi challenge.</p>";
													  echo "<p>Status transaksi untuk order id : " . $order_id;

													}
													// Error
													else {
													  echo "<p>Terjadi kesalahan pada data transaksi yang dikirim.</p>";
													  echo "<p>Status message: [$response->status_code] " . $transaction;
													}


												}
											}
											?>
										</div>
									</div>
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

