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
  				<h3><span>Paquetes</span></h3>
  			</div>
  			<div class="sub-heading">
  				<p>
  					 Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.
  				</p>
  			</div>
  		</div>
  	</div>
  <div class="row">
    <div class="col-lg-12">
       <?php if ($paquetes !== FALSE): ?>
         <?php foreach ($paquetes as $p): ?>
           <div class="row">
             <div class="col-md-2">
               <a href="<?php echo base_url().'index.php/paquete/informacion/'.$p->id ?>">
                 <img class=" img-responsive img-thumbnail " height="200" width="300" data-src="holder.js/500x500/auto" src="<?php echo base_url();?>img/caratulas/<?php echo $p->caratula_imagen; ?>" alt="Generic placeholder image">
               </a>
             </div>
             <div class="col-md-10">
               <h2 class=""><?php echo $p->nombre_paquete; ?></h2>
               <h2 class=""> <span class="text-muted">$<?php echo number_format($p->precio,2).' '.$p->denominacion ?></span></h2>
               <p class="lead"><?php echo $p->especificaciones; ?></p>
                 <p><?php echo anchor('paquete/informacion/'.$p->id,'Más Información',array('class'=>'btn btn-theme btn-lg')) ?></p>
             </div>
           </div>
           <hr class="">
         <?php endforeach; ?>
       <?php endif; ?>
    </div>
  </div>

</div>
</section>
