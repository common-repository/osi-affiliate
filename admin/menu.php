<?php
// Exit if accessed directly
!defined('ABSPATH') && exit;

add_action('admin_menu', 'osi_hss_menu');
function osi_hss_menu() {
    add_menu_page('html-snippet-shortcode', 'OSI Affiliate', 'manage_options', 'html-snippet-shortcode-manage', 'osi_hss_snippets');
    add_submenu_page('html-snippet-shortcode-manage', 'OSI Affiliate', 'OSI Affiliate', 'manage_options', 'html-snippet-shortcode-manage', 'osi_hss_snippets');
}

function osi_hss_snippets() {
    $page_action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    switch($page_action){
        case 'snippet-delete':
            include( dirname(__FILE__) . '/snippet-delete.php' ); 
            break;
        case 'snippet-edit':
            include( dirname(__FILE__) . '/snippet-edit.php' );
            break;
        case 'snippet-add':
            include( dirname(__FILE__) . '/snippet-add.php' );
            break;
        case 'snippet-status':
            include( dirname(__FILE__) . '/snippet-status.php' );
            break;
        default:
            include( dirname(__FILE__) . '/snippets.php' ); 
    }
}

function osi_hss_add_style_script($page) {
    
    if($page != 'toplevel_page_html-snippet-shortcode-manage') return;

    wp_enqueue_script('jquery');
    wp_register_script('osi_hss_script', plugins_url('/js/hss.js', OSI_HTML_SNIPPET_SHOTCODE_PLUGIN_FILE));
    wp_enqueue_script('osi_hss_script');

    // Register stylesheets
    wp_register_style('osi_hss_style', plugins_url('/css/osi_hss_styles.css', OSI_HTML_SNIPPET_SHOTCODE_PLUGIN_FILE));
    wp_register_style('osi_font_awesome', plugins_url('/css/font-awesome.min.css', OSI_HTML_SNIPPET_SHOTCODE_PLUGIN_FILE));
    wp_enqueue_style('osi_hss_style');
    wp_enqueue_style('osi_font_awesome');
}

add_action('admin_enqueue_scripts', 'osi_hss_add_style_script');