<?php
// Exit if accessed directly
!defined('ABSPATH') && exit;

if (!function_exists('osi_hss_plugin_get_version')) {

    function osi_hss_plugin_get_version() {
        if (!function_exists('get_plugins'))
            require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        $plugin_folder = get_plugins('/' . plugin_basename(dirname(OSI_INSERT_HTML_PLUGIN_FILE)));
        return $plugin_folder['html-snippet-shortcode.php']['Version'];
    }

}

if (!function_exists('osi_trim_deep')) {

    function osi_trim_deep($value) {
        if (is_array($value)) {
            $value = array_map('osi_trim_deep', $value);
        } elseif (is_object($value)) {
            $vars = get_object_vars($value);
            foreach ($vars as $key => $data) {
                $value->{$key} = osi_trim_deep($data);
            }
        } else {
            $value = trim($value);
        }

        return $value;
    }

}

if (!function_exists('osi_js_redirect')) {

    function osi_js_redirect($url) {
        printf("<script>window.location = \"%s\"</script>", admin_url('admin.php?' . $url));
        wp_die();
    }

}