<?php 
//if($this->crud_model->getRole() < 2)
	redirect(base_url(), "refresh");
?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<h1 class="text-center">Configurações do painel</h1>
		<div class="col-lg-8 white-box cold-md-12">
			<form method="post" action="<?=base_url("main/update_site")?>">
				<div class="form-group">
					<label for="nomesite">Nome do site</label>
					<input required type="text" value="Sharkstream" name="nomesite" class="form-control" id="nomesite" placeholder="Digite o nome do site">
				</div>
				<div class="form-group">
					<label for="slogansite">Slogan</label>
					<input required type="text" name="slogansite" class="form-control" id="slogansite" placeholder="Digite o nome do site">
				</div>
				<div class="form-group">
					<label for="logosite">Logo</label>
					<small>Digite o URL da logo</small>
					<input required type="text" name="logosite" class="form-control" id="logosite" placeholder="Digite um url para uma imagem">
				</div>
				<div class="form-group">
					<label for="faviconsite">Icone</label>
					<small>Digite o URL da favicon</small>
					<input required type="text" name="faviconsite" class="form-control" id="faviconsite" placeholder="Digite um url para uma imagem">
				</div>
				<hr>
				<div class="text-center">
					<button type="submit" class="btn btn-info px-5 py-2 text-uppercase">SALVAR</button>
				</div>
			</form>
		</div>
	</div>
</div>