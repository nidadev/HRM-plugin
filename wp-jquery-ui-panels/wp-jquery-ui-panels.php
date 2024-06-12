<?php
/*
Plugin Name: Wp Jquery Ui Plugin
Author: Nida
Description: This is custom plugin of jquery ui
Version: 1.0
*/
define("JQUERY_UI_WP_PATH",plugin_dir_path(__FILE__));
define("JQUERY_UI_WP_URL",plugin_dir_url(__FILE__));


add_action("admin_menu","jquery_ui_menus");

function jquery_ui_menus()
{
    add_menu_page("Jquery Ui Wp","Jquery Ui Wp","manage_options","wp-jquery-ui","wp_jquery_ui_callback");
    add_submenu_page("wp-jquery-ui","Tabs","Tabs", "manage_options","wp-jquery-ui-tabs","wp_jquery_ui_callback_tabs");
}

function wp_jquery_ui_callback()
{
    //echo JQUERY_UI_WP_PATH;
    ob_start();
    include_once JQUERY_UI_WP_PATH.'views/accordion.php';

    $template = ob_get_contents();
    ob_end_clean();
    echo $template;
}

function wp_jquery_ui_callback_tabs()
{
    //echo JQUERY_UI_WP_PATH;
    ob_start();
    include_once JQUERY_UI_WP_PATH.'views/tabs.php';

    $template = ob_get_contents();
    ob_end_clean();
    echo $template;
}
function jquery_ui_js_files()
{
    wp_enqueue_style('jquery-ui-accordion',JQUERY_UI_WP_URL.'/assets/jquery-min.css');

    wp_enqueue_script('jquery');   //atatch files to frontend

    wp_enqueue_script('jquery-ui-accordion');
    wp_enqueue_script('jquery-ui-tabs');
    wp_enqueue_script('custom-script', JQUERY_UI_WP_URL.'/assets/script.js', array('jquery'), '1.0.0' , false);
}

add_action('admin_enqueue_scripts', 'jquery_ui_js_files');//atatch files to admin

?>