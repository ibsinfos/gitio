<?php

	/**
	 * Template Name: Thank You Page
	 * 
	 */

	get_header();

	
?>
<!-- Google Code for Global Migrate Lead Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 859800611;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "C203CLD_324Qo4j-mQM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/859800611/?label=C203CLD_324Qo4j-mQM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>


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
  
  
</div> <!-- /container -->

<?php

	get_footer();