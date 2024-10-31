<?php
// Exit if accessed directly
!defined('ABSPATH') && exit;
!current_user_can('manage_options') && wp_die(__("You don't have permissions to view this page"));

global $wpdb;

$_GET = stripslashes_deep($_GET);

$osi_hss_snippetId = intval( esc_sql( $_GET['snippetId'] ) );
$osi_hss_pageno = intval( $_GET['pageno'] );

if ( !$osi_hss_snippetId || !is_numeric($osi_hss_snippetId) ) {
    osi_js_redirect('page=html-snippet-shortcode-manage');
}
$snippetCount = $wpdb->query($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'osi_hss_short_code WHERE id=%d LIMIT 0,1', $osi_hss_snippetId));

if ( $snippetCount == 0 ) {
    osi_js_redirect('page=html-snippet-shortcode-manage&osi_hss_msg=2');
} else {
    $wpdb->query($wpdb->prepare('DELETE FROM  ' . $wpdb->prefix . 'osi_hss_short_code  WHERE id=%d', $osi_hss_snippetId));
    osi_js_redirect('page=html-snippet-shortcode-manage&osi_hss_msg=3&pagenum=' . $osi_hss_pageno);
}
