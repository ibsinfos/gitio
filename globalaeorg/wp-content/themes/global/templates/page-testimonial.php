<?php
/**
* Template Name: Testimonial Page
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
	<?php echo do_shortcode('[testimonial_rotator id=72 format="list"]');?>
</div>

<?php
get_footer();
?>