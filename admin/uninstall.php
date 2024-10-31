<?php
// Exit if accessed directly
!defined('ABSPATH') && exit;

function osi_hss_uninstall_plugin($networkwide) {
    global $wpdb;
    osi_hss_uninstall();
}

function osi_hss_uninstall() {

    global $wpdb;

    delete_option("osi_hss_limit");

    /* table delete */
    $wpdb->query("DROP TABLE " . $wpdb->prefix . "osi_hss_short_code");
}

register_uninstall_hook(OSI_HTML_SNIPPET_SHOTCODE_PLUGIN_FILE, 'osi_hss_uninstall_plugin');
