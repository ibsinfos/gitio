<!DOCTYPE html>
<html lang="en">
	<head>
	<?php global $global_options; ?>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
	
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<script src='https://www.google.com/recaptcha/api.js'></script>
		<link href="<?php echo bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo bloginfo('template_directory'); ?>/css/styles.css" rel="stylesheet">
		<link href="<?php echo bloginfo('template_directory'); ?>/css/font-awesome.min.css" rel="stylesheet">
		<?php 
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
			
			$url = $thumb['0'];
			$GLOBALS['thumb_url'] =  $url;

			$data_contrey 	= get_terms( 'visa_type', 'orderby=count&hide_empty=0&child_of=0' );
				
			// echo '<pre>';
			// print_r( $data_contrey );
			// echo '</pre>';
		?>

<style type="text/css">

.acf-map {
	width: 100%;
	height: 110px;
	border: #ccc solid 1px;
	margin: 10px 0;
}

</style>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>

    <script type="text/javascript">
      function ChangeUrl(page, url) {
          if (typeof (history.pushState) != "undefined") {
              var obj = { Page: page, Url: url };
              history.pushState(obj, obj.Page, obj.Url);
          } else {
              //alert("Browser does not support HTML5.");
          }
        }
    </script>
<?php if ( is_page(310) ) : ?>
<style type="text/css">
	.assessment-btn{
		display: none !important;
	}
</style>
<?php endif; ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-83808135-1', 'global-migrate.ae');
  ga('require', 'displayfeatures');
  ga('require', 'linkid');
  ga('send', 'pageview');

</script>


<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"5225048"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script><noscript><img src="//bat.bing.com/action/0?ti=5225048&Ver=2" height="0" width="0" style="display:none; visibility: hidden;" /></noscript>

<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php wp_head(); ?>

</head>
	<body>

<body onload="_googWcmGet('number', '+44 (0)2079934762')">
<!--
<span class="number">+44 (0)2079934762</span>

</body>
-->

	<div class="link_img">
		<button type="button" class="right-side" data-toggle="modal" data-target=".bs-example-modal-sm">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/images/enquire.png">
		</button>
		<p><a href="#theworld"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/whyusesglobal.jpg"></a><br> 
		<div id="slider">
	
		<div class="item" style="position: absolute; top: 0px; left: 0px; display: block; z-index: 3; opacity: 1; width: 121px; height: 20px; background-color: rgb(0, 0, 0);">
			   <img src="<?php bloginfo('stylesheet_directory'); ?>/images/ourpartner2.jpg" width="121" height="417" u="image">
			
			</div> 
			<div class="item" style="position: absolute; top: 0px; left: 0px; display: none; z-index: 2; opacity: 0; width: 121px; height: 20px; background-color: rgb(0, 0, 0);">
		      <img src="<?php bloginfo('stylesheet_directory'); ?>/images/ourpartners.jpg" width="121" height="" u="image">
			
			</div> 
			
	</div>
</div>
<div class="left-image">
	
	<img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/images/no1.jpg">
</div>

<style type="text/css" media="screen">
	.right-side{
		background-color: transparent;
		border: none;
	}
</style>
        <script type="text/javascript" src="http://immigration-training.com/wp-content/themes/GM/js/jquery-1.9.1.min.js"></script>
        
        <!-- use jssor.slider.mini.js (40KB) instead for release -->
        <!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
      		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
			</script>
			<script src="http://malsup.github.io/jquery.cycle.all.js">
			</script>
			<script>
			
				$('#slider').cycle ({
				speed:900,
				timeout:3000
				
				
				});
			</script>
     

		<div class="navbar navbar-default top-nav">
			<div class="container">
				<div class="row">
    				<div class="col-lg-5 left-top">
    					<!--<img class="no1-img" style="max-height: 35px;" src="<?php echo $global_options['header_image_1']; ?>">-->
    				</div>
    				<div class="col-lg-7">
						<ul class="nav navbar-nav social-icone">
							<li>
								<a href="<?php echo $global_options['facebook']; ?>">
									<img src="<?php echo bloginfo('template_directory'); ?>/images/fb_header.png">
								</a>
							</li> 
							<li>
								<a href="<?php echo $global_options['linked_in']; ?>">
									<img src="<?php echo bloginfo('template_directory'); ?>/images/in_header.png">
								</a>
							</li>
							<li>
								<a href="<?php echo $global_options['twitter']; ?>">
									<img src="<?php echo bloginfo('template_directory'); ?>/images/twitter_header.png">
								</a>
							</li>
						</ul>
					<!--	<a href="http://global-migrate.ae/?page_id=1576" class="login-txt">Client Login</a> -->
						<a href="http://global-migrate.ae/?page_id=1587" class="login-txt">Privacy and Refund Policy</a>
    					<a href="http://global-migrate.ae/?page_id=1585" class="login-txt">Terms and Conditions</a>
                        <a href="http://global-migrate.ae/?page_id=1583" class="login-txt">Pricing</a>
    				</div>
    			</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<a class="logo" href="<?php echo home_url(); ?>"><img style="max-height: 100px;" src="<?php echo $global_options['site_logo']; ?>"></a>
				</div>
				<div class="col-md-10">
					<div class="col-md-7 col-sm-6">
						<img class="trusted" src="<?php echo $global_options['header_image_2']; ?>">
						<!-- <a href="https://repdigger.com/reviews/global-migrate"><img src="https://repdigger.com/badges/repdigger-120x90-green.png" width="120" height="90" alt="GLOBAL MIGRATE certified by RepDigger" title="GLOBAL MIGRATE certified by RepDigger"></a> -->
						<img src="<?php echo bloginfo('template_directory'); ?>/images/nofee.png" width="120" height="90" alt="GLOBAL MIGRATE certified by RepDigger" title="GLOBAL MIGRATE certified by RepDigger">
					</div>
					<div class="col-md-5 col-sm-6">
						<div class="col-md-12 flags">
							<ul class="header-data">
								<li>
									<a style=" text-decoration:none;color: #65AEF0;" href="tel:<?php echo $global_options['phone_number']; ?>"><?php echo $global_options['phone_number']; ?></a>
								</li>
								<li>
									<?php echo $global_options['email_address']; ?>
								</li>
								<li>
									<ul>
									<?php

										foreach ( $data_contrey as $value )
										{

											if ( $value->parent == 0 )
											{

									?>
										<li>
											<a href="<?php echo get_term_link( $value ) ?>">
												<?php echo s8_taxonomy_image( $value, 'full' ); ?>
											</a>
										</li>
									<?php

											}

										}

									?>
									</ul>
								</li>
							</ul>
						</div>
						<!--

						my addition in code
						-->

					<!-- 	<div>
							<img style="max-height: 100px;" src=""></a>
						</div> -->

					</div>
				</div>
			</div>
		</div>

		<!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="">Main Menu</a>
        </div> 

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="navbar navbar-default collapse navbar-collapse" id="bs-example-navbar-collapse-1">


			<?php

				$defaults = array(
					'theme_location'  => 'header-menu',
					'menu'            => '',
					'container'       => 'div',
					'container_class' => 'container',
					'container_id'    => '',
					'menu_class'      => 'nav navbar-nav',
					'menu_id'         => '',
					'echo'            => true,
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => ''
				);

				wp_nav_menu( $defaults );

			?>
		</div>
		