<!--Fin Contenido-->
    <!--Footer-->
    <footer>
    <div class="verybottom">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="aligncenter">
                    <ul class="social-network social-circle">
                        <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
    				</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="aligncenter">
    					<p>
    						 &copy;2015 Agencia - All right reserved</a>.
    					</p>
                        <!--
                            All links in the footer should remain intact.
                            Licenseing information is available at: http://bootstraptaste.com/license/
                            You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Groovin
                        -->
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    </footer>
    <a href="#" class="scrollup"><i class="fa fa-angle-up fa-2x"></i></a>
    <!--Fin Footer-->
    <!-- javascript -->
    <script src="<?php echo base_url();?>assets/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.easing.js"></script>
    <script src="<?php echo base_url();?>assets/js/classie.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/js/slippry.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/nagging-menu.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.nav.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.scrollTo.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.fancybox.pack.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.fancybox-media.js"></script>
    <script src="<?php echo base_url();?>https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
    <script src="<?php echo base_url();?>assets/js/masonry.pkgd.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/imagesloaded.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/validate.js"></script>
    <script src="<?php echo base_url();?>assets/js/AnimOnScroll.js"></script>
        <script>
            new AnimOnScroll( document.getElementById( 'grid' ), {
                minDuration : 0.4,
                maxDuration : 0.7,
                viewportFactor : 0.2
            } );
        </script>
    <script>
    	$(document).ready(function(){
    	  $('#slippry-slider').slippry(
    		defaults = {
    			transition: 'vertical',
    			useCSS: true,
    			speed: 5000,
    			pause: 3000,
    			initSingle: false,
    			auto: true,
    			preload: 'visible',
    			pager: false,
    		}

    	  )
    	});
    </script>
    <script src="<?php echo base_url();?>assets/js/custom.js"></script>
            <script type="text/javascript">
                // When the window has finished loading create our google map below
                google.maps.event.addDomListener(window, 'load', init);

                function init() {
                    // Basic options for a simple Google Map
                    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                    var mapOptions = {
                        // How zoomed in you want the map to start at (always required)
                        zoom: 11,

                        // The latitude and longitude to center the map (always required)
                        center: new google.maps.LatLng(40.6700, -73.9400), // New York

                        // How you would like to style the map.
                        // This is where you would paste any style found on Snazzy Maps.
                        styles: [	{		featureType:"all",		elementType:"all",		stylers:[		{			invert_lightness:true		},		{			saturation:10		},		{			lightness:30		},		{			gamma:0.5		},		{			hue:"#5C9F24"		}		]	}	]
                    };

                    // Get the HTML DOM element that will contain your map
                    // We are using a div with id="map" seen below in the <body>
                    var mapElement = document.getElementById('map');

                    // Create the Google Map using out element and options defined above
                    var map = new google.maps.Map(mapElement, mapOptions);
                }
            </script>
    </body>
    </html>
