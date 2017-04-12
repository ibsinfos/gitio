<?php
/**
* Template Name: Why us
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
	
	<div class="whyus-posts">
		<?php
			query_posts('post_type=whyus&posts_per_page=20');
			$i = 0;
			if (have_posts()) { while (have_posts()) { the_post(); 
			$i++;
			$style = '';
			if ($i == 2 or $i == 4 or $i == 6 or $i == 8 ) {
				$style = 'background:#e7e7e7;';
			}
		?>	
				<div class="why-post">
					<div class="whyus-featur-img">
						<?php the_post_thumbnail();?>
					</div>
					<div class="whyus-content" style="<?php echo $style;?>">
						<a href="">
						<h3><?php the_title();?></h3>
						<p><?php the_content(); ?></p>
						</a>
					</div>
				</div>
	  			
	  		<?php } }
			wp_reset_query();
		?>
	</div>

</div>


<?php
get_footer();
?>