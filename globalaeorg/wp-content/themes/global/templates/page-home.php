<?php

	/**
	 * Template Name: Home page
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
  
	<div class="panel panel-default">
  		<div class="panel-body">
  		  <?php

        $headerPostTerm   = '';
        $currentTerm    = ( isset( $_REQUEST['visa_type'] ) && $_REQUEST['visa_type'] != '' ) ? $_REQUEST['visa_type'] : '';

        if ( is_home() ) {

          $headerPostTerm   = 'hometop';

        }elseif ( $currentTerm == 'australia-immigration-skilled-visa-australia-consultants' )
        {

          $headerPostTerm   = 'australia';

        }elseif ( $currentTerm == 'canada-immigration-skilled-visa-canada-consultants' )
        {

          $headerPostTerm   = 'canada';

        }elseif ( $currentTerm == 'denmark-immigration-denmark-greencard-visa-consultants' )
        {

          $headerPostTerm   = 'denmark';

        }elseif ( $currentTerm == 'uk-immigration-lawyers-uk-visa-help' )
        {

          $headerPostTerm   = 'uk';

        }


        $postData   = new WP_Query( "post_type=afterheader&posts_per_page=1&header_text_type=" . $headerPostTerm );

        /*echo '<pre>';
        print_r( $postData->posts );
        echo '</pre>';*/

        while ( $postData->have_posts() ) : $postData->the_post();          
          the_content( );
        endwhile;
        wp_reset_query();
      ?>
      </div>
  </div>
  <ul class="main_cat">
    <?php
      
      $loop = query_posts('post_type=home&posts_per_page=6');
      // if (have_posts()) { while (have_posts()) { the_post();

      $i = 0;
      foreach ($loop as $key => $post) {
      $i++;
      $homeMeta     = get_post_meta( $post->ID );
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
      $url = $thumb['0']; 
      $url     = ( $url == '' ) ? '#' : $url;
      $homeMeta     = ( $homeMeta == '' ) ? '#' : $homeMeta;
      $style = ( $i == 2 ) ? 'margin-left: 2%;' : 'margin-left: 0%;';
      if ($i == 2) $i = 0;

      ?> 
    <a href="<?php echo $homeMeta['page_url'][0];?>" >
    <li  class="grid-service" style="background: url(<?php echo $url; ?>) repeat scroll 0 0; <?php echo $style ?>">

      <h4><?php the_title();?></h4>
      <p><?php echo $post->post_content;?></p>
      <span  class="page_link">go for it!</span>
    </li>
    </a>

    
    
    <?php } 
    ?>
</ul>


  <hr>
  
  
  
</div> <!-- /container -->

<?php

	get_footer();
?>
