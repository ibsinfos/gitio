<style>
@media only screen and (min-width : 305px) and (max-width : 520px) {
.category {
    background-position: right bottom !important;
    background-repeat: no-repeat !important;
    border: 1px solid #cccccc;
    border-radius: 10px;
    float: left;
    height: 275px !important;
    margin-bottom: 10px;
    width: 100%;
}
.category.type-post > a{
	margin-bottom: 2px !important;
}
.buttion {
    background: rgb(122, 202, 65) none repeat scroll 0 0;
    border-radius: 5px;
    clear: both;
    color: white;
    float: right;
    font-size: 16px !important;
    margin: 0;
    padding-bottom: 5px;
    padding-right: 9px;
    padding-top: 5px;
    text-indent: 10px;
    width: auto;
}

}
</style>

<div class="container">
	<div class="panel panel-default">
  		<div class="panel-body">

As one of the most successful immigration consultancies in the world, Emigration-Expert has helped individuals, families, and corporate clients with their visa applications for many years. Our consultants are legally trained and keep up to date on the ever-changing immigration rules for the United Kingdom, Canada, Australia, and Denmark.Emigration-Expert is considered the expert of experts and whether you are a student or a high net worth investor, we aim to make your immigration dreams come true. We provide you with unrivaled service throughout the visa process. This is why most of our customers say they would recommend us. 
  		<?php 
          // query_posts('post_type=afterheader&post_per_page=1' );
          // if (have_posts()) { while (have_posts()) { the_post();
          //   the_content();
          // } }
          // wp_reset_query();
        ?>
  		</div>
  	</div>
  	<ul class="visa-types">
  		<?php

if(isset($_GET['visa_type']))
{
	$newvisatype=$_GET['visa_type'];
}
else
{
	$newvisatype=get_query_var('visa_type');
}


    		$parent_data 	= get_term_by( 'slug', $newvisatype, 'visa_type' );

  			$query 			= new WP_Query( 'post_type=visa&visa_type=' . $newvisatype );
			

      		if ($parent_data->slug == 'employment-visa') {
      		?>
				<div class="type-post" style="margin-left: 0%;">
		  		 <a class="category" href="?visa_type=express-entry-program&visa-post=true" style="background: url(http://global-migrate.com/wp-content/uploads/2015/06/8.jpg);">
				    <li>
					<h4>Express Entry Program</h4>
					<p>Express Entry Prgram In Canada.</p>
					<span href="<?php echo $data->guid; ?>">Read More</span>
					</li>
		        </a>
		        <button type="button" class="buttion full-post assessment-btn" data-toggle="modal" data-target=".bs-example-modal-sm">Start Your Free Visa Assessment</button>
		        </div>
		        <?php
		        	$i = 0;
					foreach ( $query->posts as $data )
		  			{
					$i++;
					$style = ( $i == 1 ) ? 'margin-left: 1%;' : 'margin-left: 0%;';
		      		if ($i == 2) $i = 0;
		        ?>
      			<div class="type-post" style="<?php echo $style ?>">
		  		 <a class="category" href="<?php echo $data->guid; ?>" style="background: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $data->ID ) ); ?>);">
				    <li>
	    			<?php // echo s8_taxonomy_image( $data, 'full' ); ?>
					<h4><?php echo $data->post_title; ?></h4>
					<p><?php echo $data->post_excerpt; ?></p>
					<span href="<?php echo $data->guid; ?>">Read More</span>
					</li>
		        </a>
		        <button type="button" class="buttion full-post assessment-btn" data-toggle="modal" data-target=".bs-example-modal-sm">Start Your Free Visa Assessment</button>
		        </div>
      	<?php
      		}
      		}else {
  		       	$i = 0;
				foreach ( $query->posts as $data )
	  			{
				$i++;
				$style = ( $i == 2 ) ? 'margin-left: 1%;' : 'margin-left: 0%;';
	      		if ($i == 2) $i = 0;
	        
  		?>

        <div class="type-post" style="<?php echo $style ?>">
  		  <a class="category" href="<?php echo $data->guid; ?>" style="background: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $data->ID ) ); ?>);">
		    <li>
    			<?php // echo s8_taxonomy_image( $data, 'full' ); ?>
				<h4><?php echo $data->post_title; ?></h4>
				<p><?php echo $data->post_excerpt; ?></p>
				<span href="<?php echo $data->guid; ?>">Read More</span>
				</li>
        </a>
        <button type="button" class="buttion full-post assessment-btn" data-toggle="modal" data-target=".bs-example-modal-sm">Start Your Free Visa Assessment</button>
        </div>
		<?php
			}

			}

		?>
	</ul>

</div>