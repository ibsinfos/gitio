

<div class="container">
  <button type="button" class="buttion assessment-btn" data-toggle="modal" data-target=".bs-example-modal-sm">Start Your Free Visa Assessment</button>
	<div class="panel panel-default footerpanel">
  		<div class="panel-body">
  		<?php
    		query_posts('post_type=footertext&posts_per_page=1');
    		
    		if (have_posts()) { while (have_posts()) { the_post(); ?>	
      			<?php the_content(); ?>
      		<?php } }
    		wp_reset_query();
		  ?>
  		</div>
  </div>
</div>
<footer>
	
	<div class="top-footer">
		<div class="container">
			<div class="col-md-12 typevisa">
            	<h4 class="headbg">Visa Types</h4>        
            	<div class="col-md-3 col-sm-6 col-xm-12">               
                	<div class="workvisa-inner">                
                    	<h4><a href="?visa_type=australia">Australian Visas</a></h4>    
                    	<?php wp_nav_menu( array( 'theme_location' => 'Australian-menu', 'container_class' => 'menu' ) ); ?>
         			</div>            
        		</div>
        		<div class="col-md-3 col-sm-6 col-xm-12">  
        			<div class="workvisa-inner">                
                    	<h4><a href="?visa_type=uk">UK Immigration</a></h4>    
                    	<?php wp_nav_menu( array( 'theme_location' => 'UKImmigration-menu', 'container_class' => 'menu' ) ); ?>
         			</div>
         		</div>
         		<div class="col-md-3 col-sm-6 col-xm-12">   
         			<div class="workvisa-inner">                
                    	<h4><a href="?visa_type=canada-visa">Canada Immigration</a></h4>    
                    	<?php wp_nav_menu( array( 'theme_location' => 'CanadaImmigration-menu', 'container_class' => 'menu' ) ); ?>
         			</div> 
         		</div>
         		<div class="col-md-3 col-sm-6 col-xm-12">  
         			<div class="workvisa-inner" style="border-right:none;">                
                    	<h4><a href="?visa_type=denmark">Denmark Immigration</a></h4>    
                    	<?php wp_nav_menu( array( 'theme_location' => 'DenmarkImmigration-menu', 'container_class' => 'menu' ) ); ?>
         			</div>
         		</div> 
        	</div>
		</div>
	</div>
	<div class="bottom-footer">
		<div class="container">  
			<div class="col-md-12">              
                <h4 class="whyuse">Why use Global- migrate </h4>        
            </div>          
            <div class="col-md-6 whyuse_txt" style="border-right: 1px solid rgb(255, 255, 255);">               
                <?php dynamic_sidebar( 'sidebar-3' ); ?>   
            </div>            
           
            <div class="col-md-6 whyuse_txt">         
                <?php dynamic_sidebar( 'sidebar-4' ); ?> 
            </div>        
        </div>
	</div>
  <div class="copy_right">
    <p>Copyright &copy; Global Migrate. All Rights Reserved. 
    <!-- | <a href="/privacy-policy/">Privacy Policy</a> - 
    <a href="http://global-migrate.ae/?page_id=1578">Refund policy</a> -->
    <img src="http://global-migrate.ae/wp-content/themes/global/images/logo_visa_mastercard.png" height="30px" />
    </p>
  </div>
</footer>


<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="closes" aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <div class="col-lg-12 sidebar-1" style="float:none;">
        <?php get_template_part('form-popup'); ?>
    </div>
    </div>
  </div>
</div>





<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>

		<?php wp_footer(); ?>
	</body>
</html>