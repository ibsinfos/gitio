<?php
/**
 * Theme lists
 *
 * @package WordPress
 * @subpackage TRANSLANG
 * @since TRANSLANG 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }



// Return numbers range
if ( !function_exists( 'translang_get_list_range' ) ) {
	function translang_get_list_range($from=1, $to=2, $prepend_inherit=false) {
		$list = array();
		for ($i=$from; $i<=$to; $i++)
			$list[$i] = $i;
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}



// Return styles list
if ( !function_exists( 'translang_get_list_styles' ) ) {
	function translang_get_list_styles($from=1, $to=2, $prepend_inherit=false) {
		$list = array();
		for ($i=$from; $i<=$to; $i++)
			$list[$i] = sprintf(esc_html__('Style %d', 'translang'), $i);
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}

// Return list with 'Yes' and 'No' items
if ( !function_exists( 'translang_get_list_yesno' ) ) {
	function translang_get_list_yesno($prepend_inherit=false) {
		$list = array(
			"yes"	=> esc_html__("Yes", 'translang'),
			"no"	=> esc_html__("No", 'translang')
		);
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}

// Return list with 'On' and 'Of' items
if ( !function_exists( 'translang_get_list_onoff' ) ) {
	function translang_get_list_onoff($prepend_inherit=false) {
		$list = array(
			"on"	=> esc_html__("On", 'translang'),
			"off"	=> esc_html__("Off", 'translang')
		);
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}

// Return list with 'Show' and 'Hide' items
if ( !function_exists( 'translang_get_list_showhide' ) ) {
	function translang_get_list_showhide($prepend_inherit=false) {
		$list = array(
			"show" => esc_html__("Show", 'translang'),
			"hide" => esc_html__("Hide", 'translang')
		);
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}

// Return list with 'Horizontal' and 'Vertical' items
if ( !function_exists( 'translang_get_list_directions' ) ) {
	function translang_get_list_directions($prepend_inherit=false) {
		$list = array(
			"horizontal" => esc_html__("Horizontal", 'translang'),
			"vertical"   => esc_html__("Vertical", 'translang')
		);
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}

// Return custom sidebars list, prepended inherit and main sidebars item (if need)
if ( !function_exists( 'translang_get_list_sidebars' ) ) {
	function translang_get_list_sidebars($prepend_inherit=false, $add_hide=false) {
		if (($list = translang_storage_get('list_sidebars'))=='') {
			global $wp_registered_sidebars;
			$list = array();
			if (is_array($wp_registered_sidebars)) {
				foreach ( $wp_registered_sidebars as $k => $v ) {
					$list[$v['id']] = $v['name'];
				}
			}
			translang_storage_set('list_sidebars', $list);
		}
		if ($add_hide) $list = translang_array_merge(array('hide' => esc_html__("- Select widgets -", 'translang')), $list);
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}

// Return sidebars positions
if ( !function_exists( 'translang_get_list_sidebars_positions' ) ) {
	function translang_get_list_sidebars_positions($prepend_inherit=false) {
		$list = array(
			'left'  => esc_html__('Left',  'translang'),
			'right' => esc_html__('Right', 'translang')
		);
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}

// Return header styles
if ( !function_exists( 'translang_get_list_header_styles' ) ) {
	function translang_get_list_header_styles($prepend_inherit=false) {
		static $list = false;
		if (!$list) {
			$list = apply_filters('translang_filter_list_header_styles', array(
																		'header-default' => esc_html__('Default Header', 'translang')
																		)
								);
		}
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}

// Return header positions
if ( !function_exists( 'translang_get_list_header_positions' ) ) {
	function translang_get_list_header_positions($prepend_inherit=false) {
		$list = array(
			'default' => esc_html__('Default','translang'),
			'over' => esc_html__('Over',	'translang'),
			'under' => esc_html__('Under',	'translang')
		);
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}

// Return footer styles
if ( !function_exists( 'translang_get_list_footer_styles' ) ) {
	function translang_get_list_footer_styles($prepend_inherit=false) {
		static $list = false;
		if (!$list) {
			$list = apply_filters('translang_filter_list_footer_styles', array(
																		'footer-default' => esc_html__('Default Footer', 'translang')
																		)
								);
		}
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}

// Return blog styles list, prepended inherit
if ( !function_exists( 'translang_get_list_blog_styles' ) ) {
	function translang_get_list_blog_styles($prepend_inherit=false) {
		$list = apply_filters('translang_filter_list_blog_styles', array(
			'excerpt'	=> esc_html__('Excerpt','translang'),
			'classic_2'	=> esc_html__('Classic /2 columns/',	'translang'),
			'classic_3'	=> esc_html__('Classic /3 columns/',	'translang'),
			'masonry_2'	=> esc_html__('Masonry /2 columns/',	'translang'),
			'masonry_3'	=> esc_html__('Masonry /3 columns/',	'translang'),
			'portfolio_2' => esc_html__('Portfolio /2 columns/','translang'),
			'portfolio_3' => esc_html__('Portfolio /3 columns/','translang'),
			'portfolio_4' => esc_html__('Portfolio /4 columns/','translang'),
			'gallery_2' => esc_html__('Gallery /2 columns/',	'translang'),
			'gallery_3' => esc_html__('Gallery /3 columns/',	'translang'),
			'gallery_4' => esc_html__('Gallery /4 columns/',	'translang'),
			'chess_1'	=> esc_html__('Chess /2 column/',		'translang'),
			'chess_2'	=> esc_html__('Chess /4 columns/',		'translang'),
			'chess_3'	=> esc_html__('Chess /6 columns/',		'translang')
			)
		);
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}


// Return list of categories
if ( !function_exists( 'translang_get_list_categories' ) ) {
	function translang_get_list_categories($prepend_inherit=false) {
		if (($list = translang_storage_get('list_categories'))=='') {
			$list = array();
			$args = array(
				'type'                     => 'post',
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 0,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => 'category',
				'pad_counts'               => false );
			$taxonomies = get_categories( $args );
			if (is_array($taxonomies) && count($taxonomies) > 0) {
				foreach ($taxonomies as $cat) {
					$list[$cat->term_id] = $cat->name;
				}
			}
			translang_storage_set('list_categories', $list);
		}
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}


// Return list of taxonomies
if ( !function_exists( 'translang_get_list_terms' ) ) {
	function translang_get_list_terms($prepend_inherit=false, $taxonomy='category') {
		if (($list = translang_storage_get('list_taxonomies_'.($taxonomy)))=='') {
			$list = array();
			$args = array(
				'child_of'                 => 0,
				'parent'                   => '',
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 0,
				'hierarchical'             => 1,
				'exclude'                  => '',
				'include'                  => '',
				'number'                   => '',
				'taxonomy'                 => $taxonomy,
				'pad_counts'               => false );
			$taxonomies = get_terms( $taxonomy, $args );
			if (is_array($taxonomies) && count($taxonomies) > 0) {
				foreach ($taxonomies as $cat) {
					$list[$cat->term_id] = $cat->name;	// . ($taxonomy!='category' ? ' /'.($cat->taxonomy).'/' : '');
				}
			}
			translang_storage_set('list_taxonomies_'.($taxonomy), $list);
		}
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}

// Return list of post's types
if ( !function_exists( 'translang_get_list_posts_types' ) ) {
	function translang_get_list_posts_types($prepend_inherit=false) {
		if (($list = translang_storage_get('list_posts_types'))=='') {
			$list = apply_filters('translang_filter_list_posts_types', array(
				'post' => esc_html('Post', 'translang')
			));
			translang_storage_set('list_posts_types', $list);
		}
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}


// Return list post items from any post type and taxonomy
if ( !function_exists( 'translang_get_list_posts' ) ) {
	function translang_get_list_posts($prepend_inherit=false, $opt=array()) {
		$opt = array_merge(array(
			'post_type'			=> 'post',
			'post_status'		=> 'publish',
			'post_parent'		=> '',
			'taxonomy'			=> 'category',
			'taxonomy_value'	=> '',
			'meta_key'			=> '',
			'meta_value'		=> '',
			'meta_compare'		=> '',
			'posts_per_page'	=> -1,
			'orderby'			=> 'post_date',
			'order'				=> 'desc',
			'not_selected'		=> true,
			'return'			=> 'id'
			), is_array($opt) ? $opt : array('post_type'=>$opt));

		$hash = 'list_posts'
				. '_' . (is_array($opt['post_type']) ? join('_', $opt['post_type']) : $opt['post_type'])
				. '_' . (is_array($opt['post_parent']) ? join('_', $opt['post_parent']) : $opt['post_parent'])
				. '_' . ($opt['taxonomy'])
				. '_' . (is_array($opt['taxonomy_value']) ? join('_', $opt['taxonomy_value']) : $opt['taxonomy_value'])
				. '_' . ($opt['meta_key'])
				. '_' . ($opt['meta_compare'])
				. '_' . ($opt['meta_value'])
				. '_' . ($opt['orderby'])
				. '_' . ($opt['order'])
				. '_' . ($opt['return'])
				. '_' . ($opt['posts_per_page']);
		if (($list = translang_storage_get($hash))=='') {
			$list = array();
			if ($opt['not_selected']!==false) $list['none'] = $opt['not_selected']===true 
																				? esc_html__("- Not selected -", 'translang')
																				: $opt['not_selected'];
			$args = array(
				'post_type' => $opt['post_type'],
				'post_status' => $opt['post_status'],
				'posts_per_page' => $opt['posts_per_page'],
				'ignore_sticky_posts' => true,
				'orderby'	=> $opt['orderby'],
				'order'		=> $opt['order']
			);
			if (!empty($opt['post_parent'])) {
				if (is_array($opt['post_parent']))
					$args['post_parent__in'] = $opt['post_parent'];
				else
					$args['post_parent'] = $opt['post_parent'];
			}
			if (!empty($opt['taxonomy_value'])) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => $opt['taxonomy'],
						'field' => is_array($opt['taxonomy_value']) 
										? ((int) $opt['taxonomy_value'][0] > 0  ? 'term_taxonomy_id' : 'slug')
										: ((int) $opt['taxonomy_value'] > 0  ? 'term_taxonomy_id' : 'slug'),
						'terms' => is_array($opt['taxonomy_value'])
										? $opt['taxonomy_value'] 
										: ((int) $opt['taxonomy_value'] > 0 ? (int) $opt['taxonomy_value'] : $opt['taxonomy_value'] ) 
					)
				);
			}
			if (!empty($opt['meta_key'])) {
				$args['meta_key'] = $opt['meta_key'];
			}
			if (!empty($opt['meta_value'])) {
				$args['meta_value'] = $opt['meta_value'];
			}
			if (!empty($opt['meta_compare'])) {
				$args['meta_compare'] = $opt['meta_compare'];
			}
			$posts = get_posts( $args );
			if (is_array($posts) && count($posts) > 0) {
				foreach ($posts as $post) {
					$list[$opt['return']=='id' ? $post->ID : $post->post_title] = $post->post_title;
				}
			}
			translang_storage_set($hash, $list);
		}
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}


// Return list of registered users
if ( !function_exists( 'translang_get_list_users' ) ) {
	function translang_get_list_users($prepend_inherit=false, $roles=array('administrator', 'editor', 'author', 'contributor', 'shop_manager')) {
		if (($list = translang_storage_get('list_users'))=='') {
			$list = array();
			$list['none'] = esc_html__("- Not selected -", 'translang');
			$args = array(
				'orderby'	=> 'display_name',
				'order'		=> 'ASC' );
			$users = get_users( $args );
			if (is_array($users) && count($users) > 0) {
				foreach ($users as $user) {
					$accept = true;
					if (is_array($user->roles)) {
						if (is_array($user->roles) && count($user->roles) > 0) {
							$accept = false;
							foreach ($user->roles as $role) {
								if (in_array($role, $roles)) {
									$accept = true;
									break;
								}
							}
						}
					}
					if ($accept) $list[$user->user_login] = $user->display_name;
				}
			}
			translang_storage_set('list_users', $list);
		}
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}

// Return menus list, prepended inherit
if ( !function_exists( 'translang_get_list_menus' ) ) {
	function translang_get_list_menus($prepend_inherit=false) {
		if (($list = translang_storage_get('list_menus'))=='') {
			$list = array();
			$list['default'] = esc_html__("Default", 'translang');
			$menus = wp_get_nav_menus();
			if (is_array($menus) && count($menus) > 0) {
				foreach ($menus as $menu) {
					$list[$menu->slug] = $menu->name;
				}
			}
			translang_storage_set('list_menus', $list);
		}
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}

// Return iconed classes list
if ( !function_exists( 'translang_get_list_icons' ) ) {
	function translang_get_list_icons($prepend_inherit=false) {
		static $list = false;
		if (!is_array($list)) 
			$list = !is_admin() ? array() : translang_parse_icons_classes(translang_get_file_dir("css/fontello/css/fontello-codes.css"));
		return $prepend_inherit ? translang_array_merge(array('inherit' => esc_html__("Inherit", 'translang')), $list) : $list;
	}
}
?>