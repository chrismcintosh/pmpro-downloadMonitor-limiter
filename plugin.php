<?php
/*
Plugin Name: Download Limiter
Plugin URI: https://wordpress.org/plugins/health-check/
Description: Checks the health of your WordPress install
Version: 0.1.0
Author: The Health Check Team
Author URI: http://health-check-team.example.com
Text Domain: health-check
Domain Path: /languages
*/

require_once (__DIR__ . '/settings.php');
global $valid_memberships;

// TODO - This should pull membership titles in automatically
$valid_memberships = array('Premiere Membership - Monthly', 'Premiere Membership - Quarterly', 'Premiere Membership - Yearly');
require_once(__DIR__.'/includes/filters.php');
require_once(__DIR__.'/includes/actions.php');