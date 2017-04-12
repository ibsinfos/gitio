<?php

	# framework

	require get_template_directory() . '/framework/nhp-options.php';

	# theme options values

	$global_options 	= get_option('twenty_eleven');

	class Global_Migrate
	{

		function __construct()
		{

			add_theme_support( 'post-thumbnails' );
			add_action( 'init', array( &$this, 'global_menu' ) );
			add_action( 'init', array( &$this, 'global_footer_text_post_type' ) );
			add_action( 'init', array( &$this, 'global_why_us_post_type' ) );
			add_action( 'init', array( &$this, 'global_accriditation_post_type' ) );
			add_action( 'init', array( &$this, 'global_services_post_type' ) );
			add_action( 'init', array( &$this, 'global_visa_post_type' ) );
			add_action( 'init', array( &$this, 'global_visa_texonomy' ) );
			add_action( 'init', array( &$this, 'global_home_services_post_type' ) );
			add_action( 'init', array( &$this, 'global_toptext_post_type' ) );
			add_action( 'init', array( &$this, 'global_toptext_texonomy' ) );
			add_action( 'widgets_init', array( &$this, 'global_widget_areas' ) );

		}

		public function global_menu()
		{
			
			register_nav_menus(

			    array(
			      'header-menu' => __( 'Header Menu' ),
			      'Australian-menu' => __( 'Australian Menu' ),
			      'UKImmigration-menu' => __( 'UKImmigration Menu' ),
			      'CanadaImmigration-menu' => __( 'CanadaImmigration Menu' ),
			      'DenmarkImmigration-menu' => __( 'DenmarkImmigration Menu' )
			    )

			);

		}

		public function global_footer_text_post_type()
		{

			$labels = array(
				'name'               => _x( 'footer-text', 'post type general name', 'your-plugin-textdomain' ),
				'singular_name'      => _x( 'footer-text', 'post type singular name', 'your-plugin-textdomain' ),
				'menu_name'          => _x( 'footer-text', 'admin menu', 'your-plugin-textdomain' ),
				'name_admin_bar'     => _x( 'footer-text', 'add new on admin bar', 'your-plugin-textdomain' ),
				'add_new'            => _x( 'Add New', 'footer-text', 'your-plugin-textdomain' ),
				'add_new_item'       => __( 'Add New footer-text', 'your-plugin-textdomain' ),
				'new_item'           => __( 'New footer-text', 'your-plugin-textdomain' ),
				'edit_item'          => __( 'Edit footer-text', 'your-plugin-textdomain' ),
				'view_item'          => __( 'View footer-text', 'your-plugin-textdomain' ),
				'all_items'          => __( 'All footer-text', 'your-plugin-textdomain' ),
				'search_items'       => __( 'Search footer-text', 'your-plugin-textdomain' ),
				'parent_item_colon'  => __( 'Parent footer-text:', 'your-plugin-textdomain' ),
				'not_found'          => __( 'No footer-text found.', 'your-plugin-textdomain' ),
				'not_found_in_trash' => __( 'No footer-text found in Trash.', 'your-plugin-textdomain' )
			);

			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'footertext' ,'with_front' => true, 'hierarchical' => true ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
			);

			register_post_type( 'footertext', $args );
			flush_rewrite_rules();

		}

		public function global_why_us_post_type()
		{

			$labels = array(
				'name'               => _x( 'Why us', 'post type general name', 'your-plugin-textdomain' ),
				'singular_name'      => _x( 'Why us', 'post type singular name', 'your-plugin-textdomain' ),
				'menu_name'          => _x( 'Why us', 'admin menu', 'your-plugin-textdomain' ),
				'name_admin_bar'     => _x( 'Why us', 'add new on admin bar', 'your-plugin-textdomain' ),
				'add_new'            => _x( 'Add New', 'Why us', 'your-plugin-textdomain' ),
				'add_new_item'       => __( 'Add New Why us', 'your-plugin-textdomain' ),
				'new_item'           => __( 'New Why us', 'your-plugin-textdomain' ),
				'edit_item'          => __( 'Edit Why us', 'your-plugin-textdomain' ),
				'view_item'          => __( 'View Why us', 'your-plugin-textdomain' ),
				'all_items'          => __( 'All Why us', 'your-plugin-textdomain' ),
				'search_items'       => __( 'Search Why us', 'your-plugin-textdomain' ),
				'parent_item_colon'  => __( 'Parent Why us:', 'your-plugin-textdomain' ),
				'not_found'          => __( 'No Why us found.', 'your-plugin-textdomain' ),
				'not_found_in_trash' => __( 'No Why us found in Trash.', 'your-plugin-textdomain' )
			);

			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'whyus', 'with_front' => true, 'hierarchical' => true  ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
			);

			register_post_type( 'whyus', $args );
			flush_rewrite_rules();

		}

		public function global_accriditation_post_type()
		{

			$labels = array(
				'name'               => _x( 'Accriditations', 'post type general name', 'your-plugin-textdomain' ),
				'singular_name'      => _x( 'Accriditations', 'post type singular name', 'your-plugin-textdomain' ),
				'menu_name'          => _x( 'Accriditations', 'admin menu', 'your-plugin-textdomain' ),
				'name_admin_bar'     => _x( 'Accriditations', 'add new on admin bar', 'your-plugin-textdomain' ),
				'add_new'            => _x( 'Add New', 'Accriditations', 'your-plugin-textdomain' ),
				'add_new_item'       => __( 'Add New Accriditations', 'your-plugin-textdomain' ),
				'new_item'           => __( 'New Accriditations', 'your-plugin-textdomain' ),
				'edit_item'          => __( 'Edit Accriditations', 'your-plugin-textdomain' ),
				'view_item'          => __( 'View Accriditations', 'your-plugin-textdomain' ),
				'all_items'          => __( 'All Accriditations', 'your-plugin-textdomain' ),
				'search_items'       => __( 'Search Accriditations', 'your-plugin-textdomain' ),
				'parent_item_colon'  => __( 'Parent Accriditations:', 'your-plugin-textdomain' ),
				'not_found'          => __( 'No Accriditations found.', 'your-plugin-textdomain' ),
				'not_found_in_trash' => __( 'No Accriditations found in Trash.', 'your-plugin-textdomain' )
			);

			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'Accriditation' ,'with_front' => true, 'hierarchical' => true ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
			);

			register_post_type( 'Accriditation', $args );
			flush_rewrite_rules();

		}

		public function global_services_post_type()
		{

			$labels = array(
				'name'               => _x( 'Services', 'post type general name', 'your-plugin-textdomain' ),
				'singular_name'      => _x( 'Services', 'post type singular name', 'your-plugin-textdomain' ),
				'menu_name'          => _x( 'Services', 'admin menu', 'your-plugin-textdomain' ),
				'name_admin_bar'     => _x( 'Services', 'add new on admin bar', 'your-plugin-textdomain' ),
				'add_new'            => _x( 'Add New', 'Servic', 'your-plugin-textdomain' ),
				'add_new_item'       => __( 'Add New Servic', 'your-plugin-textdomain' ),
				'new_item'           => __( 'New Servic', 'your-plugin-textdomain' ),
				'edit_item'          => __( 'Edit Servic', 'your-plugin-textdomain' ),
				'view_item'          => __( 'View Servic', 'your-plugin-textdomain' ),
				'all_items'          => __( 'All Services', 'your-plugin-textdomain' ),
				'search_items'       => __( 'Search Services', 'your-plugin-textdomain' ),
				'parent_item_colon'  => __( 'Parent Services:', 'your-plugin-textdomain' ),
				'not_found'          => __( 'No Servic found.', 'your-plugin-textdomain' ),
				'not_found_in_trash' => __( 'No Servic found in Trash.', 'your-plugin-textdomain' )
			);

			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'services' ,'with_front' => true, 'hierarchical' => true  ),
				'capability_type'    => 'post',
				'has_archive'        => false,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
			);

			register_post_type( 'services', $args );
			flush_rewrite_rules();
		}

		public function global_visa_post_type()
		{

			$labels = array(
				'name'               => _x( 'Visa Type', 'post type general name', 'your-plugin-textdomain' ),
				'singular_name'      => _x( 'Visa Type', 'post type singular name', 'your-plugin-textdomain' ),
				'menu_name'          => _x( 'Visa Type', 'admin menu', 'your-plugin-textdomain' ),
				'name_admin_bar'     => _x( 'Visa Type', 'add new on admin bar', 'your-plugin-textdomain' ),
				'add_new'            => _x( 'Add New', 'Visa Type', 'your-plugin-textdomain' ),
				'add_new_item'       => __( 'Add New Visa Type', 'your-plugin-textdomain' ),
				'new_item'           => __( 'New Visa Type', 'your-plugin-textdomain' ),
				'edit_item'          => __( 'Edit Visa Type', 'your-plugin-textdomain' ),
				'view_item'          => __( 'View Visa Type', 'your-plugin-textdomain' ),
				'all_items'          => __( 'All Visa Type', 'your-plugin-textdomain' ),
				'search_items'       => __( 'Search Visa Type', 'your-plugin-textdomain' ),
				'parent_item_colon'  => __( 'Parent Visa Type:', 'your-plugin-textdomain' ),
				'not_found'          => __( 'No Visa Type found.', 'your-plugin-textdomain' ),
				'not_found_in_trash' => __( 'No Visa Type found in Trash.', 'your-plugin-textdomain' )
			);

			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'visa' ,'with_front' => false, 'feed'=> true, 'pages'=> true  ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
			);

			register_post_type( 'visa', $args );
			flush_rewrite_rules();

		}

		public function global_visa_texonomy()
		{

			$labels = array(
				'name'              => _x( 'Visa Types', 'taxonomy general name' ),
				'singular_name'     => _x( 'Visa type', 'taxonomy singular name' ),
				'search_items'      => __( 'Search Visa Types' ),
				'all_items'         => __( 'All Visa Types' ),
				'parent_item'       => __( 'Parent Visa type' ),
				'parent_item_colon' => __( 'Parent Visa type:' ),
				'edit_item'         => __( 'Edit Visa type' ),
				'update_item'       => __( 'Update Visa type' ),
				'add_new_item'      => __( 'Add New Visa type' ),
				'new_item_name'     => __( 'New Visa type Name' ),
				'menu_name'         => __( 'Visa type' ),
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'public'			=> true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'visa_type' ,'with_front' => true, 'hierarchical' => true ),
			);

			register_taxonomy( 'visa_type', array( 'visa' ), $args );
			flush_rewrite_rules();

		} 

		public function global_home_services_post_type()
		{

			$labels = array(
				'name'               => _x( 'Home Services', 'post type general name', 'your-plugin-textdomain' ),
				'singular_name'      => _x( 'Home Services', 'post type singular name', 'your-plugin-textdomain' ),
				'menu_name'          => _x( 'Home Services', 'admin menu', 'your-plugin-textdomain' ),
				'name_admin_bar'     => _x( 'Home Services', 'add new on admin bar', 'your-plugin-textdomain' ),
				'add_new'            => _x( 'Add New', 'Home Service', 'your-plugin-textdomain' ),
				'add_new_item'       => __( 'Add New Home Service', 'your-plugin-textdomain' ),
				'new_item'           => __( 'New Home Service', 'your-plugin-textdomain' ),
				'edit_item'          => __( 'Edit Home Service', 'your-plugin-textdomain' ),
				'view_item'          => __( 'View Home Service', 'your-plugin-textdomain' ),
				'all_items'          => __( 'All Home Services', 'your-plugin-textdomain' ),
				'search_items'       => __( 'Search Home Services', 'your-plugin-textdomain' ),
				'parent_item_colon'  => __( 'Parent Home Services:', 'your-plugin-textdomain' ),
				'not_found'          => __( 'No Home Services found.', 'your-plugin-textdomain' ),
				'not_found_in_trash' => __( 'No Home Services found in Trash.', 'your-plugin-textdomain' )
			);

			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'home' ,'with_front' => true, 'hierarchical' => true ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
			);

			register_post_type( 'home', $args );
			flush_rewrite_rules();

		}

		public function global_toptext_post_type()
		{

			$labels = array(
				'name'               => _x( 'After Header Text', 'post type general name', 'your-plugin-textdomain' ),
				'singular_name'      => _x( 'After Header Text', 'post type singular name', 'your-plugin-textdomain' ),
				'menu_name'          => _x( 'After Header Text', 'admin menu', 'your-plugin-textdomain' ),
				'name_admin_bar'     => _x( 'After Header Text', 'add new on admin bar', 'your-plugin-textdomain' ),
				'add_new'            => _x( 'Add New', 'Home Service', 'your-plugin-textdomain' ),
				'add_new_item'       => __( 'Add New After Header Text', 'your-plugin-textdomain' ),
				'new_item'           => __( 'New After Header Text', 'your-plugin-textdomain' ),
				'edit_item'          => __( 'Edit After Header Text', 'your-plugin-textdomain' ),
				'view_item'          => __( 'View After Header Text', 'your-plugin-textdomain' ),
				'all_items'          => __( 'All After Header Text', 'your-plugin-textdomain' ),
				'search_items'       => __( 'Search After Header Text', 'your-plugin-textdomain' ),
				'parent_item_colon'  => __( 'Parent After Header Text:', 'your-plugin-textdomain' ),
				'not_found'          => __( 'No After Header Text found.', 'your-plugin-textdomain' ),
				'not_found_in_trash' => __( 'No After Header Text found in Trash.', 'your-plugin-textdomain' )
			);

			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'afterheader' ,'with_front' => true, 'hierarchical' => true  ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
			);

			register_post_type( 'afterheader', $args );
			flush_rewrite_rules();

		}
		
		public function global_toptext_texonomy()
		{

			$labels = array(
				'name'              => _x( 'Header Text Types', 'taxonomy general name' ),
				'singular_name'     => _x( 'Header Text type', 'taxonomy singular name' ),
				'search_items'      => __( 'Search Header Text Types' ),
				'all_items'         => __( 'All Header Text Types' ),
				'parent_item'       => __( 'Parent Header Text type' ),
				'parent_item_colon' => __( 'Parent Header Text type:' ),
				'edit_item'         => __( 'Edit Header Text type' ),
				'update_item'       => __( 'Update Header Text type' ),
				'add_new_item'      => __( 'Add New Header Text type' ),
				'new_item_name'     => __( 'New Header Text type Name' ),
				'menu_name'         => __( 'Header Text type' ),
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'header_text_type' ,'with_front' => true, 'hierarchical' => true ),
			);

			register_taxonomy( 'header_text_type', array( 'afterheader' ), $args );
			flush_rewrite_rules();

		}


		public function global_widget_areas()
		{
		    register_sidebar(

		    	array(
			        'name' => __( 'News Page', 'theme-slug' ),
			        'id' => 'sidebar-1',
			        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
			        'before_widget' => '<li id="%1$s" class="widget %2$s">',
					'after_widget'  => '</li>',
					'before_title'  => '<h2 class="widgettitle">',
					'after_title'   => '</h2>',
			    )

		    );

		    register_sidebar(

		    	array(
			        'name' => __( 'Home Page', 'theme-slug' ),
			        'id' => 'sidebar-2',
			        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
			        'before_widget' => '<li id="%1$s" class="widget %2$s">',
					'after_widget'  => '</li>',
					'before_title'  => '<h2 class="widgettitle">',
					'after_title'   => '</h2>',
			    )

		    );

		    register_sidebar(

		    	array(
			        'name' => __( 'Blue Footer Left', 'theme-slug' ),
			        'id' => 'sidebar-3',
			        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
			        'before_widget' => '<div id="%1$s" class="widget left-align %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h2 class="widgettitle">',
					'after_title'   => '</h2>',
			    )

		    );

		    register_sidebar(

		    	array(
			        'name' => __( 'Blue Footer Right', 'theme-slug' ),
			        'id' => 'sidebar-4',
			        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
			        'before_widget' => '<div id="%1$s" class="widget left-align %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h2 class="widgettitle">',
					'after_title'   => '</h2>',
			    )

		    );

		}

	}

	new Global_Migrate();