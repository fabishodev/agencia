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
  				<h3><span><?php echo $detalle->nombre_paquete; ?></span></h3>
  			</div>
  			<div class="sub-heading">
  				<p>
  					 <?php echo $detalle->especificaciones; ?>
  				</p>
  			</div>
  		</div>
  	</div>
  <div class="row">
    <div class="col-md-4">
      <h2><?php echo $detalle->lugar; ?><small></small></h2>
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
      <h2>$<?php echo number_format($detalle->precio,2); ?> <small><?php echo $detalle->denominacion; ?></small></h2>
      <p class="help-block">Precio</p>
      <?php if ($detalle->nota !== NULL): ?>
        <h3><strong><?php echo $detalle->nota; ?></strong></h3>
        <p class="help-block">Nota</p>
      <?php endif; ?>

    </div>
    <div class="col-md-4">
      <h2><?php echo $detalle->fecha_salida; ?><small></small></h2>
      <p class="help-block">Fecha Salida</p>
      <h2><?php echo $detalle->hora_salida; ?><small></small></h2>
      <p class="help-block">Hora</p>
      <h2><?php echo $detalle->lugar_salida; ?><small></small></h2>
      <p class="help-block">Lugar</p>
      <h2><?php echo $detalle->fecha_regreso; ?><small></small></h2>
      <p class="help-block">Fecha Regreso</p>
      <h2><?php echo $detalle->hora_regreso; ?><small></small></h2>
      <p class="help-block">Hora</p>
      <h2><?php echo $detalle->lugar_regreso; ?><small></small></h2>
      <p class="help-block">Lugar</p>

    </div>
    <div class="col-md-4">
      <a class="fancybox" rel="group" title="<?php echo $detalle->nombre_paquete ?>" href="<?php echo base_url();?>img/caratulas/<?php echo $detalle->caratula_imagen;?>">
        <img height="300" width="300" class="img-thumbnail" src="<?php echo base_url() ?>img/caratulas/<?php echo $detalle->caratula_imagen; ?>" alt="" />
      </a>
      <?php foreach ($imagenes as $i): ?>
        <a class="fancybox" title="<?php echo $detalle->nombre_paquete ?>" rel="group" href="<?php echo base_url();?>img/caratulas/<?php echo $i->imagen;?>">
          <img height="100" width="100" class="img-thumbnail" src="<?php echo base_url() ?>img/galerias/<?php echo $i->imagen; ?>" title="<?php echo $detalle->nombre_paquete; ?>" alt="<?php echo $detalle->lugar; ?>" />
        </a>
      <?php endforeach; ?>
      <br>
      <form class="" action="<?php echo base_url();?>index.php/carrito/agregar" method="post">
        <div class="form-group">
          <label for="solicita-fac">Seleccione tarifa...</label><br>
          <div class="radio">
            <label>
              <input type="radio" name="tipo-tarifa" id="optionsRadios1" value="estandar" checked required>
              Tarifa Estandar($<?php echo number_format($detalle->precio,2); ?>)
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

          <div id="out"></div>
        </div>
        <div class="input-group">
          <input type="hidden" id="id" name="id" value="<?php echo $detalle->id; ?>" readonly>
          <input type="hidden" id="tipo" name="tipo" value="paquete" readonly>
          <input type="hidden" id="price" name="price" value="<?php echo $detalle->precio; ?>" readonly>
          <input type="hidden" id="nombre-paquete" name="nombre-paquete" value="<?php echo $detalle->nombre_paquete; ?>" readonly>
          <input type="hidden" id="especificaciones" name="especificaciones" value="<?php echo $detalle->especificaciones; ?>" readonly>
          <input class="btn btn-theme btn-lg" type="submit" name="submit" value="Agregar a Carrito">
        </div>
      </form>

    </div>

  </div>



</div>
</section>
<script>
(function ($) {
$(".fancybox").fancybox({
    openEffect	: 'elastic',
      closeEffect	: 'elastic',
      helpers : {
      media : {}
    }
  });
  })(jQuery);
</script>
