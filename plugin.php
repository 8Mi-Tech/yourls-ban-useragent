<?php
/*
Plugin Name: Ban User-Agent
Plugin URI: https://github.com/8Mi-Tech/yourls-ban-useragent
Description: Disable access to short-links with something browser
Version: 1.0
Author: 8Mi-Tech
Author URI: https://8mi.tech
*/
if ( !defined( 'YOURLS_ABSPATH' ) ) die();
// Register plugin admin page
yourls_add_action( 'plugins_loaded', 'ban_useragent_add_page' );

function ban_useragent_add_page() {
    yourls_register_plugin_page( 'ban_useragent', 'Ban UserAgent', 'ban_useragent_do_page' );
}

// Display admin page

function ban_useragent_do_page() {

    // Check if a form was submitted
    if ( isset( $_POST[ 'banlist' ] ) ) {
        // Check nonce
        yourls_verify_nonce( 'ban_useragent' );

        // Process form submission
        ban_useragent_update_options();

    }

    // Get value from database ( saved with yourls_update_option )
    $banlist = yourls_get_option( 'banlist' );

    echo <<<HTML
    <h2>Ban UserAgent</h2>

    <form method = 'post'>
    <input type = 'hidden' name = 'nonce' value = "$nonce" />

    <p><label for = 'banlist'>Enter the list of banned user agents, separated by commas:</label><br/>
    <textarea name = 'banlist' id = 'banlist' cols = '50' rows = '10'>$banlist</textarea></p>

    <p><input type = 'submit' value = 'Save' /></p>

    </form>
    HTML;
}

// Update option in database

function ban_useragent_update_options() {

    $in = $_POST[ 'banlist' ];

    $in = strtolower( $in );
    // convert to lowercase

    $in = preg_replace( '/[^a-z0-9,]/', '', $in );
    // remove all non-alphanumeric characters

    $in = preg_replace( '/[,]+/', ',', $in );
    // remove duplicate commas

    $in = trim( $in, ',' );
    // remove leading and trailing commas

    yourls_update_option( 'banlist', $in );
    // save to database

    yourls_redirect( yourls_admin_url( 'plugins.php?page=ban_useragent&updated=true' ) );
    // Redirect to the page and add a parameter to indicate the settings were saved
}

// Hook the redirect process
yourls_add_action( 'pre_redirect', 'ban_useragent_check' );

function ban_useragent_check( $args ) {

    $url = $args[ 0 ];
    $code = $args[ 1 ];

    $banlist = yourls_get_option( 'banlist' );
    // get the list of banned user agents

    if ( !empty( $banlist ) ) {
        // if the list is not empty

        $useragent = strtolower( $_SERVER[ 'HTTP_USER_AGENT' ] );
        // get the user agent

        $banned = explode( ',', $banlist );
        // convert the list to an array

        foreach ( $banned as $ban ) {
            // loop through the array
            if ( strpos( $useragent, $ban ) !== false ) {
                // check if the user agent contains a banned keyword
                include( 'pls-use-other-ua.php' );
                // include a page telling the user to use a different browser
                die();
            }
        }
    }
}
