<?php
/**
 * Genesis Admin Meta boxes Module
 *
 * @package     ForwardJump\GenesisCMB2
 * @since       0.1.0
 * @author      Tim Jensen
 * @link        https://forwardjump.com/
 * @license     GNU General Public License 2.0+
 */

namespace ForwardJump\GenesisCMB2;

/**
 * Initializes the Genesis CPT Archive and Theme Settings meta box classes.
 *
 * @since 0.1.0
 *
 * @return void
 */
function init() {

	if ( ! is_admin() ) {
		return;
	}

	include_once __DIR__ . '/class-genesis-cmb2-admin-meta-box.php';
	include_once __DIR__ . '/class-genesis-cpt-archive-settings-meta-box.php';
	include_once __DIR__ . '/class-genesis-theme-settings-meta-box.php';
}
init();

include_once __DIR__ . '/helper-functions.php';
