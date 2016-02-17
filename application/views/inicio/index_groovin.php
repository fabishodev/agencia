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
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"><nav>
      <ul class="nav navbar-nav navbar-right">
        <li class="current"><a href="#intro">Home</a></li>
    <li><a href="#works">Paquetes</a></li>
    <li><a href="#contact">Contacto</a></li>
      </ul></nav>
    </div><!-- /.navbar-collapse -->
  </div>

  </div>
</div>

</header>
<!--Fin barra de navegacion-->
<section id="intro">
  <?php $rows = count($paquetes); ?>
  <?php if ($rows > 0): ?>
    <ul id="slippry-slider">
      <?php $i=0; ?>
      <?php foreach ($paquetes as $fila): ?>
        <li>
				<a href="#slide<?php echo $i;  ?>"><img src="<?php echo base_url();?>img/caratulas/<?php echo $fila->caratula_imagen ?>" alt="<?php echo $fila->nombre_paquete ?>"></a>
      </li>
        <?php $i++; ?>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <div class="jumbotron">
      <h1>Hola, viajero!</h1>
      <p>Por el momento no tenemos ningun viaje que ofrecerte.</p>
    </div>
  <?php endif; ?>
</section>

<section id="works" class="section">
<div class="container">
  <div class="row">
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
              <a href="<?php echo 'paquete/informacion/'.$p->id ?>">

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
</section>
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
			<h4><i class="icon-envelope"></i><strong>Contact form</strong></h4>
			<p>
				Want to work with us or just want to say hello? Don't hesitate to get in touch!
			</p>
			<!-- start contact form -->
						<div class="cform" id="contact-form">
							<div id="sendmessage">
								 Your message has been sent. Thank you!
							</div>
							<form action="contact/contact.php" method="post" role="form" class="contactForm">
							  <div class="form-group">
								<label for="name">Tu Nombre</label>
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="maxlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validation"></div>
							  </div>
							  <div class="form-group">
								<label for="email">Tu Correo</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
								<div class="validation"></div>
							  </div>
							  <div class="form-group">
								<label for="subject">Asunto</label>
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="maxlen:4" data-msg="Please enter at least 8 chars of subject" />
								<div class="validation"></div>
							  </div>
							  <div class="form-group">
								<label for="message">Mensaje</label>
								<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
								<div class="validation"></div>
							  </div>

							  <button type="submit" class="btn btn-lg btn-theme pull-left">Send Message</button>
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
