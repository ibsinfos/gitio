<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_App
 * @subpackage Plugin_App/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_App
 * @subpackage Plugin_App/public
 * @author     Your Name <email@example.com>
 */
class Plugin_App_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_app    The ID of this plugin.
     */
    private $plugin_app;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_app       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_app, $version) {

        $this->plugin_app = $plugin_app;
        $this->version = $version;
        
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_App_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Plugin_App_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_app, plugin_dir_url(__FILE__) . 'css/plugin-app-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_App_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Plugin_App_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script( $this->plugin_app, plugin_dir_url( __FILE__ ) . 'js/plugin-app-public.js', array( 'jquery' ), $this->version, false );

        }

        function app_reserve_page_template($page_template) {
        if (is_page('App Login Page')) {
            $page_template = dirname(__FILE__) . '/templates/home_page.php';
        }
        return $page_template;
    }
        



}
