<?php 
if($this->crud_model->getRole() < 2)
	redirect(base_url(), "refresh");
?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<h1 class="text-center">Criar novo link</h1>
		<div class="col-lg-8 white-box cold-md-12">
			<form method="post" action="<?=base_url("main/add_link")?>">
				<div class="form-group">
					<label for="nomelink">Nome</label>
					<input required type="text" name="nomelink" class="form-control" id="nomelink" placeholder="Digite o nome do filme/canal/episodio">
				</div>
				<div class="form-group">
					<label for="logolink">Logo</label>
					<input required type="text" name="logolink" class="form-control" id="logolink" placeholder="Digite a logo do filme/canal/episodio">
				</div>
				<div class="form-group">
					<label for="link">Link</label>
					<input required type="text" name="link" class="form-control" id="link" placeholder="Digite o link do filme/canal/episodio">
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
					<video id="preview" class="w-100 mx-auto embed-responsive-item video-js vjs-default-skin" autoplay controls preload="auto">
						<source src="#" type='application/x-mpegURL'>
						</video>
						<small>O player não suporta vídeos <b>.mkv</b></small>
					</div>
					<script>
						var player = videojs('preview');
					</script>
					<hr>
					<div class="text-center">
						<button type="submit" class="btn btn-info px-5 py-2 text-uppercase">ADICIONAR</button>
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