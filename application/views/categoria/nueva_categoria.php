<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
            <h2>Nueva <small>Categoria</small></h2>
        </div>
        <div class="panel panel-default">

          <div class="panel-body">
            <!--Notificaciones-->
            <?php if ($success != '') { ?>
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo $success ?></strong>
            </div>
            <?php $this->session->set_userdata('success', '');} ?>

            <?php if ($danger != '') { ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><?php echo $danger ?></strong>
              </div>
            <?php $this->session->set_userdata('danger', '');} ?>
            <!---->
            <form class="form-validacion" action="<?php echo base_url();?>index.php/categoria/agregarNueva" method="post" enctype="multipart/form-data">


            <div class="col-sm-6">

              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" required>
                <p class="help-block">Nombre de la categoria.</p>
              </div>
              <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" cols="40" required></textarea>
                <p class="help-block">Breve descripción de la categoria.</p>
              </div>
              <div class="form-group">
                <button type="submit" name="button" class="btn btn-success">Agregar</button>
                <?php echo anchor('categoria/lista/','Regresar a lista', array('class'=>'btn btn-primary')) ?>
              </div>
            </div>
              </form>
          </div>

        </div>
      </div>

    </div>

  </div>
</section>
<script>
  agencia.viajes.validar_formulario();
</script>
