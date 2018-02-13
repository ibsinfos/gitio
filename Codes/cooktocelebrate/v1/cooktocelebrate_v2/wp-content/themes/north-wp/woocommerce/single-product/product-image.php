<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . $placeholder,
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
	'product-gallery',
	'carousel-container'
) );
?>
<?php 
	$shop_product_lightbox = ot_get_option('shop_product_lightbox', 'lightbox');
	if( $product->has_child() && $product->is_type( 'variable' )) { 
		$available_variations = $product->get_available_variations();
	}
	$attachment_ids = $product->get_gallery_image_ids();
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>
	<div id="product-images" class="carousel slick product-images" data-navigation="true" data-autoplay="false" data-columns="1" data-asnavfor="#product-thumbnails">
	            
			<?php if ( $attachment_ids ) {						
					
					foreach ( $attachment_ids as $attachment_id ) {
						$image_link = wp_get_attachment_url( $attachment_id );
						$image_src_link = wp_get_attachment_image_src($attachment_id,'full');
						$src = wp_get_attachment_image_src( $attachment_id, false, '' );
						$src_small = wp_get_attachment_image_src( $attachment_id,  apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ));
						$image_title = esc_attr( get_the_title( $attachment_id ) );
						$attr = '';
						if (isset($available_variations)) {
							foreach($available_variations as $prod_variation) {
							  if ($src_small[0] == $prod_variation['image']['src']) {
							  	$attr .= implode(',', $prod_variation['attributes']) . ',';
							  }
							}
						}
						$attr = trim($attr, ',');
						?>
							<figure itemprop="image"<?php if ($shop_product_lightbox == 'zoom') { echo ' class="easyzoom"'; } ?> data-variation="<?php echo esc_attr($attr); ?>">

								<a href="<?php echo esc_attr($src[0]); ?>" itemprop="image"<?php if ($shop_product_lightbox == 'lightbox') { echo ' class="fresco" data-fresco-group="product_images" data-fresco-group-options="overflow: true" data-fresco-type="image"'; } ?>>
									<img src="<?php echo esc_attr($src_small[0]); ?>" title="<?php echo esc_attr($image_title); ?>" />
								</a>
							</figure>
						
						<?php
					}
				}
			?>
	</div>
</div>