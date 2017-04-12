<?php
/**
* Template Name: SERVICES PAGE
*
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

<div class="container">
  <?php if (have_posts()) : while (have_posts()) : the_post();?>
  <?php the_content(); ?>
  <?php endwhile; endif; ?>
  
  <?php
      query_posts('post_type=services&posts_per_page=20');
      
      if (have_posts()) { while (have_posts()) { the_post(); ?> 
  <div class="services-posts">
    

        <div class="services-featur-img">
          <p class="services-title"><?php the_title();?></p>
          <?php the_post_thumbnail();?>
        </div>
        <div class="services-content">
          <p><?php the_content(); ?></p>
        </div>
  </div>
  <?php } }
    wp_reset_query();
  ?>

</div>


<?php
get_footer();
?>