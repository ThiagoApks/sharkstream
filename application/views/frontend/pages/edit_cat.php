<?php 
if($this->crud_model->getRole() < 2)
	redirect(base_url(), "refresh");
if(!isset($_GET['id']))
	redirect(base_url(), "refresh");
$idcategoria = $_GET['id'];
$catinfo = $this->crud_model->getCatInfo($idcategoria);
?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<h1 class="text-center">Editar categoria</h1>
		<div class="col-lg-8 white-box cold-md-12">
			<form method="post" action="<?=base_url("main/update_cate")?>">
				<input hidden type="hidden" name="idcate" value="<?=$catinfo->id?>">
				<div class="form-group">
					<label for="nomecate">Nome</label>
					<input required type="text" value="<?=$catinfo->nomecategoria?>" name="nomecate" class="form-control" id="nomecate" placeholder="Digite o nome da categoria">
				</div>
				<hr>
				<div class="text-center">
					<a href="<?=base_url("main/delete_cate?id=".$catinfo->id)?>" class="btn btn-danger px-5 py-2 text-uppercase">DELETAR</a>
					<button type="submit" class="btn btn-info px-5 py-2 text-uppercase">SALVAR</button>
				</div>
			</form>
		</div>
	</div>
</div>