<?php 
if($this->crud_model->getRole() < 2)
	redirect(base_url(), "refresh");
?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<h1 class="text-center">Criar nova lista</h1>
		<div class="col-lg-8 white-box cold-md-12">
			<form method="post" action="<?=base_url("main/add_lista")?>">
				<div class="form-group">
					<label for="nomelista">Nome</label>
					<input required type="text" name="nomelista" class="form-control" id="nomelista" placeholder="Digite o nome da lista">
				</div>
				<hr>
				<span class="text-muted">As categorias serão adicionadas depois...</span>
				<div class="text-center">
					<button type="submit" class="btn btn-info px-5 py-2 text-uppercase">ADICIONAR</button>
				</div>
			</form>
		</div>
	</div>
</div>