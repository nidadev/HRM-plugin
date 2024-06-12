<?php

/*
Plugin Name: Employee Management system
Plugin URI:http://yahoo.com
Description: This is custom plugin
Version: 1.0
Author: Sample Name
*/

define('EMS_PLUGIN_PATH',plugin_dir_path( __FILE__ ));
define('EMS_PLUGIN_URL',plugin_dir_url( __FILE__ ));

//plugin_dir_url for css/images
//calling action hook to call menu
add_action("admin_menu", "cp_add_admin_menu");


//add menu
function cp_add_admin_menu()
{
    add_menu_page("Add Employee - Employee Management System", "Custom Plugin", "manage_options", "employee-system"
,"ems_crud_system","dashicons-filter",23); //"cp_handle_menu_function"

// add sub menu

add_submenu_page("employee-system","Add Employee","Add Employee", "manage_options","add-employee","ems_crud_system");


add_submenu_page("employee-system","List Employee","List Employee", "manage_options","list_employee","ems_list_emloyee");

}


//menu handle callback
function ems_crud_system()
{
    //echo EMS_PLUGIN_PATH;
include_once(EMS_PLUGIN_PATH."\pages\add-employee.php");
}

function ems_list_emloyee()
{
    include_once(EMS_PLUGIN_PATH."\pages\list-employee.php");
   
}
register_activation_hook(__FILE__,'ems_create_table');

function ems_create_table()
{
    global $wpdb;
    $table_prefix = $wpdb->prefix;   //wp

  $sql = "CREATE TABLE {$table_prefix}ems_form_data (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `email` varchar(80) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `designation` varchar(50) NOT NULL,
  `phone` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

include_once ABSPATH. 'wp-admin/includes/upgrade.php';

dbDelta($sql);
}
//deactivation hook
register_deactivation_hook(__FILE__, 'ems_drop_table');
function ems_drop_table()
{
    global $wpdb;
    $table_prefix = $wpdb->prefix;   //wp

  $sql = "DROP TABLE {$table_prefix}ems_form_data";

include_once ABSPATH. 'wp-admin/includes/upgrade.php';

$wpdb->query($sql);  
}

//add action
add_action('admin_enqueue_scripts','wp_enqueue_js_css_files');

function wp_enqueue_js_css_files()
{
  wp_enqueue_script('jquery');

  wp_enqueue_style('ems-bootstrap-css',EMS_PLUGIN_URL.'/assets/css/bootstrap.min.css',array(), '1.0.0' , 'all');
  wp_enqueue_style('ems-datatable-css',EMS_PLUGIN_URL.'/assets/css/datatables.min.css',array(), '1.0.0' , 'all');

  wp_enqueue_script('ems-bootstrap-script', EMS_PLUGIN_URL.'/assets/js/bootstrap.min.js', array('jquery'), '1.0.0');
  wp_enqueue_script('ems-bootstrap-bundle-script', EMS_PLUGIN_URL.'/assets/js/bootstrap.bundle.min.js', array('jquery'), '1.0.0');

    wp_enqueue_script('ems-datatable-js', EMS_PLUGIN_URL.'/assets/js/datatables.js', array('jquery'), '1.0.0');
  }
?>