<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1>Ingresar <small></small></h1>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <?php if ($danger != '') { ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong><?php echo $danger ?></strong>
        </div>
      <?php $this->session->set_userdata('danger', '');} ?>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <form id="form-ingresar-usuario" class="form-validacion" action="<?php echo base_url();?>index.php/admin/ingresarusuario" method="post">
        <div class="form-group">
          <label for="correo-usuario">Correo:</label>
          <input type="email" class="form-control" id="correo-usuario" name="correo-usuario" placeholder="usuario@dominio.com" required>
        </div>
        <div class="form-group">
          <label for="password">Contraseña:</label>
          <input type="password" class="form-control" id="pass-usuario" name="pass-usuario" placeholder="" required="">
        </div>
        <button id="btn-sub" type="submit" name="button" class="btn btn-info">Ingresar</button>
      </form>

    </div>
  </div>
</div>
<script>
  agencia.viajes.validar_formulario();
</script>
