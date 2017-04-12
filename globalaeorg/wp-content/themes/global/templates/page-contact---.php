<?php

	/**
	 * Template Name: Contact page
	 * 
	 */

	get_header();

	
?>
<div class="container main-head-img">
  <div class="col-lg-8 page-banner" style="background: url(<?php echo $thumb_url;?>);"></div>
  <div class="col-lg-4 col-sm-12 sidebar">
    <?php get_template_part('form'); ?>
  </div>
</div>
</div>
<div class="container">
  
<?php if (have_posts()) : while (have_posts()) : the_post();

$meta = get_post_meta($post->ID );
$map_data 	= array();
$map_data[] = unserialize( $meta['map_1'][0] );
$map_data[] = unserialize( $meta['map_2'][0] );
$map_data[] = unserialize( $meta['aus_map'][0] );
?>
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
		zoom		: 16,
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
	    map.setZoom( 16 );
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




<div class="col-md-8">
	<div class="row">
		<h4><?php echo $meta['address_title'][0];?></h4>
		<div class="col-md-5">
			<p class="address-pad">
				<i class="fa fa-map-marker"></i><?php echo $meta['address_1'][0];?>
			</p>
			<p class="address-pad">
				<i class="fa fa-phone"></i><?php echo $meta['phone'][0];?>
			</p>
			<p class="address-pad">
				<i class="fa fa-fax"></i><?php echo $meta['fax'][0];?>
			</p>
			<p class="address-pad">
				<i class="fa fa-envelope"></i><?php echo $meta['email'][0];?>
			</p>
		</div>
		<div class="col-md-7">
			<div class="acf-map">
				<div class="marker" data-lat="<?php echo $map_data[0]['lat']; ?>" data-lng="<?php echo $map_data[0]['lng']; ?>"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<h4><?php echo $meta['address_title_2'][0];?></h4>
		<div class="col-md-5">
			<p class="address-pad">
				<i class="fa fa-map-marker"></i><?php echo $meta['address_2'][0];?>
			</p>
			<p class="address-pad">
				<i class="fa fa-phone"></i><?php echo $meta['phone_2'][0];?>
			</p>
			<!-- <p class="address-pad">
				<i class="fa fa-fax"></i><?php echo $meta['fax_2'][0];?>
			</p> -->
			<p class="address-pad">
				<i class="fa fa-envelope"></i><?php echo $meta['email_2'][0];?>
			</p>
		</div>
		<div class="col-md-7">
			<div class="acf-map">
				<div class="marker" data-lat="<?php echo $map_data[1]['lat']; ?>" data-lng="<?php echo $map_data[1]['lng']; ?>"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<h4><?php echo $meta['aus_adress_title'][0];?></h4>
		<div class="col-md-5">
			<p class="address-pad">
				<i class="fa fa-map-marker"></i><?php echo $meta['aus_adsress'][0];?>
			</p>
			<p class="address-pad">
				<i class="fa fa-phone"></i><?php echo $meta['aus_phone'][0];?>
			</p>
			<!-- <p class="address-pad">
				<i class="fa fa-fax"></i><?php echo $meta['aus_fax'][0];?>
			</p> -->
			<p class="address-pad">
				<i class="fa fa-envelope"></i><?php echo $meta['aus_email'][0];?>
			</p>
		</div>
		<div class="col-md-7">
			<div class="acf-map">
				<div class="marker" data-lat="<?php echo $map_data[2]['lat']; ?>" data-lng="<?php echo $map_data[2]['lng']; ?>"></div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-4">
	<div class="contact-form">
		<div class="contacthead">Contact Us</div>
		<?php echo do_shortcode('[contact-form-7 id="66" title="Contact form 1"]');?>
	</div>
</div>



<?php the_content(); ?>
<?php endwhile; endif; ?>
  
  
</div> <!-- /container -->
<?php

	get_footer();