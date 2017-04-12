<div class="container">
	<div class="panel panel-default">
		<div class="panel-body">
			<?php
//var_dump(get_query_var('visa_type'));
				$headerPostTerm 	= '';
				$currentTerm 		= ( isset( $_REQUEST['visa_type'] ) && $_REQUEST['visa_type'] != '' ) ? $_REQUEST['visa_type'] : '';
if($currentTerm=="")
{
$currentTerm = get_query_var('visa_type');
}
				
				if ( is_home() ) {

					$headerPostTerm 	= 'hometop';

				}elseif ( $currentTerm == 'australia-immigration-skilled-visa-australia-consultants' )
				{

					$headerPostTerm 	= 'australia';

				}elseif ( $currentTerm == 'canada-immigration-skilled-visa-canada-consultants' )
				{

					$headerPostTerm 	= 'canada';

				}elseif ( $currentTerm == 'denmark-immigration-denmark-greencard-visa-consultants' )
				{

					$headerPostTerm 	= 'denmark';

				}elseif ( $currentTerm == 'uk-immigration-lawyers-uk-visa-help' )
				{

					$headerPostTerm 	= 'uk';

				}else {

					$headerPostTerm 	= 'hometop';

				}


				$postData 	= new WP_Query( "post_type=afterheader&posts_per_page=1&header_text_type=" . $headerPostTerm );

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
	<ul class="visa-types">
		<?php

			//$parent_data 	= get_term_by( 'slug', $_REQUEST['visa_type'], 'visa_type', 'orderby=count' );
$parent_data 	= get_term_by( 'slug', $currentTerm, 'visa_type', 'orderby=count' );
  			$terms_list 	= get_term_children( $parent_data->term_id, 'visa_type', 'orderby=count' );
  			$i = 0;
  			foreach ( $terms_list as $value ) { 

				

			$data 	= get_term_by( 'id', $value, 'visa_type' );

			$i++;
			$style = ( $i == 2 ) ? 'margin-right: 0' : 'margin-right: 1%;';

			if ( $i == 2 ) $i = 0; 
		?> 
			<div class="type-cat" style="<?php echo $style ?>">
			<a class="category-name" href="<?php echo get_term_link( $data ) ?>&visa-post=true">
			<li>
				<?php echo s8_taxonomy_image( $data, 'full' ); ?>
				<div class="cat-detail">
					<h4><?php echo $data->name; ?></h4>
					<p><?php echo $data->description; ?></p>
					<span href="<?php echo get_term_link( $data ) ?>?visa-post=true">
						Go for it
						<?php //echo s8_taxonomy_image( $parent_data, 'thumbnail' ); ?>
				</span>
				</div>
			</li>
			</a>
			</div>
		<?php

			}

		?>
	</ul>
</div>