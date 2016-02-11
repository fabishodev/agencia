<div class="container">
  <div class="row">
    <div class="page-header">
      <h1><?php echo $detalle->nombre_paquete; ?></h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h2><?php echo $detalle->lugar; ?><small></small></h2>
      <p><b><?php echo $detalle->especificaciones; ?></b></p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">

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
      <h2><?php echo $detalle->precio; ?> <small><?php echo $detalle->denominacion; ?></small></h2>
      <p class="help-block">Precio</p>
      <?php if ($detalle->nota !== NULL): ?>
        <h4><strong><?php echo $detalle->nota; ?></strong></h4>
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
      <a class="fancybox" rel="group" href="<?php echo base_url();?>img/caratulas/<?php echo $detalle->caratula_imagen;?>">
        <img height="300" width="300" class="img-thumbnail" src="<?php echo base_url() ?>img/caratulas/<?php echo $detalle->caratula_imagen; ?>" alt="" />
      </a>
      <?php foreach ($imagenes as $i): ?>
        <a class="fancybox" rel="group" href="<?php echo base_url();?>img/caratulas/<?php echo $i->imagen;?>">
          <img height="100" width="100" class="img-thumbnail" src="<?php echo base_url() ?>img/galerias/<?php echo $i->imagen; ?>" alt="" />
        </a>
      <?php endforeach; ?>

    </div>

  </div>
</div>
<script>
$(".fancybox").fancybox({
    openEffect	: 'elastic',
      closeEffect	: 'elastic',
      helpers : {
      media : {}
    }
  });
</script>
