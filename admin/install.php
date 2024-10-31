<?php
// Exit if accessed directly
!defined('ABSPATH') && exit;

function osi_hss_install_plugin() {
    global $wpdb;
    osi_hss_install();
}

function osi_hss_install() {

    global $wpdb;
    //global $current_user; get_currentuserinfo();

    add_option('osi_hss_limit', 20);
    $queryInsertHtml = "CREATE TABLE IF NOT EXISTS  " . $wpdb->prefix . "osi_hss_short_code (
	  `id` int NOT NULL AUTO_INCREMENT,
		  `title` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
		  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
		  `short_code` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
		  `status` int NOT NULL,
		  PRIMARY KEY (`id`)
		)";
    $wpdb->query($queryInsertHtml);
}

register_activation_hook(OSI_HTML_SNIPPET_SHOTCODE_PLUGIN_FILE, 'osi_hss_install_plugin');
