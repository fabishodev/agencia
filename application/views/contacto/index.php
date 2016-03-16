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
<!-- section contact -->
<section id="contact" class="section">
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
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h4><i class="icon-envelope"></i><strong>Contacto</strong></h4>
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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
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
