<?php



  get_header();

  function getParent( $data )
  {

    $i            = 0;
    $data         = $data[0];

    while ( $i <= 1)
    {
    
      if ( $data->parent != 0 )
      {

        $data   = get_term_by( 'id', $data->parent, 'visa_type' );

      }
      else
      {

        $i++;

      }

    }

    return $data;

  }

  $current_term = wp_get_post_terms( $post->ID, 'visa_type' );
  $parent_term  = getParent( $current_term );




$featured_images  = '';

      if( class_exists('Dynamic_Featured_Image') ) {
         global $dynamic_featured_image;
         $featured_images = $dynamic_featured_image->get_featured_images( );

         //You can now loop through the image to display them as required
     }

?>
<div class="container main-head-img">
  <div class="col-lg-8 page-banner" style="background: url(<?php echo $featured_images[0]['full'];?>);"></div>
  <div class="col-lg-4 col-sm-12 sidebar">
    <?php get_template_part('form'); ?>
  </div>
</div>
<div class="container">
  <div valign="top" class="right-con-col">
    <?php while ( have_posts() ) : the_post(); 
      get_template_part( 'content', get_post_format() ); ?>
    <!-- <img width="800" src="http://immigration-training.com/wp-content/themes/GM/images/visa.jpg"> -->
    <?php

      
      /*echo "<pre>";
      print_r($featured_images);
      echo "</pre>";*/
    ?>
      <!-- <img width="800" src="<?php echo $featured_images[0]['full'];?>"> -->
    
      <div class="entry-content">
        <h2><?php the_title( );?></h2>
        <?php the_content(); ?>
      </div> 
      <div class="buttion assessment-btn" style="float:left;"><a href="?page_id=811">Start Your Free Visa Assessment</a></div>
    <?php endwhile; ?>

<div class="relatedposts">
    <h3>Related posts</h3>
    <?php

        $terms        = wp_get_post_terms( $post->ID, 'visa_type' );
        $catSlug   = array();

        if ( sizeof( $terms ) == 1 ) {

          $catSlug  = $terms[0]->slug;

        } else {

          foreach ( $terms as  $data ) {
            
            $catSlug[]   = $data->slug;

          }

        }

        // $parent_data  = get_term_by( 'slug', $_GET['visa_type'], 'visa_type' );
        $query      = new WP_Query( 'post_type=visa&visa_type=' . $catSlug );
 
        while( $query->have_posts() ) {
            $query->the_post();
        ?>
 
        <div class="relatedthumb">
            <a rel="external" href="<? the_permalink()?>"><?php the_post_thumbnail(); ?><br />
            <h5><?php echo substr(the_title('', '', FALSE), 0, 40); ?></h5><br />
            </a>
        </div>
 
        <?php }
        wp_reset_query();
        ?>
    </div>


  </div>
  <div class="left-cat-col">
    <div valign="top" class="left-cat-col-1"> 
      <h3 class="bs-callout">
        <span><?php echo $parent_term->name; ?> visa</span>
      </h3>
      <div class="widget widget_recent_entries" id="category-posts-">
        <div class="widget-content">
           <?php

                $sub_terms_list     = get_term_children( $parent_term->term_id, 'visa_type' );

                foreach ( $sub_terms_list as $term_id )
                {

                  $term_data  = get_term_by( 'term_id', $term_id, 'visa_type' );

            ?>
            <div class="li-list">
              <a href="<?php echo get_term_link( $term_data, 'visa_type' ); ?>?visa-post=true"><?php echo $term_data->name ?></a>
            </div>
            <?php
                }
            ?>         
        </div>
      </div>
    </div>
    <div class="left-cat-col-2">
      <h3 class="bs-callout"><span>Why use Global- migrate</span></h3>
      <li class="li-list-us">
        <span>OISC, MARA and ICCRC Accredited Consultants </span>
      </li>
      <li class="li-list-us">
        <span>Established Immigration specialists </span>
      </li>
      <li class="li-list-us">
        <span>Ensure compliance with legal and other applicable standards</span>
      </li>
      <li class="li-list-us">
        <span>Educated and Trained staff to deal on your behalf</span>
      </li>
      <li class="li-list-us">
        <span>Over 10,000 Successful Applications </span>
      </li>
      <li class="li-list-us">
        <span>Highest Success Rate in the Industry</span>
      </li>
      <li class="li-list-us">
        <span>Complete Immigration solutions</span>
      </li>
      <li class="li-list-us">
        <span>Dedicated Support with 24 Hour emergency line</span>
      </li>
    </div>
 
  </div> 

</div>

<?php get_footer(); ?>