<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
            <h2>Nueva <small>Categoria</small></h2>
        </div>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Paquetes <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><?php echo anchor('paquete/lista','Lista'); ?></li>
                    <li><?php echo anchor('paquete/nuevo','Nuevo'); ?></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categoria <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><?php echo anchor('categoria/lista','Lista'); ?></li>
                    <li><?php echo anchor('categoria/nueva','Nueva'); ?></li>
                  </ul>
                </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><?php echo anchor('categoria/salir','Salir'); ?></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
                <!--Fin barra de navegacion-->
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
