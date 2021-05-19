<?php 
if($this->crud_model->getRole() < 1)
	redirect(base_url(), "refresh");
?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<h1 class="text-center">Criar usuario</h1>
		<div class="col-lg-8 white-box cold-md-12">
			<form method="post" action="<?=base_url("main/add_usuario")?>">
				<div class="form-group">
					<label for="nameuser">Nome</label>
					<input required type="text" name="nameuser" class="form-control" id="nameuser" placeholder="Digite o nome do cliente">
				</div>
				<div class="form-group">
					<label for="emailuser">Email</label>
					<input required type="text" name="emailuser" class="form-control" id="emailuser" placeholder="Digite o email do cliente">
				</div>
				<div class="form-group">
					<label for="senhauser">Senha</label>
					<input required type="text" name="senhauser" class="form-control" id="senhauser" placeholder="Digite a senha do cliente">
				</div>
				<?php if($this->crud_model->getRole() == 2) { ?>
					<div class="form-group">
						<label for="cargo">Cargo</label>
						<select required name="cargo" class="form-control" id="cargo">
							<option value="0">Cliente</option>
							<option value="1">Revendedor</option>
							<option value="2">Administrador</option>
						</select>
					</div>
				<?php } else { ?>
					<div class="form-group">
						<label for="cargo">Cargo</label>
						<select value="0" disabled required name="cargo" class="form-control" id="cargo">
							<option value="0">Cliente</option>
						</select>
					</div>
				<?php } ?>
				<hr>
				<div class="text-center">
					<button type="submit" class="btn btn-info px-5 py-2 text-uppercase">SALVAR</button>
				</div>
			</form>
		</div>
	</div>
</div>