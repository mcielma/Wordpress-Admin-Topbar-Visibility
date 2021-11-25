<?php 


/// HIDE
if (get_option( 'adm_topbar_vis_settings_radio_field' ) === "adm_topbar_hidden")
{
    $hide_topbar=true;
    add_filter('show_admin_bar', '__return_false');
}

// AUTOHIDE
else if (get_option( 'adm_topbar_vis_settings_radio_field' ) === "adm_topbar_autohide")

{
    wp_enqueue_style( 'adm_topbar_vis-public-style-autohide', ADMIN_TOPBAR_VIS_URL . 'public/css/autohide.css', '', rand());

}
