<?php
/**
 * Genesis Theme Settings Meta Box
 *
 * @package ForwardJump\GenesisCMB2
 * @since   0.1.0
 * @author  Tim Jensen <tim@forwardjump.com>
 * @link    https://forwardjump.com/
 * @license GNU General Public License 2.0+
 */

namespace ForwardJump\GenesisCMB2;

/**
 * Class Genesis_Theme_Settings_Meta_Box
 *
 * @version 0.1.0
 *
 * @package ForwardJump\GenesisCMB2
 */
class Genesis_Theme_Settings_Meta_Box extends Genesis_CMB2_Admin_Meta_Box {

	/**
	 * Set the class properties.
	 *
	 * @since 0.1.0
	 *
	 * @param array $config Meta box configuration array.
	 */
	protected function set_properties( array $config ) {
		parent::set_properties( $config );

		$this->option_keys[] = 'genesis-settings';
		$this->admin_hooks[] = 'toplevel_page_genesis';
		$this->admin_page    = 'theme_settings';
	}
}
