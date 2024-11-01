<?php
/**
 * Plugin Name: Simple Modal
 * Plugin URI:  http://arsdehnel.net/plugin/simple-modal/
 * Description: Create new post type and add to the normal editor a button to make a link to open one of those post types in a modal window.
 * Version:     0.3.3
 * Author:      Adam Dehnel
 * Author URI:  http://arsdehnel.net/
 * License:     GPLv2 or later
 *
 *
 *
*/

define('SIMPLEMODAL_DIR', dirname(__FILE__));
define('SIMPLEMODAL_DEBUG', false);

include_once(SIMPLEMODAL_DIR.'/classes/db.php');
include_once(SIMPLEMODAL_DIR.'/classes/ui.php');
include_once(SIMPLEMODAL_DIR.'/classes/core.php');
include_once(SIMPLEMODAL_DIR.'/classes/simplemodal_post_type.php');
include_once(SIMPLEMODAL_DIR.'/classes/settings.php');

//get all the things rolling
add_action( 'init', 'simplemodal_init' );

function simplemodal_init() {
    $sm_db = new simplemodal_db();
    $sm_ui = new simplemodal_ui();
    $sm_core = new simplemodal_core($sm_db, $sm_ui);
	$sm_simplemodal_post_type = new simplemodal_post_type($sm_core);
	$sm_settings = new simplemodal_settings($sm_core);
}