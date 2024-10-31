<?php 
/*
Plugin Name: OSI Affiliate
Plugin URI: http://wordpress.osiaffiliate.com
Description: OSI Affiliate plugin allows customers to add any code to a web site. For example, we have code that we give people for our saas product.
Version: 1.1.1
Author: OSI
Author URI: http://wordpress.osiaffiliate.com
*/

// Exit if accessed directly
!defined('ABSPATH') && exit;

/*  Copyright 2011  Omnistar Software  (email : sales@osiaffiliate.com)
 
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
 
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define('OSI_HTML_SNIPPET_SHOTCODE_PLUGIN_FILE', __FILE__);

require( dirname( __FILE__ ) . '/osi-functions.php' );

require( dirname( __FILE__ ) . '/admin/install.php' );

require( dirname( __FILE__ ) . '/admin/menu.php' );

require( dirname( __FILE__ ) . '/shortcode-handler.php' );

require( dirname( __FILE__ ) . '/admin/uninstall.php' );
