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
// Register our plugin admin page
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
        // Process form
        ban_useragent_update_list( $_POST[ 'banlist' ] );
        echo "<div class='updated'>Ban list updated.</div>";
    }
    // Get current list
    $banlist = ban_useragent_get_list();
    // Create nonce
    $nonce = yourls_create_nonce( 'ban_useragent' );
    echo <<<HTML
    <h2>Ban UserAgent</h2>	<p>Enter a list of user agents to be banned from accessing your short URLs. Separate each user agent with a new line.</p>	<form method = 'post'>
    <input type = 'hidden' name = 'nonce' value = "$nonce" />
    <textarea name = 'banlist' cols = '50' rows = '10'>$banlist</textarea><br/>
    <input type = 'submit' value = 'Update Ban List' />
    </form>
    HTML;
}
// Update ban list

function ban_useragent_update_list( $list ) {

    $list = trim( $list );
    // remove whitespace from beginning and end of list     // Sanitize list
    $list = preg_replace( '/[^A-Za-z0-9\s\-\._]/', '', $list );
    // only allow alphanumeric characters, spaces, hyphens, underscores and periods     // Update list in database
    yourls_update_option( 'banlist', $list );
    return true;

}
// Get ban list from database

function ban_useragent_get_list() {
    // Get list from database
    $list = yourls_get_option( 'banlist' );
    return $list;

}
// Check if user agent is in ban list

function ban_useragent() {
    // Get user agent string from browser request header
    $ua = $_SERVER[ 'HTTP_USER_AGENT' ];
    // Get ban list from database
    $banlist = ban_useragent_get_list();
    // Split ban list into an array of user agents to be banned
    $banned = explode( '\n', $banlist );
    // Check if user agent is in the ban list
    if ( in_array( $ua, $banned ) ) {
        // Include file with alternative content for banned user agents
        include( 'pls-use-oth-ua.php' );
        // Stop execution of script
        die();
    } else {
        return true;
    }

}
// Hook into pre-redirect check and call our function to check for banned user agents
yourls_add_action( 'pre-redirect', 'ban_useragent' );
