<!--Barra de navegacion-->
<header>
<div id="navigation" class="navbar navbar-inverse navbar-fixed-top default" role="navigation">
  <div class="container">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php echo anchor('inicio','Agencia',array('class'=>'navbar-brand')); ?>
    </div>

  <div class="navigation">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <nav>
      <ul class="nav navbar-nav navbar-right">
        <li class="current"><?php echo anchor('inicio','Home'); ?></li>
        <li><?php echo anchor('tour/tours','Tours'); ?></li>
        <li><?php echo anchor('paquete/nuevos','Paquetes'); ?></li>
        <li><?php echo anchor('contacto','Contacto'); ?></li>
        <li><?php echo anchor('carrito','<span class="glyphicon glyphicon-shopping-cart"></span>'); ?></li>
      </ul>
    </nav>
    </div><!-- /.navbar-collapse -->
  </div>
</div>
</div>
</header>
<!--Fin barra de navegacion-->
<section>
  <div class="container">
    <div class="row">
  		<div class="col-md-8 col-md-offset-2">
  			<div class="heading">
  				<h3><span><?php echo $detalle->nombre_tour; ?></span></h3>
  			</div>
  			<div class="sub-heading">
  				<p>
  					 <?php echo $detalle->descripcion; ?>
  				</p>
  			</div>
  		</div>
  	</div>
  <div class="row">
    <div class="col-md-4">
      <h2><?php echo $detalle->ciudad_lugar; ?><small></small></h2>
      <p class="help-block">Lugar</p>
      <h2><?php echo $detalle->duracion; ?><small></small></h2>
      <p class="help-block">Duración</p>
      <h2><?php echo $detalle->hospedaje_en; ?><small></small></h2>
      <p class="help-block">Hospedaje</p>
      <?php if ($detalle->todo_incluido=='Si'): ?>
        <h2><i class="fa fa-2x fa-check"></i><small></small></h2>
      <?php else: ?>
        <h2><i class="fa fa-2x fa-times"></i><small></small></h2>
      <?php endif; ?>
      <p class="help-block">Todo Incluido</p>
      <h2>$<?php echo number_format($detalle->tarifa_publica,2); ?> <small><?php echo $detalle->denominacion; ?></small></h2>
      <p class="help-block">Tarifa Publica</p>
      <?php if ($detalle->nota !== ""): ?>
        <h3><strong><?php echo $detalle->nota; ?></strong></h3>
        <p class="help-block">Nota</p>
      <?php endif; ?>

    </div>
    <div class="col-md-4">
      <h2><?php echo $detalle->dias_salidas; ?><small></small></h2>
      <p class="help-block">Dias de Salidas</p>
      <h2><?php echo $detalle->horarios_salidas; ?><small></small></h2>
      <p class="help-block">Horarios de Salidas</p>
      <h2><?php echo $detalle->lugar_salida; ?><small></small></h2>
      <p class="help-block">Lugar</p>

    </div>
    <div class="col-md-4">
      <a class="fancybox" rel="group" href="<?php echo base_url();?>img/caratulas/<?php echo $detalle->caratula_imagen;?>" title="<?php echo $detalle->nombre_tour;?>">
        <img height="300" width="300" class="img-thumbnail" src="<?php echo base_url() ?>img/caratulas/<?php echo $detalle->caratula_imagen; ?>" alt="" />
      </a>
      <?php foreach ($imagenes as $i): ?>
        <a class="fancybox" rel="group" href="<?php echo base_url();?>img/galerias/<?php echo $i->imagen;?>" title="<?php echo $detalle->nombre_tour;?>">
          <img height="100" width="100" class="img-thumbnail" src="<?php echo base_url() ?>img/galerias/<?php echo $i->imagen; ?>" title="Portfolio name" alt="<?php echo $detalle->ciudad_lugar; ?>" />
        </a>
      <?php endforeach; ?>
      <br>
      <form class="form-validacion" action="<?php echo base_url();?>index.php/carrito/agregar" method="post">
        <div class="input-group">
          <input type="hidden" id="id" name="id" value="<?php echo $detalle->id; ?>" readonly >
          <input type="hidden" id="tipo" name="tipo" value="tour" readonly >
          <input type="hidden" id="nombre-paquete" name="nombre-paquete" value="<?php echo $detalle->ciudad_lugar; ?>" readonly >
          <input type="hidden" id="especificaciones" name="especificaciones" value="<?php echo $detalle->nombre_tour; ?>" readonly >
          <div class="form-group">
            <label for="solicita-fac">Seleccione tarifa...</label><br>
            <div class="radio">
              <label>
                <input type="radio" name="tipo-tarifa" id="optionsRadios1" value="estandar" checked required>
                Tarifa Estandar($<?php echo number_format($detalle->tarifa_publica,2); ?>)
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="tipo-tarifa" id="optionsRadios2" value="menor" required>
                Menor Edad($<?php echo number_format($detalle->precio_menor,2); ?>)
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="tipo-tarifa" id="optionsRadios3" value="adulto" required>
              Adulto Mayor($<?php echo number_format($detalle->precio_adulto_mayor,2); ?>)
              </label>
            </div>
          </div>
            </div>
          <div class="form-group">
            <label for="fecha-reservacion">Fecha Reservación</label>
            <input type="text" class="form-control" id="fecha-reservacion" name="fecha-reservacion" placeholder="" required>
          </div>
          <div class="form-group">

            <div id="testdiv"></div>
          </div>
          <div class="form-group">
            <p>
              <button id="btn-submit" type="submit" name="button" class="btn btn-theme btn-lg">Agregar a Carrito</button>
            </p>
          </div>

      </form>

    </div>

  </div>



</div>
</section>

<script>
agencia.viajes.validar_formulario();
$(document).ready(function() {
  $( "#fecha-reservacion" ).datepicker({
    dateFormat:'yy-mm-dd',
    onSelect: function() {
        $( "#btn-submit" ).prop( "disabled", false );
        var date = $(this).val();
        //Metodo para validar que pueda ser seleccionado ese dia de la semana para reservar
        $.post("<?php echo base_url(); ?>index.php/tour/validarDiaSalida", {
          id: <?php echo $detalle->id ?>,
          date: date  // now you will get the selected date to `date` in your post
        },
        function(data){
            var result = JSON.parse(data);
            if (result.respuesta === 1) {

                $.post("<?php echo base_url(); ?>index.php/tour/obtenerVigenciaTourJson", {
                  id: <?php echo $detalle->id ?> // now you will get the selected date to `date` in your post
                },
                function(data){
                     var detalle = JSON.parse(data);
                     if (date < detalle.vigencia) {
                       $.post("<?php echo base_url(); ?>index.php/tour/obtenerDisponibilidad", {
                         id: <?php echo $detalle->id ?>,
                        date: date // now you will get the selected date to `date` in your post
                       },
                       function(data){
                            var result = JSON.parse(data);
                            $('#testdiv').html('');
                            $('#testdiv').html('<label for="disponibilidad">Disponibilidad</label><br><strong>' + result.lugares_disponibles+'</strong>');
                       });
                     }else {
                       $( "#btn-submit" ).prop( "disabled", true );
                       alert("No hay disponibilidad para esta fecha");
                       $('#testdiv').html('<label for="disponibilidad">Disponibilidad</label><br><stron>0</strong>');

                     }
                });

              }
              else {
                $( "#btn-submit" ).prop( "disabled", true );
                alert("No hay disponibilidad para esta fecha");
                $('#testdiv').html('<label for="disponibilidad">Disponibilidad</label><br><stron>0</strong>');

              }

          });

      }
  });
});
</script>
