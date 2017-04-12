<?php
/**
* Template Name: ACCRIDITATIONS PAGE
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
		query_posts('post_type=Accriditation&posts_per_page=20');
		
		if (have_posts()) { while (have_posts()) { the_post(); ?>
	<div class="accriditation-heading"><?php the_title();?></div>
	<div class="accriditation-posts">
			

				<div class="accriditation-featur-img">
					<?php the_post_thumbnail();?>
				</div>
				<div class="accriditation-content">
					<?php the_content(); ?>
					<div class="buttion"><a href="#">Start Your Free Visa Assessment</a></div>
				</div>
	  		
	</div>
	<?php } }
			wp_reset_query();
	?>

</div>


<?php
get_footer();
?>