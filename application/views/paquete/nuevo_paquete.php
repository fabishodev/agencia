<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
            <h2>Nuevo <small>Paquete</small></h2>
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
            <form class="form-validacion" action="<?php echo base_url();?>index.php/paquete/agregarNuevo" method="post" enctype="multipart/form-data">


            <div class="col-sm-4">
              <div class="form-group">
            <label for="sel-categoria" class="control-label">Categoria</label><br>
                <select class="form-control" id="sel-categoria" name="sel-categoria" required>
                  <option value="">Seleccione</option>
                  <?php foreach ($categorias as $c) { ?>
                    <option value="<?php echo $c->id;?>"><?php echo $c->nombre;?></option>
                  <?php }?>
                </select>
              </div>

              <div class="form-group">
                <label for="nombre">Nombre Paquete</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" required>
                <p class="help-block">Nombre de la categoria.</p>
              </div>
              <div class="form-group">
                <label for="especificaciones">Especificaciones</label>
                <textarea name="especificaciones" id="especificaciones" class="form-control" rows="3" cols="40" required></textarea>
                <p class="help-block">Especificaciones del pquete.</p>
              </div>
              <div class="form-group">
                <label for="nombre">Lugar</label>
                <input type="text" class="form-control" id="lugar" name="lugar" placeholder="" required>
                <p class="help-block">Ciudad o municipio, estado o pais.</p>
              </div>
              <div class="form-group">
                <label for="duracion">Duración</label>
                <input type="text" class="form-control" id="duracion" name="duracion" placeholder="" required>
                <p class="help-block">Ejemplo: 4 dias, 3 noches.</p>
              </div>


            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="fecha-salida">Fecha Salida</label>
                <input type="text" class="form-control" id="fecha-salida" name="fecha-salida" placeholder="" required>
                <p class="help-block">Formato: AAAA-MM-DD</p>
              </div>
              <div class="form-group">
                <label for="hora-salida">Hora Salida</label>
                <input type="text" class="form-control" id="hora-salida" name="hora-salida" placeholder="" >
                <p class="help-block">Formato: HH:MM</p>
              </div>
              <div class="form-group">
                <label for="fecha-regreso">Fecha Regreso </label>
                <input type="text" class="form-control" id="fecha-regreso" name="fecha-regreso" placeholder="" required>
                <p class="help-block">Formato: AAAA-MM-DD</p>
              </div>
              <div class="form-group">
                <label for="hora-regreso">Hora Regreso </label>
                <input type="text" class="form-control" id="hora-regreso" name="hora-regreso" placeholder="" >
                <p class="help-block">Formato: HH:MM</p>
              </div>
              <div class="form-group">
                <label for="lugar-salida">Lugar Salida</label>
                <input type="text" class="form-control" id="lugar-salida" name="lugar-salida" placeholder="" required>
                <p class="help-block">Punto de reunión de salida.</p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="hospedaje">Hospedaje </label>
                <input type="text" class="form-control" id="hospedaje" name="hospedaje" placeholder="">
                <p class="help-block">Nombre del hotel</p>
              </div>
              <div class="checkbox">
              <label>
                <input name="todo-incluido" type="checkbox" value="Si"> Todo Incluido
              </label>
              </div>
              <div class="form-group">
                <label for="precio">Precio </label>
                <input type="text" class="form-control" id="precio" name="precio" placeholder="" required>
                <p class="help-block">Precio total del paquete.</p>
              </div>
              <div class="form-group">
      					<label for="denominacion">Denominación </label>
      					<select class="form-control" id="denominacion" name="denominacion" required>
      						<option value="MX">MX</option>
      						<option value="USD">USD</option>
                </select>
      				</div>
              <div class="form-group">
                <label for="nota">Nota</label>
                <textarea name="nota" id="nota" class="form-control" rows="3" cols="40"></textarea>
                <p class="help-block">Alguna nota.</p>
              </div>
              <div class="form-group">
                <label for="upl">Caratula</label>
                <input type="file" id="upl" name="upl" required>
                <p class="help-block">Caratula del Paquete.</p>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" name="button" class="btn btn-success">Agregar</button>
              <?php echo anchor('paquete/lista/','Regresar a lista', array('class'=>'btn btn-primary')) ?>
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
