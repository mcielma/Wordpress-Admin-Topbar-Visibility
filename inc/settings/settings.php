<?php 

function adm_topbar_vis_settings_menu() {

    add_menu_page(
        __( 'Admin Topbar Visibility Settings', 'admin-topbar-visibility' ),
        __( 'Admin Topbar', 'admin-topbar-visibility' ),
        'manage_options',
        'adm_topbar_vis-settings-page',
        'adm_topbar_vis_settings_template_callback',
        '',
        null
    );
}

add_action('admin_menu', 'adm_topbar_vis_settings_menu');

// ->  Settings Template Page

function adm_topbar_vis_settings_template_callback() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

        <form action="options.php" method="post">
            <?php 
                // security field
                settings_fields( 'adm_topbar_vis-settings-page' );

                // output settings section here
                do_settings_sections('adm_topbar_vis-settings-page');

                // save settings button
                submit_button( 'Save Settings' );
            ?>
        </form>
    </div>
    <?php 
}

// ->  Settings Template

function adm_topbar_vis_settings_init() {

    //   Setup settings section
    add_settings_section(
        'adm_topbar_vis_settings_section',
        'Visibility mode select:',
        '',
        'adm_topbar_vis-settings-page'
    );

    //   Register radio field
    register_setting(
        'adm_topbar_vis-settings-page',
        'adm_topbar_vis_settings_radio_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    //     Add radio fields
    add_settings_field(
        'adm_topbar_vis_settings_radio_field',
        __( 'Admin Topbar Visibility:', 'admin-topbar-visibility' ),
        'adm_topbar_vis_settings_radio_field_callback',
        'adm_topbar_vis-settings-page',
        'adm_topbar_vis_settings_section'
    );

}
add_action( 'admin_init', 'adm_topbar_vis_settings_init' );

//  radio field tempalte

function adm_topbar_vis_settings_radio_field_callback() {
    $adm_topbar_vis_radio_field = get_option( 'adm_topbar_vis_settings_radio_field' );
    ?>


<label for="adm_topbar_visible">
<input type="radio" name="adm_topbar_vis_settings_radio_field" value="adm_topbar_visible"
       id="adm_topbar_visible" <?php checked( 'adm_topbar_visible', $adm_topbar_vis_radio_field ); ?>/> Visible
</label>


<label for="adm_topbar_autohide">
<input type="radio" name="adm_topbar_vis_settings_radio_field" value="adm_topbar_autohide"
       id="adm_topbar_autohide" <?php checked( 'adm_topbar_autohide', $adm_topbar_vis_radio_field ); ?>/> Autohide
</label>


<label for="adm_topbar_hidden">
<input type="radio" name="adm_topbar_vis_settings_radio_field" value="adm_topbar_hidden"
       id="adm_topbar_hidden" <?php checked( 'adm_topbar_hidden', $adm_topbar_vis_radio_field ); ?>/> Hidden
</label>



    <?php
}


