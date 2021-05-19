<?php 
if($this->crud_model->getRole() < 2)
	redirect(base_url(), "refresh");
if(!isset($_GET['id']))
	redirect(base_url(), "refresh");
$idlink = $_GET['id'];
$linkinfo = $this->crud_model->getLinkInfo($idlink);
?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<h1 class="text-center">Editar link</h1>
		<div class="col-lg-8 white-box cold-md-12">
			<form method="post" action="<?=base_url("main/update_link")?>">
				<input hidden type="hidden" name="idlink" value="<?=$linkinfo->id?>">
				<div class="form-group">
					<label for="nomelink">Nome</label>
					<input value="<?=$linkinfo->nome?>" required type="text" name="nomelink" class="form-control" id="nomelink" placeholder="Digite o nome do filme/canal/episodio">
				</div>
				<div class="form-group">
					<label for="logolink">Logo</label>
					<input value="<?=$linkinfo->logo?>" required type="text" name="logolink" class="form-control" id="logolink" placeholder="Digite a logo do filme/canal/episodio">
				</div>
				<div class="form-group">
					<label for="link">Link</label>
					<input value="<?=$linkinfo->link?>" required type="text" name="link" class="form-control" id="link" placeholder="Digite o link do filme/canal/episodio">
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Categoria</label>
					<select required name="categoria" class="form-control" id="exampleFormControlSelect1">
						<?php 
						$categorias = $this->crud_model->getCategorias();
						foreach($categorias as $categoria):?>
							<option value="<?=$categoria['id']?>"><?=$categoria['nomecategoria']?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<h5>Pré visualização</h5>
				<div class="embed-responsive embed-responsive-16by9">
					<video id="preview" class="w-100 mx-auto embed-responsive-item video-js vjs-default-skin" controls preload="auto">
						<source src="<?=$linkinfo->link?>" type='application/x-mpegURL'>
						</video>
					</div>
					<script>
						var player = videojs('preview');
					</script>
					<hr>
					<div class="text-center">
						<a href="<?=base_url("main/delete_link?id=".$linkinfo->id)?>" class="btn btn-danger px-5 py-2 text-uppercase">DELETAR</a>
						<button type="submit" class="btn btn-info px-5 py-2 text-uppercase">SALVAR</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		let src_ant;
		$("#link").keyup(function() {
			if(this.value !== src_ant)
			{
				src_ant = this.value;
				player.src(this.value);
			}
		});
	</script>