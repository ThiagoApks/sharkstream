<?php 
if($this->crud_model->Check_Inactive_LoginEx() && $page_name !== "login")
{
	redirect(base_url("login"), "refresh");
}

switch ($page_title) {
	case 'Index': $titulo = "Início"; break;
	case 'Preview_link': $titulo = "Visualizar link"; break;
	case 'New_link': $titulo = "Novo link"; break;
	case 'New_lista': $titulo = "Nova lista"; break;
	case 'Edit_link': $titulo = "Editar link"; break;
	case 'Edit_lista': $titulo = "Editar lista"; break;
	case 'Links': $titulo = "Lista de links"; break;
	case 'Listas': $titulo = "Listas"; break;
	case 'Gerar_link_user': $titulo = "Gerar links para os usuários"; break;
	case 'New_cat': $titulo = "Nova categoria"; break;
	case 'Edit_cat': $titulo = "Editar categoria"; break;
	case 'Edit_user': $titulo = "Editar usuario"; break;
	case 'New_user': $titulo = "Criar usuario"; break;
	default: $titulo = $page_title; break;
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
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
	<link href="//vjs.zencdn.net/7.10.2/video-js.min.css" rel="stylesheet">
    <script src="//vjs.zencdn.net/7.10.2/video.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css">
</head>
<?php if($this->crud_model->Check_Inactive_LoginEx()){ ?>
	<style type="text/css">
		body, html {
			height: 100%;
			margin: 0;
		}

		.bgimg-1, .bgimg-2, .bgimg-3 {
			position: relative;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;

		}
		.bgimg-1 {
			background-image: url("<?=base_url("assets/background.png")?>");
			height: 100%;
		}

		.caption {
			position: absolute;
			left: 0;
			bottom: 40%;
			width: 100%;
			text-align: center;
		}
	</style>
<?php } ?>
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