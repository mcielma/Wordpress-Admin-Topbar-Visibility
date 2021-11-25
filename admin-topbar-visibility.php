<?php 
/**
 * Plugin Name: Admin Topbar Visibility
 * Plugin URI:
 * Author: Maciej Cielma
 * Author URI: https://buffalonet.pl/
 * Version: 1.2
 * Text Domain: admin-topbar-visibility
 * License: GPL2
 * License URI:https://www.gnu.org/licenses/gpl-2.0.html
 * Description: Allows you to hide / show / auto-hide the topbar appearing on the Site when logged.
 *
 */




if( !defined('ABSPATH') ) : exit(); endif;

/**
 * Define plugin constants
 */
define( 'ADMIN_TOPBAR_VIS_PATH', trailingslashit( plugin_dir_path(__FILE__) ) );
define( 'ADMIN_TOPBAR_VIS_URL', trailingslashit( plugins_url('/', __FILE__) ) );


// Include admin.php
if( is_admin() ) {
    require_once ADMIN_TOPBAR_VIS_PATH . '/admin/admin.php';
}

// Include public.php
if( !is_admin() ) {
    require_once ADMIN_TOPBAR_VIS_PATH . '/public/public.php';
}

require_once ADMIN_TOPBAR_VIS_PATH . '/inc/settings/settings.php';