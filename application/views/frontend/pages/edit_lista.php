<?php 
if($this->crud_model->getRole() < 2)
	redirect(base_url(), "refresh");
if(!isset($_GET['id']))
	redirect(base_url(), "refresh");
$idlista = $_GET['id'];
$listainfo = $this->crud_model->getListaInfo($idlista);
?>
<div class="container-fluid">
	<div class="row justify-content-center">
		<h1 class="text-center">Editar lista</h1>
		<div class="col-lg-8 white-box cold-md-12">
			<form method="post" action="<?=base_url("main/update_cate")?>">
				<input hidden type="hidden" name="idcate" value="<?=$listainfo->id?>">
				<div class="form-group">
					<label for="nomecate">Nome</label>
					<input required type="text" value="<?=$listainfo->nome?>" name="nomecate" class="form-control" id="nomecate" placeholder="Digite o nome da categoria">
				</div>
				<hr>
				<div class="text-center">
					<a href="<?=base_url("main/delete_lista?id=".$listainfo->id)?>" class="btn btn-danger px-5 py-2 text-uppercase">DELETAR</a>
					<button type="submit" class="btn btn-info px-5 py-2 text-uppercase">SALVAR</button>
				</div>
			</form>
		</div>
		<div class="col-lg-8 white-box cold-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Categoria</th>
						<th>Links</th>
						<th>Adicionar</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$categorias = $this->crud_model->getCategorias();
					foreach($categorias as $categoria):?>
						<tr>
							<td><?=$categoria['id']?></td>
							<td><?=$categoria['nomecategoria']?></td>
							<td><?=count($this->crud_model->getLinksCategoria($categoria['id']))?></td>
							<?php if($this->crud_model->checkCategoriaLista($idlista, $categoria['id']) < 1){?>
								<td>
									<form action="<?=base_url("main/add_categoria_lista")?>" method="post">
										<input type="hidden" name="idcategoria" value="<?=$categoria['id']?>">
										<input type="hidden" name="idlista" value="<?=$idlista?>">
										<button type="submit" class="btn btn-float btn-success"><i class="fa fa-plus"></i></button>
									</form>
								</td>
							<?php } else { ?>
								<td>
									<form action="<?=base_url("main/remove_categoria_lista")?>" method="post">
										<input type="hidden" name="idcategoria" value="<?=$categoria['id']?>">
										<input type="hidden" name="idlista" value="<?=$idlista?>">
										<button type="submit" class="btn btn-float btn-danger"><i class="fa fa-times"></i></button>
									</form>
								</td>
							<?php } ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>