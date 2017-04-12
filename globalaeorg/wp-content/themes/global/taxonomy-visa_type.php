<?php

  get_header();

  $cat_id;

    /*function get_term_p_id( $slug )
    {

        $data = get_term_by( 'slug', $slug, 'visa_type' );

        if ( $data->parent != 0 )
        {

            $sub_data = get_term_by( 'id', $data->parent, 'visa_type' );

            get_term_p_id( $data->slug );

        } else {

            return $data->term_id;

        }

    }*/
    $cat_id = NULL;

  if ( isset( $_REQUEST['visa_type'] ) )
  {
  		$visa_type= $_REQUEST['visa_type'];
  }
  else
  {
  		$visa_type= get_query_var('visa_type');
  }

    
    if ( isset( $visa_type ) )
    {

        /*$cat_id     = get_term_p_id( $_REQUEST['visa_type'] );*/

        $i      = 0;




        $data   = get_term_by( 'slug', $visa_type, 'visa_type' );

        while ( $i <= 1) {

            if ( $data->parent != 0 )
            {

                $data   = get_term_by( 'id', $data->parent, 'visa_type' );

            } else {

                $i++;

            }

        }

        $cat_id     = $data->term_id;

    }

  if ( $cat_id == 7 )
  {

  	$slider_id 	= 2;

  }
  else if ( $cat_id == 8 )
  {

  	$slider_id 	= 4;

  }
   else if ( $cat_id == 10 )
  {

  	$slider_id 	= 5;

  }
   else if ( $cat_id == 9 )
  {

  	$slider_id 	= 6;

  }
  else if ( $cat_id == 11 )
  {

    $slider_id  = 7;

  }
  else if ( $cat_id == 12 )
  {

    $slider_id  = 8;

  }

?>
  <div class="container main-head-img">
    <div class="col-lg-8 col-sm-12 page-banner "><?php echo do_shortcode("[huge_it_slider id='". $slider_id ."']"); ?></div>
    <div class="col-lg-4 col-sm-12 sidebar">
      <?php get_template_part('form'); ?>
    </div>
  </div>
</div>
<?php

  if ( isset( $_GET['visa-post'] ) && $_GET['visa-post'] == 'true' )
  { 
    get_template_part( 'content', 'visa-posts' );

  } else {

    get_template_part( 'content', 'visa-types' );

  }

  get_footer();