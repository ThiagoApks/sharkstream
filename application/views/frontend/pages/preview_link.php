<?php 
if(!isset($_GET['id']))
	redirect(base_url(), "refresh");
$idlink = $_GET['id'];
$linkinfo = $this->crud_model->getLinkInfo($idlink);
?>
<div class="container-fluid">
	<div class="row text-center justify-content-center">
		<h5 class="text-muted">Visualizando</h5>
		<h1 class="text-dark"><?=$linkinfo->nome?> <a href="<?=base_url("edit_link?id=".$idlink)?>" class="btn btn-info"><i class="fa fa-edit"></i></a></h1>
		<div class="embed-responsive embed-responsive-16by9">
			<video id="preview" class="mx-auto embed-responsive-item video-js vjs-default-skin" autoplay controls preload="auto">
			<source src="<?=$linkinfo->link?>" type='application/x-mpegURL'>
			</video>
		</div>
		<script>
			var player = videojs('preview');
		</script>
	</div>
</div>