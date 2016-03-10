<div class="container">
  <div class="row">
  <div class="col-lg-12">
    <?php $rows = count($paquetes); ?>
    <?php if ($rows > 0): ?>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <?php
          $i=0;
            if ($paquetes !== FALSE) {
              foreach ($paquetes as $fila) {
          ?>
          <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ?>"></li>
          <?php
              $i++;
            }
          }
          ?>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <?php
        $i=0;
          if ($paquetes !== FALSE) {
            foreach ($paquetes as $fila) {
          ?>
            <?php if ($i== 0): ?>
                <div class="item active">
                  <?php else: ?>
                    <div class="item">
            <?php endif; ?>
              <img  alt="<?php echo $fila->nombre_paquete ?> slide" src="<?php echo base_url();?>img/caratulas/<?php echo $fila->caratula_imagen ?>" class="img-responsive">
              <div class="carousel-caption">
                <h1 style="color: yellow;"><?php echo $fila->nombre_paquete ?></h1>
                <p><?php echo anchor('paquete/informacion/'.$fila->id,'Información',array('class'=>'btn btn-info')) ?></p>
              </div>
          </div>
          <?php
          $i++;
            }
          }
          ?>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <?php else: ?>
    <div class="jumbotron">
      <h1>Hola, viajero!</h1>
      <p>Por el momento no tenemos ningun viaje que ofrecerte.</p>
    </div>
  <?php endif; ?>
</div>
<!-- START THE FEATURETTES -->

     <hr class="featurette-divider">
      <?php if ($paquetes !== FALSE): ?>
        <?php foreach ($paquetes as $p): ?>
          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading"><?php echo $p->nombre_paquete; ?> <span class="text-muted"><?php echo $p->precio.' '.$p->denominacion ?></span></h2>
              <p class="lead"><?php echo $p->especificaciones; ?></p>
                <p><?php echo anchor('paquete/informacion/'.$p->id,'Información',array('class'=>'btn btn-info btn-xs')) ?></p>
            </div>
            <div class="col-md-5">
              <a href="<?php echo 'index.php/paquete/informacion/'.$p->id ?>">

                <img class="featurette-image img-responsive img-thumbnail center-block" height="400" width="400" data-src="holder.js/500x500/auto" src="<?php echo base_url();?>img/caratulas/<?php echo $p->caratula_imagen; ?>" alt="Generic placeholder image">

              </a>
            </div>
          </div>
          <hr class="featurette-divider">
        <?php endforeach; ?>
      <?php endif; ?>
     <!-- /END THE FEATURETTES -->
</div>
</div>
