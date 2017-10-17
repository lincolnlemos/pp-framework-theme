<?php

// Define theme constants
define('PP_BLOCK_PATH', get_stylesheet_directory() . '/page-templates/blocks/');

// Setup Framework Base Functions
require_once ('functions/setup.php');

// Filters, Hooks and functions about wp-admin
require_once ('functions/wp-admin.php');

// Wordpress Bootrap Navwalker
require_once ('functions/vendor/wp_bootstrap_navwalker.php');

// Custom functions for theming
require_once ('functions/custom-actions.php');
require_once ('functions/custom-functions.php');
require_once ('functions/custom-acf.php');
require_once ('functions/custom-wpcf7.php');



