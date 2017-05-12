<?php
/**
 * Genesis CPT Archives Meta Box class.
 *
 * @package ForwardJump\GenesisCMB2
 * @since   0.1.0
 * @author  Tim Jensen
 * @link    https://forwardjump.com/
 * @license GNU General Public License 2.0+
 */

namespace ForwardJump\GenesisCMB2;

/**
 * CMB2 Genesis CPT Archives Meta Box
 *
 * @version 0.1.0
 */
class Genesis_CPT_Archives_Meta_Box extends Genesis_CMB2_Admin_Meta_Box {

	/**
	 * Set the class properties.
	 *
	 * @since 0.1.0
	 *
	 * @param array $config Meta box configuration array.
	 */
	protected function set_properties( array $config ) {
		parent::set_properties( $config );

		$this->admin_page = 'cpt_archives_settings';

		$object_types = $config['metabox']['object_types'];
		foreach ( $object_types as $object_type ) {
			$this->admin_hooks[] = sprintf( '%1$s_page_genesis-cpt-archive-%1$s', $object_type );
			$this->option_keys[] = sprintf( 'genesis-cpt-archive-settings-%s', $object_type );
		}
	}
}
