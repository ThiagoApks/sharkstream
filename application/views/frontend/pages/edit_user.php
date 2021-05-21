<?php 
if($this->crud_model->getRole() < 1)
	redirect(base_url(), "refresh");
if(!isset($_GET['id']))
	redirect(base_url(), "refresh");
$iduser = $_GET['id'];
$userinfo = $this->crud_model->getUserInfo($iduser);
if($iduser == $this->crud_model->getUserInfo()->id)
	$mesmousuario = true;
if($this->crud_model->checkCliente($_GET['id']) < 1 && $this->crud_model->getRole() < 2 && $mesmousuario == false)
	redirect(base_url(), "refresh");
?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<h1 class="text-center">Editar usuario</h1>
		<div class="col-lg-8 white-box cold-md-12">
			<form method="post" action="<?=base_url("main/update_usuario")?>">
				<input hidden type="hidden" name="iduser" value="<?=$userinfo->id?>">
				<div class="form-group">
					<label for="nomeuser">Nome</label>
					<input required type="text" value="<?=$userinfo->name?>" name="nomeuser" class="form-control" id="nomeuser" placeholder="Digite o nome do cliente">
				</div>
				<div class="form-group">
					<label for="nomeuser">Email</label>
					<input required type="text" value="<?=$userinfo->email?>" name="emailuser" class="form-control" id="nomeuser" placeholder="Digite o email do cliente">
				</div>
				<div class="form-group">
					<label for="senhauser">Nova senha</label>
					<input minlength="3" type="text" name="senhauser" class="form-control" id="senhauser" placeholder="Digite a nova do cliente">
				</div>
				<?php if($this->crud_model->getRole() == 2 && $mesmousuario == false) { ?>
					<div class="form-group">
						<label for="cargo">Cargo</label>
						<select value="<?=$userinfo->role?>" required name="cargo" class="form-control" id="cargo">
							<option value="0">Cliente</option>
							<option value="1">Revendedor</option>
							<option value="2">Administrador</option>
						</select>
					</div>
				<?php } else { ?>
					<div class="form-group">
						<label for="cargo">Cargo</label>
						<select value="<?=$userinfo->role?>" required name="cargo" class="form-control" id="cargo">
							<option value="<?=$userinfo->role?>"><?=$this->crud_model->getRoleName($userinfo->role)?></option>
						</select>
					</div>
				<?php } ?>
				<hr>
				<?php if(isset($_GET['erro'])){ ?>
					<div class="alert alert-danger">Use outro e-mail</div>
				<?php } ?>
				<div class="text-center">
					<a href="<?=base_url("main/delete_usuario?iduser=".$userinfo->id)?>" class="btn btn-danger px-5 py-2 text-uppercase">DELETAR</a>
					<button type="submit" class="btn btn-info px-5 py-2 text-uppercase">SALVAR</button>
				</div>
			</form>
		</div>
	</div>
</div>