<?php
/**
 * Plugin Name: Genesis CMB2 Meta Boxes
 * Plugin URI: https://bitbucket.org/forwardjump/forwardjump-utility-core
 * Description: Add CMB2 meta boxes and custom fields to Genesis CPT archive and theme settings pages.
 *
 * Version: 0.2.0
 *
 * Author: Tim Jensen
 * Author URI: https://forwardjump.com/
 *
 * This program is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License version 3, as published by the
 * Free Software Foundation.  You may NOT assume that you can use any other
 * version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * Text Domain: genesis-cmb2-meta-boxes
 *
 * GitHub Plugin URI: https://github.com/ForwardJumpMarketingLLC/genesis-cmb2-meta-boxes
 * GitHub branch: master
 *
 * @package ForwardJump\GenesisCMB2
 * PHP Version 5.4
 */

namespace ForwardJump\GenesisCMB2;

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

define( 'FJ_GENESISCMB2_TEXT_DOMAIN', 'genesis-cmb2-meta-boxes' );
define( 'FJ_GENESISCMB2_DIR', __DIR__ );
define( 'FJ_GENESISCMB2_URL', plugins_url( null, __FILE__ ) );

require_once FJ_GENESISCMB2_DIR . '/vendor/autoload.php';
