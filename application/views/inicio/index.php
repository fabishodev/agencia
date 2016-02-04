<div class="container">
  <div class="row">
  <div class="col-lg-12">
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
              <img height="400" width="700" alt="<?php echo $fila->nombre_paquete ?> slide" src="<?php echo base_url();?>img/caratulas/<?php echo $fila->caratula_imagen ?>" class="img-responsive">
              <div class="carousel-caption">
                <?php echo $fila->nombre_paquete ?>
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
</div>
<!-- START THE FEATURETTES -->

     <hr class="featurette-divider">
      <?php if ($paquetes !== FALSE): ?>
        <?php foreach ($paquetes as $p): ?>
          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading"><?php echo $p->nombre_paquete; ?> <span class="text-muted"><?php echo $p->precio.' '.$p->denominacion ?></span></h2>
              <p class="lead"><?php echo $p->especificaciones; ?></p>
            </div>
            <div class="col-md-5">
              <img class="featurette-image img-responsive center-block" height="500" width="500" data-src="holder.js/500x500/auto" src="<?php echo base_url();?>img/caratulas/<?php echo $p->caratula_imagen; ?>" alt="Generic placeholder image">
            </div>
          </div>
          <hr class="featurette-divider">
        <?php endforeach; ?>
      <?php endif; ?>






     <!-- /END THE FEATURETTES -->
</div>
