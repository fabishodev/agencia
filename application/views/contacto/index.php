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
					 Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.
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
						<div class="cform" id="contact-form">
							<div id="sendmessage">
								 Your message has been sent. Thank you!
							</div>
							<form action="contact/contact.php" method="post" role="form" class="contactForm">
							  <div class="form-group">
								<label for="name">Tu Nombre</label>
								<input type="text" name="name" class="form-control" id="name" placeholder="Tu nombre" data-rule="maxlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validation"></div>
							  </div>
							  <div class="form-group">
								<label for="email">Tu Correo</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Tu correo electrónico" data-rule="email" data-msg="Please enter a valid email" />
								<div class="validation"></div>
							  </div>
							  <div class="form-group">
								<label for="subject">Asunto</label>
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" data-rule="maxlen:4" data-msg="Please enter at least 8 chars of subject" />
								<div class="validation"></div>
							  </div>
							  <div class="form-group">
								<label for="message">Mensaje</label>
								<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
								<div class="validation"></div>
							  </div>

							  <button type="submit" class="btn btn-lg btn-theme pull-left">Enviar Mensaje</button>
							</form>

						</div>
						<!-- end contact form -->
						<div class="clear"></div>
		</div>
		<div class="col-md-6">
						<h4>Find our location</h4>
						<p>View from google map</p>
						<!-- map -->
						<div id="section-map" class="clearfix">
							<div id="map"></div>
						</div>
		</div>
	</div>
</div>
</section>
<!-- end section contact -->
