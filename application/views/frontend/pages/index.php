<?php 
if($this->crud_model->getRole() > 1)
  $collg = 3;
else $collg = 6;
?>
<div class="container-fluid">
 <div class="row justify-content-center">
  <div class="col-lg-<?=$collg?> col-md-12">
   <div style="border-radius:10px!important" class="white-box rounded analytics-info">
    <h3 class="box-title mx-0 px-0 text-uppercase">Clientes</h3>
    <ul class="list-inline mx-0 two-part d-flex align-items-center mb-0">
     <li>
      <i class="fa fa-user fa-3x"></i>
    </li>
    <li class="ms-auto">
      <span class="counter font-weight-bold"><b><?=$this->crud_model->countClientes($this->crud_model->getUserInfo()->id)?></b></span>
    </li>
  </ul>
</div>
</div>
<?php 
if($this->crud_model->getRole() > 1): ?>
  <div class="col-lg-3 col-md-12">
   <div style="border-radius:10px!important" class="white-box rounded analytics-info">
    <h3 class="box-title mx-0 px-0 text-uppercase">Revendedores</h3>
    <ul class="list-inline mx-0 two-part d-flex align-items-center mb-0">
     <li>
      <i class="fa fa-user fa-3x"></i>
    </li>
    <li class="ms-auto">
      <span class="counter font-weight-bold"><b><?=$this->crud_model->countRevendedores()?></b></span>
    </li>
  </ul>
</div>
</div>
<div class="col-lg-3 col-md-12">
 <div style="border-radius:10px!important" class="white-box rounded analytics-info">
  <h3 class="box-title mx-0 px-0 text-uppercase">Administradores</h3>
  <ul class="list-inline mx-0 two-part d-flex align-items-center mb-0">
   <li>
    <i class="fa fa-user fa-3x"></i>
  </li>
  <li class="ms-auto">
    <span class="counter font-weight-bold"><b><?=$this->crud_model->countAdmins()?></b></span>
  </li>
</ul>
</div>
</div>
<?php endif; ?>
<div class="col-lg-<?=$collg?> col-md-12">
 <div style="border-radius:10px!important" class="white-box rounded analytics-info">
  <h3 class="box-title mx-0 px-0 text-uppercase">Categorias</h3>
  <ul class="list-inline mx-0 two-part d-flex align-items-center mb-0">
   <li>
    <i class="fa fa-list fa-3x"></i>
  </li>
  <li class="ms-auto">
    <span class="counter font-weight-bold"><b><?=$this->crud_model->countCategorias()?></b></span>
  </li>
</ul>
</div>
</div>
<div class="col-lg-6 col-md-12">
 <div style="border-radius:10px!important" class="white-box rounded analytics-info">
  <h3 class="box-title mx-0 px-0 text-uppercase">Links</h3>
  <ul class="list-inline mx-0 two-part d-flex align-items-center mb-0">
   <li>
    <i class="fa fa-link fa-3x"></i>
  </li>
  <li class="ms-auto">
    <span class="counter font-weight-bold"><b><?=$this->crud_model->countLinks()?></b></span>
  </li>
</ul>
</div>
</div>
<div class="col-lg-6 col-md-12">
 <div style="border-radius:10px!important" class="white-box rounded analytics-info">
  <h3 class="box-title mx-0 px-0 text-uppercase">Listas</h3>
  <ul class="list-inline mx-0 two-part d-flex align-items-center mb-0">
   <li>
    <i class="fa fa-list fa-3x"></i>
  </li>
  <li class="ms-auto">
    <span class="counter font-weight-bold"><b><?=$this->crud_model->countListas()?></b></span>
  </li>
</ul>
</div>
</div>
<div class="col-lg-6 col-md-12">
  <div class="white-box">
    <a class="text-dark" href="<?=base_url("links")?>"><h3 class="box-title text-uppercase">Ultimos links</h3></a>
    <div class="table-responsive">
      <table id="links_table" class="table text-nowrap">
        <thead class="thead-dark">
          <tr>
            <th class="border-top-0">Logo</th>
            <th class="border-top-0">Nome</th>
            <th class="border-top-0">Opções</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $query = $this->crud_model->getUltimosLinks();
          foreach ($query as $row):
            ?>
            <tr>
              <td><img src="<?=$row['logo']?>" width="50px"></td>
              <td><?=$row['nome']?></td>
              <td>
                <?php if($this->crud_model->getRole() == 2): ?>
                  <a href="<?=base_url("edit_link?id=".$row['id'])?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                <?php endif; ?>
                <a href="<?=base_url("preview_link?id=".$row['id'])?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="col-lg-6 col-md-12">
  <div class="white-box">
    <a class="text-dark" href="<?=base_url("categorias")?>"><h3 class="box-title text-uppercase">Ultimas categorias</h3></a>
    <div class="table-responsive">
      <table class="table text-nowrap">
        <thead class="thead-dark">
          <tr>
            <th class="border-top-0">ID</th>
            <th class="border-top-0">Nome</th>
            <?php if($this->crud_model->getRole() == 2): ?>
              <th class="border-top-0">Opções</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>
          <?php 
          $query = $this->crud_model->getUltimasCategorias();
          foreach ($query as $row):
            ?>
            <tr>
              <td><?=$row['id']?></td>
              <td><?=$row['nomecategoria']?></td>
              <td>
                <?php if($this->crud_model->getRole() == 2): ?>
                  <a href="<?=base_url("edit_cat?id=".$row['id'])?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>