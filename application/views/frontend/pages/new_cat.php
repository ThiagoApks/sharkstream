<?php 
if($this->crud_model->getRole() < 2)
	redirect(base_url(), "refresh");
?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<h1 class="text-center">Criar nova categoria</h1>
		<div class="col-lg-8 white-box cold-md-12">
			<form method="post" action="<?=base_url("main/add_cate")?>">
				<div class="form-group">
					<label for="nomecate">Nome</label>
					<input required type="text" name="nomecate" class="form-control" id="nomecate" placeholder="Digite o nome da categoria">
				</div>
				<hr>
				<div class="text-center">
					<button type="submit" class="btn btn-info px-5 py-2 text-uppercase">ADICIONAR</button>
				</div>
			</form>
		</div>
	</div>
</div>