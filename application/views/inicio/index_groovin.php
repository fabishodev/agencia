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
<section id="intro">
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
</div>
</section>
<section id="about" class="section">
  <div class="container">
  	<div class="row">
  		<div class="col-md-8 col-md-offset-2">
  			<div class="heading">
  				<h3><span>Nosotros</span></h3>
  			</div>
  			<div class="sub-heading">
  				<p>
            Somos una agencia de viaje con la misión de que más mexicanos conozcan su país, por ello queremos hacer del turismo nacional una experiencia placentera y extraordinaria. Podrás beber un buen vino, visitar un pueblo mágico o  disfrutar la vista desde un paseo en globo aerostático.
  				</p>
          <p>
            Creemos que el ecoturismo, turismo de aventura, religioso o de lujo por mencionar algunos, tienen mucho por ofrecer.

          </p>
  			</div>
  		</div>
  	</div>
  </div>
</section>
<section id="tours" class="section gray">
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="heading">
				<h3><span>Tours</span></h3>
			</div>
			<div class="sub-heading">
				<p>
					 We have a history of doing what our name implies, creating a visual language around the beliefs of the brands we work with.
				</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
						<ul class="grid effect" id="grid">
              <?php if ($tours !== FALSE): ?>
                <?php foreach ($tours as $fila): ?>
                  <li><a class="fancybox" data-fancybox-group="gallery" title="<a style='color: #fff;'href='<?php echo base_url();?>index.php/tour/informacion/<?php echo $fila->id ?>'><?php echo $fila->nombre_tour ?></a>" href="<?php echo base_url(); ?>img/caratulas/<?php echo $fila->caratula_imagen ?>">
                    <img src="<?php echo base_url(); ?>/img/caratulas/<?php echo $fila->caratula_imagen ?>" alt="" /></a>
                  </li>
                  <?php endforeach; ?>
              <?php endif; ?>
            </ul>
		</div>
	</div>
</div>
</section>
<!-- section works -->

<section id="works" class="section">
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="heading">
        <h3>Paquetes<span></span></h3>
      </div>
      <div class="sub-heading">
        <p>
					 We have a history of doing what our name implies, creating a visual language around the beliefs of the brands we work with.
				</p>
      </div>
    </div>
  </div>
  <div class="row">
<!-- START THE FEATURETTES -->
	<div class="col-md-12">
     <hr class="featurette-divider">
      <?php if ($paquetes !== FALSE): ?>
        <?php foreach ($paquetes as $p): ?>
          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading"><?php echo $p->nombre_paquete; ?> <span class="text-muted">$<?php echo number_format($p->precio,2).' '.$p->denominacion ?></span></h2>
              <p class="lead"><?php echo $p->especificaciones; ?></p>
                <p><?php echo anchor('paquete/informacion/'.$p->id,'Más Información',array('class'=>'btn btn-theme btn-lg')) ?></p>
            </div>
            <div class="col-md-5">
              <a href="<?php echo 'paquete/informacion/'.$p->id ?>">
                <img class="featurette-image img-responsive img-thumbnail center-block" height="300" width="300" data-src="holder.js/500x500/auto" src="<?php echo base_url();?>img/caratulas/<?php echo $p->caratula_imagen; ?>" alt="Generic placeholder image">
              </a>
            </div>
          </div>
          <hr class="featurette-divider">
        <?php endforeach; ?>
      <?php endif; ?>
<!-- /END THE FEATURETTES -->
</div>
</div>
</div>
</section>
<!-- section contact -->
<section id="contact" class="section gray">
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="heading">
				<h3><span>Contactanos</span></h3>
			</div>
			<div class="sub-heading">
        <p>
					 Eres promotor turístico y te interesa publicar o promocionar algun viaje o tour <?php echo anchor('contacto/promotor','<strong> Presiona Aquí</strong>',array('class'=>'btn btn-theme btn-sm')); ?> nos interesa conocer tus servicios.
				</p>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h4><i class="icon-envelope"></i><strong>Contacto</strong></h4>
			<!-- start contact form -->

      <form action="<?php echo base_url();?>/index.php/contacto/enviar" method="post" role="form" class="form-validacion">
        <div class="form-group">
        <label for="name">Tu Nombre</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Tu nombre" data-rule="maxlen:4" data-msg="Ingresze al menos 4 caractes" required/>
        </div>
        <div class="form-group">
        <label for="email">Tu Correo</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Tu correo electrónico" data-rule="email" data-msg="Ingrese un correo valido" required />
        </div>
        <div class="form-group">
          <label for="sel-tipo">Tipo de Mensaje</label>
          <select class="form-control" id="sel-tipo" name="sel-tipo" required>
            <option selected value="informacion">Información</option>
              <option value="sugerencia">Sugerencia</option>
          </select>
        </div>
        <div class="form-group">
        <label for="subject">Asunto</label>
        <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" data-rule="maxlen:4" data-msg="Ingrese al menos 8 caracteres como asunto" required/>
        </div>
        <div class="form-group">
        <label for="message">Mensaje</label>
        <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Ingrese un mensaje" required></textarea>
        </div>
        <button type="submit" class="btn btn-lg btn-theme pull-left">Enviar Mensaje</button>
      </form>

						<!-- end contact form -->
						<div class="clear"></div>
		</div>
		<div class="col-md-6">
      <h4>Visítanos</h4>
      <p><strong>Albino García # 415, CP38040 Celaya, Gto.</strong></p>
						<!-- map -->
						<div id="section-map" class="clearfix">
							<div id="map"></div>
						</div>
		</div>
	</div>
</div>
</section>
<!-- end section contact -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>
$(document).ready(function() {
  $('.form-validacion').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
      valid: 'glyphicon glyphicon-ok',
      invalid: 'glyphicon glyphicon-remove',
      validating: 'glyphicon glyphicon-refresh',
    }
  });
});
</script>
<script type="text/javascript">
    // When the window has finished loading create our google map below
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 15,

            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(20.528889, -100.815), // New York

            // How you would like to style the map.
            // This is where you would paste any style found on Snazzy Maps.
            styles: [	{		featureType:"all",		elementType:"all",		stylers:[		{			invert_lightness:false		},		{			saturation:10		},		{			lightness:30		},		{			gamma:0.5		},		{			hue:"#5C9F24"		}		]	}	]
        };

        // Get the HTML DOM element that will contain your map
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('map');

        // Create the Google Map using out element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);
    }
</script>
