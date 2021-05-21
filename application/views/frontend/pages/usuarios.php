
<div class="container-fluid">
 <div class="row justify-content-center">
  <div class="col-lg-12 col-md-12">
    <div class="white-box">
      <div class="w-100">
        <span class="h3 ml-0 mr-auto box-title text-uppercase">Clientes</span>
        <?php if($this->crud_model->getRole() > 0): ?>
          <a href="<?=base_url("new_user")?>" class="mr-auto ml-5 btn btn-dark"><i class="fa fa-user-plus"></i> Criar novo</a>  
        <?php endif; ?>
      </div>
      
      <div class="table-responsive">
        <table id="categorias_table" class="table text-nowrap">
          <thead class="thead-dark">
            <tr>
              <th class="border-top-0">ID</th>
              <th class="border-top-0">Nome</th>
              <th class="border-top-0">Email</th>
              <th class="border-top-0">Cargo</th>
              <th class="border-top-0">Revendedor</th>
              <th class="border-top-0">Opções</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if($this->crud_model->getRole() == 1) {
              $query = $this->crud_model->getUsuarios($this->crud_model->getUserInfo()->id);
              array_push($query, json_decode(json_encode($this->crud_model->getUserInfo()), true));
            } else {
              $query = $this->crud_model->getUsuarios();
            }
            foreach ($query as $row):
              ?>
              <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['email']?></td>
                <td><?=$this->crud_model->getRoleName($row['role'])?></td>
                <td><?=($row['revendedor_id'] > 0) ? $this->crud_model->getUserInfo($row['revendedor_id'])->name : "Nenhum revendedor"?></td>
                <td>
                  <a href="<?=base_url("edit_user?id=".$row['id'])?>" class="btn btn-info"><i class="fa fa-user-edit"></i></a>
                  <a href="<?=base_url("gerar_link_user?id=".$row['id'])?>" class="btn btn-info"><i class="fa fa-link"></i></a>
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

<script type="text/javascript">
  $(document).ready( function () {
    $('#categorias_table').DataTable();
  } );
</script>