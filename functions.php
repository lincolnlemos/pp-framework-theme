<?php

// Define theme constants
define('PP_PARTIAL_PATH', get_stylesheet_directory() . '/templates/partials/');
define('PP_LOOP_PATH', get_stylesheet_directory() . '/templates/loop/');

// Setup Framework Base Functions
require_once ('functions/activation.php'); // Functions to run after install theme
require_once ('functions/setup.php');

// Filters, Hooks and functions about wp-admin
require_once ('functions/wp-admin.php');

// Wordpress Bootrap Navwalker
require_once ('functions/vendor/wp_bootstrap_navwalker.php');

// Custom functions for theming
require_once ('functions/custom-actions.php');
require_once ('functions/custom-shortcakes.php');
require_once ('functions/custom-functions.php');
require_once ('functions/custom-acf.php');
require_once ('functions/custom-wpcf7.php');
