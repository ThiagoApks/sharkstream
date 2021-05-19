<div class="container-fluid">
 <div class="row justify-content-center">
  <div class="col-lg-12 col-md-12">
    <div class="white-box">
      <div class="w-100">
        <span class="h3 ml-0 mr-auto box-title text-uppercase">links</span>
        <?php if($this->crud_model->getRole() == 2): ?>
          <a href="<?=base_url("new_link")?>" class="mr-auto ml-5 btn btn-dark"><i class="fa fa-plus"></i> Criar novo</a>  
        <?php endif; ?>
      </div>
      
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
            $query = $this->crud_model->getLinks();
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
</div>
</div>

<script type="text/javascript">
  $(document).ready( function () {
    $('#links_table').DataTable();
  } );
</script>