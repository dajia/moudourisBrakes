<?php
/**
 * Template Name: Contact
 *
 * @package Unconditional
 * @since Unconditional 1.0.0
 */

get_header(); ?>

<section class="container-fluid" id="section3">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <div class="row">
        <?php //if ( is_active_sidebar( 'page' ) ) : ?>
        <!--<div class="col-sm-12">-->
          <?php //else : ?>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <?php //endif; ?>
            <?php do_action( 'unconditional_before_page' ); ?>
            <?php while ( have_posts() ) : the_post(); ?>

              <?php get_template_part( 'content/content', 'page' ); ?>

              <?php
              // If comments are open or we have at least one comment, load up the comment template
              if ( comments_open() || '0' != get_comments_number() )
                comments_template();
              ?>

            <?php endwhile; // end of the loop. ?>
            <?php do_action( 'unconditional_after_page' ); ?>
          </div>
          <?php if ( !is_active_sidebar( 'page' ) ) { ?>
            <div class="col-xs-12 col-sm-12 col-md-6">
		       <?php //get_sidebar( 'page' ); ?>
              <div class="map">
                <?php //$address = get_field('contact_map');
                 //echo getGoogleMapImage( array( "address" => $address['address'] ) ); ?>
                <?php

                $image = get_field('contact_map_image');

                if( !empty($image) ): ?>

                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

                <?php endif; ?>


                <style type="text/css">

                  .acf-map {
                    width: 100%;
                    height: 400px;
                    border: #ccc solid 1px;
                    margin: 20px 0;
                  }

                </style>
                <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
                <script type="text/javascript">
                  (function($) {

                    /*
                     *  render_map
                     *
                     *  This function will render a Google Map onto the selected jQuery element
                     *
                     *  @type	function
                     *  @date	8/11/2013
                     *  @since	4.3.0
                     *
                     *  @param	$el (jQuery element)
                     *  @return	n/a
                     */

                    function render_map( $el ) {

                      // var
                      var $markers = $el.find('.marker');

                      // vars
                      var args = {
                        zoom		: 14,
                        center		: new google.maps.LatLng(0, 0),
                        mapTypeId	: google.maps.MapTypeId.ROADMAP
                      };

                      // create map
                      var map = new google.maps.Map( $el[0], args);

                      // add a markers reference
                      map.markers = [];

                      // add markers
                      $markers.each(function(){

                        add_marker( $(this), map );

                      });

                      // center map
                      center_map( map );

                    }

                    /*
                     *  add_marker
                     *
                     *  This function will add a marker to the selected Google Map
                     *
                     *  @type	function
                     *  @date	8/11/2013
                     *  @since	4.3.0
                     *
                     *  @param	$marker (jQuery element)
                     *  @param	map (Google Map object)
                     *  @return	n/a
                     */

                    function add_marker( $marker, map ) {

                      // var
                      var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

                      // create marker
                      var marker = new google.maps.Marker({
                        position	: latlng,
                        map			: map
                      });

                      // add to array
                      map.markers.push( marker );

                      // if marker contains HTML, add it to an infoWindow
                      if( $marker.html() )
                      {
                        // create info window
                        var infowindow = new google.maps.InfoWindow({
                          content		: $marker.html()
                        });

                        // show info window when marker is clicked
                        google.maps.event.addListener(marker, 'click', function() {

                          infowindow.open( map, marker );

                        });
                      }

                    }

                    /*
                     *  center_map
                     *
                     *  This function will center the map, showing all markers attached to this map
                     *
                     *  @type	function
                     *  @date	8/11/2013
                     *  @since	4.3.0
                     *
                     *  @param	map (Google Map object)
                     *  @return	n/a
                     */

                    function center_map( map ) {

                      // vars
                      var bounds = new google.maps.LatLngBounds();

                      // loop through all markers and create bounds
                      $.each( map.markers, function( i, marker ){

                        var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

                        bounds.extend( latlng );

                      });

                      // only 1 marker?
                      if( map.markers.length == 1 )
                      {
                        // set center of map
                        map.setCenter( bounds.getCenter() );
                        map.setZoom( 14 );
                      }
                      else
                      {
                        // fit to bounds
                        map.fitBounds( bounds );
                      }

                    }

                    /*
                     *  document ready
                     *
                     *  This function will render each map when the document is ready (page has loaded)
                     *
                     *  @type	function
                     *  @date	8/11/2013
                     *  @since	5.0.0
                     *
                     *  @param	n/a
                     *  @return	n/a
                     */

                    $(document).ready(function(){

                      $('.acf-map').each(function(){

                        render_map( $(this) );

                      });

                    });

                  })(jQuery);
                </script>

                <?php

                $location = get_field('contact_map');

                if( !empty($location) ):
                  ?>
                  <div class="acf-map">
                    <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                  </div>
                <?php endif; ?>


              </div>
           </div>



		  <!--</div>-->
          <?php } ?>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
