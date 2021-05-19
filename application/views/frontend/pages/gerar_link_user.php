<?php 
if(!isset($_GET['id']) || null == $_GET['id'])
	redirect(base_url(), "refresh");

if($this->crud_model->getRole() < 1)
	redirect(base_url(), "refresh");

if($this->crud_model->checkCliente($_GET['id']) < 1 && $this->crud_model->getRole() < 2)
	redirect(base_url(), "refresh");

?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<h1 class="text-center">Gerar link</h1>
		<div class="col-lg-8 white-box cold-md-12">
			<form method="post" action="<?=base_url("main/gerarlinkuser")?>">
				<div class="form-group">
					<label for="listaid">Lista</label>
					<select required name="listaid" class="form-control" id="listaid">
						<?php 
						$query = $this->crud_model->getListas();
						foreach ($query as $row):
							?>
							<option value="<?=$row['id']?>"><?=$row['nome']?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group input-group date">
					<input name="expiracao" required type="date" class="form-control">
				</div>
				<br>
				<div class="text-center">
					<input name="iduser" value="<?=$_GET['id']?>" type="text" hidden class="form-control">
					<button type="submit" class="btn btn-info px-5 py-2 text-uppercase">GERAR</button>
				</div>
			</form>
		</div>
		<div class="col-lg-8 white-box cold-md-12">
			<h4 class="text-center">Acessos deste usuario</h4>
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Lista</th>
						<th>Status</th>
						<th>Expira</th>
						<th>Copiar link</th>
						<th>Suspender</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$acessos = $this->crud_model->getAcessos($_GET['id']);
					foreach($acessos as $acesso):?>
						<?php 
						$expiracao = date_range(now(), $acesso['acesso_expira']);
						?>
						<tr>
							<td><?=$acesso['idacesso']?></td>
							<td><?=$this->crud_model->getListaInfo($acesso['id_lista'])->nome?></td>
							<?php if($expiracao == false) { ?>
								<td><span class="text-uppercase text-danger">Expirou</span></td>
							<?php } else { ?>
								<td><span class="text-uppercase text-success">Expira em <?=timespan(time(), human_to_unix($acesso['acesso_expira']), 1)?></span></td>
							<?php } ?>
							<?php if($expiracao !== false){?>
								<td><?=$acesso['acesso_expira']?></td>
								<td>
									<input type="hidden" style="opacity:0;" value="<?=base_url("main/playlist/".$acesso['token'])?>" id="link<?=$acesso['idacesso']?>">
									<a href="#" onclick="copiarLink(<?=$acesso['idacesso']?>)"class="btn btn-float btn-success"><i class="fa fa-link"></i></a>
								</td>
								<td><a href="<?=base_url("main/suspender_user?id=".$acesso['idacesso'])?>" class="btn btn-float btn-danger"><i class="fa fa-user-minus"></i></a></td>
							<?php } else { ?>
								<td>Expirou</td>
								<td>
									<a disabled href="#" class="disabled btn btn-float btn-dark"><i class="fa fa-link"></i></a>
								</td>
								<td><button disabled class="disabled btn btn-float btn-danger"><i class="fa fa-user-minus"></i></button></td>
							<?php } ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	function copiarLink(id) {
		var copyText = document.getElementById("link"+id);
		copyText.type = 'text';
		copyText.select();
		document.execCommand("copy");
		copyText.type = 'hidden'; 
		$.notify("Copiado para a area de transferencia", "success")
	}
</script>