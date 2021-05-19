<div class="container-fluid">
 <div class="row justify-content-center">
  <div class="col-lg-12 col-md-12">
    <div class="white-box">
      <div class="w-100">
        <span class="h3 ml-0 mr-auto box-title text-uppercase">categorias</span>
        <?php if($this->crud_model->getRole() == 2): ?>
          <a href="<?=base_url("new_cat")?>" class="mr-auto ml-5 btn btn-dark"><i class="fa fa-plus"></i> Criar nova</a>  
        <?php endif; ?>
      </div>
      
      <div class="table-responsive">
        <table id="categorias_table" class="table text-nowrap">
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
            $query = $this->crud_model->getCategorias();
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

<script type="text/javascript">
  $(document).ready( function () {
    $('#categorias_table').DataTable();
  } );
</script>