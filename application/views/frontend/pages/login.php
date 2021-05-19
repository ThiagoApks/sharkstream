<?php 
$this->crud_model->Check_Active_Login();
?>
<script type="text/javascript">
  $(document).ready(function(){
    jQuery.extend(jQuery.validator.messages, {
      required: "Este campo é necessário.",
      remote: "Conserte este campo.",
      email: "Por favor, digite um email válido.",
      equalTo: "Digite exatamente igual ao outro campo.",
      maxlength: jQuery.validator.format("Digite mais de {0} caractéres.."),
      minlength: jQuery.validator.format("Digite ao menos {0} caractéres.")
    });
    $("#loginform").submit(function(event){
      event.preventDefault();
      var post_url = $(this).attr("action");
      var request_method = $(this).attr("method");
      var form_data = $(this).serialize();
      if(!$(this).valid()) return 
        $.ajax({
          url: post_url,
          type: request_method,
          data: form_data  
        }).done(function(response){ 
          if(response == "fail")
            $("#submit").html('ALGO DEU ERRADO');
          else {
            $("#submit").html("SUCESSO");
            window.location.href = '<?=base_url()?>';
          }
        })
        return false;
      });
    $('#loginform').validate({
      rules: {
        password: {
          required: true,
          minlength: 4
        },
        cpassword: {
          required: true,
          minlength: 4,
          equalTo: "#password"
        }
      }
    }); 
  });
</script>
<div class="w-100 py-4 my-0" style="margin-top:-70px!important;background: url('<?=base_url("assets/background.png")?>');background-repeat: no-repeat;background-size: cover;background-position: center;">
  <br><br><br><br>
  <div class="row justify-content-center">
    <div class="col-12 col-sm-6 col-md-4 mx-auto">
      <div style="overflow: hidden;" class="px-1 flex-fill d-flex flex-column justify-content-center py-4">
        <br><br><br>
        <div class="container py-6 px-2">
          <form class="card card-md" action="<?=base_url("main/ajaxlogin")?>" method="POST" id="loginform" name="login">
            <div class="card-body py-5">
              <h2 class="card-title text-center mb-4">LOGIN</h2>
              <div class="mb-3 grayscale-off">
                <label class="form-label">Email</label>
                <input required class="grayscale form-control" type="email" name="email">
              </div>
              <div class="mb-3 grayscale-off">
                <label class="form-label">Senha</label>
                <input required class="grayscale form-control" type="password" id="password" name="password">
              </div>
              <div id="errors" style="display: none" class="grayscale-off alert alert-danger"></div>
              <div class="form-footer">
                <button id="submit" type="submit" class="btn-info btn w-100"><i class="far fa-sign-in"></i> ENTRAR</button>
              </div>
            </div>
          </form>
        </div>
        <br><br><br>
        <br>
      </div>
    </div>
  </div>
</div>
