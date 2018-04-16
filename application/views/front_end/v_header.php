<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<title>
<?php foreach($web_config as $d_web_config) { ?>
		<?php echo $d_web_config->nama_web; ?>
<?php } ?>
</title>  
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/bootstrap.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/font-awesome.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/icomoon-fonts.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/animate.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/settings.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/owl.carousel.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/jquery.fancybox.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/zerogrid.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/jPushMenu.css')?>">
		<link href='https://fonts.googleapis.com/css?family=Raleway:100,200,300,400%7COpen+Sans:400,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/onepage.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/one-color.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/loader.css')?>">
<?php foreach($web_config as $d_web_config) { ?>
		<link rel="shortcut icon" href="<?php echo base_url('assets/frontend/images/')?><?php echo $d_web_config->file_logo;?>"> 
<?php } ?>
</head>

<body id="page-top" data-spy="scroll" data-target="#fixed-collapse-navbar" data-offset="120">

<div class="loader">
<div class="spinner">
  <div class="dot1"></div>
  <div class="dot2"></div>
</div>
</div>

<!-- Top-Menu-Navigation -->
<header id="main-navigation">
	
<!--notifikasi pendaftaran-->
<?php $message = $this->session->flashdata('notif-gagal-daftar'); if($message){?>
<div class="alert alert-danger text-center"><h3><?php echo $message; ?></h3>
			<?php echo validation_errors(); ?></div>
<?php } ?>
<?php $message = $this->session->flashdata('notif-sukses-daftar'); if($message){?>
<div class="alert alert-success text-center"><h3><?php echo $message; ?></h3></div>
<?php } ?>
<!--notifikasi pendaftaran-->

  <div id="navigation" data-spy="affix" data-offset-top="20">
    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-default">
          <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#fixed-collapse-navbar" aria-expanded="true"> 
            <span class="icon-bar top-bar"></span> <span class="icon-bar middle-bar"></span> <span class="icon-bar bottom-bar"></span> 
            </button>
<?php foreach($web_config as $d_web_config) { ?>
           <a class="navbar-brand" href="home"><img src="<?php echo base_url('assets/frontend/images/')?><?php echo $d_web_config->file_logo;?>" alt="logo" class="img-responsive"></a>
<?php } ?>
         </div>
            <div id="fixed-collapse-navbar" class="navbar-collapse collapse navbar-right">
              <ul class="nav navbar-nav">
                <li class="hidden">
                   <a class="page-scroll" href="#page-top"></a>
                </li>
                <li class="active">
					<a class="page-scroll" href="#main">Home</a>
                </li>
                <li>
                    <a class="page-scroll" href="#tentangkami">Tentang Kami</a>
                </li>
                 <li>
                    <a class="page-scroll" href="#program">Program</a>
                </li>  
                <li>
					<a class="page-scroll" href="#blog">Blog</a>
                </li>
                <li>
					<a class="page-scroll" href="#galeri">Galeri</a>
                </li>  
                <li>
					<a class="page-scroll" href="#hubungikami">Hubungi Kami</a>
                </li>
                <li>
					<a class="page-scroll" href="#daftar">Daftar</a>
                </li>
                <?php
                if($this->session->userdata('login_status') == TRUE) { ?> 
                <li>
					<a class="page-scroll" href="dashboard">Dashboard</a>
                </li>
                <?php } else { ?>
                <li>
					<a class="page-scroll" href="login">Masuk</a>
                </li>
                <?php } ?>
              </ul>
            </div>
         </nav>
       </div>
       </div>
     </div>
  </div>
</header>
<!-- Top-Menu-Navigation -->
