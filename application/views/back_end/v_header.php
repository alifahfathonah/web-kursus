<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
	<?php foreach($web_config as $d_web_config) { ?>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/frontend/images/')?><?php echo $d_web_config->file_logo; ?>">
    <title>	
			<?php echo $d_web_config->nama_web; ?>
	</title>
	<?php } ?>	
    <!-- Bootstrap Core CSS --> 
    <link href="<?php echo base_url('assets/backend/assets/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/assets/plugins/html5-editor/bootstrap-wysihtml5.css')?>" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/backend/material/css/style.css')?>" rel="stylesheet">   
    <!-- chartist CSS -->
    <link href="<?php echo base_url('assets/backend/assets/plugins/chartist-js/dist/chartist.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/backend/assets/plugins/chartist-js/dist/chartist-init.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/backend/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')?>" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="<?php echo base_url('assets/backend/assets/plugins/c3-master/c3.min.css')?>" rel="stylesheet">  
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url('assets/backend/material/css/colors/blue.css')?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

