<?php
// Exit if accessed directly
!defined('ABSPATH') && exit;

add_shortcode('osi-hss', 'osi_hss_display_content');
function osi_hss_display_content($osi_snippet_name) {
    global $wpdb;

    if (is_array($osi_snippet_name)) {
        $snippet_name = esc_sql( $osi_snippet_name['snippet'] );

        $query = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "osi_hss_short_code WHERE title=%s", $snippet_name));

        if (count($query) > 0) {

            foreach ($query as $sippetdetails) {

                if ($sippetdetails->status == 1)
                    return do_shortcode($sippetdetails->content);
                else
                    return '';
                break;
            }
        }else {
            return '';
        }
    }
}

add_filter('widget_text', 'do_shortcode'); // to run shortcodes in text widgets