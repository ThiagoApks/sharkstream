<?php 
switch ($page_title) {
	case 'Index':
	$titulo = "Início";
	break;
	default: 
	$titulo = $page_title;
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords"
	content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
	<meta name="description"
	content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
	<meta name="robots" content="noindex,nofollow">
	<title>Shark Stream - <?=$titulo?></title>
	<link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/favicon.png')?>">
	<!-- Custom CSS -->
	<link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@0ac23ca/css/all.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url('assets/plugins/bower_components/jquery/dist/jquery.min.js')?>"></script>
	<link href="<?=base_url('assets/plugins/bower_components/chartist/dist/chartist.min.css')?>" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?=base_url('assets/css/shark.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/style.min.css')?>" rel="stylesheet">
</head>
<body>
	<div class="preloader">
		<div class="lds-ripple">
			<div class="lds-pos"></div>
			<div class="lds-pos"></div>
		</div>
	</div>
	<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
	data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
	<?php include("templates/header.php") ?>
	<?php
	include("pages/$page_name.php")
	?>
	<?php
	include("templates/footer.php")
	?>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
</div>
</div>
<br>
<!--   Core JS Files   -->
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/app-style-switcher.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')?>"></script>
<!--Wave Effects -->
<script src="<?php echo base_url('assets/js/waves.js')?>"></script>
<!--Menu sidebar -->
<script src="<?php echo base_url('assets/js/sidebarmenu.js')?>"></script>
<!--Custom JavaScript -->
<script src="<?php echo base_url('assets/js/custom.js')?>"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<!--   Core JS Files   -->
</body>

</html>