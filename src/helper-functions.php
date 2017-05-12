<?php
/**
 * Helper Functions
 *
 * @package     ForwardJump\GenesisCMB2
 * @author      Tim Jensen <tim@forwardjump.com>
 * @license     GNU General Public License 2.0+
 * @link        https://forwardjump.com
 * @since       0.1.0
 */

/**
 * Helper function for adding CMB2 meta boxes to Genesis CPT Archive Settings.
 *
 * @param array $cpt_archive_config Meta box configuration.
 * @return void
 */
function genesiscmb2_add_cpt_archive_box( array $cpt_archive_config ) {

	genesiscmb2_add_admin_meta_box(
		'\ForwardJump\GenesisCMB2\Genesis_CPT_Archives_Meta_Box',
		$cpt_archive_config,
		__FUNCTION__
	);
}

/**
 * Helper function for adding CMB2 meta boxes to Genesis Theme Settings.
 *
 * @param array $theme_settings_config Meta box configuration.
 * @return void
 */
function genesiscmb2_add_theme_settings_box( array $theme_settings_config ) {

	genesiscmb2_add_admin_meta_box(
		'\ForwardJump\GenesisCMB2\Genesis_Theme_Settings_Meta_Box',
		$theme_settings_config,
		__FUNCTION__
	);
}

/**
 * Adds the appropriate Genesis CMB2 admin meta box(es). Wraps the
 * configuration array in an array, if necessary.
 *
 * @param callable $class
 * @param array    $config Meta box configuration array.
 * @param string   $caller Name of the function that invoked this function.
 * @return void
 */
function genesiscmb2_add_admin_meta_box( $class, $config, $caller ) {

	if ( ! is_admin() ) {
		return;
	}

	if ( ! array_key_exists( 0, $config ) ) {
		_doing_it_wrong( $caller, __( 'The Genesis CMB2 configuration is not formatted correctly.', FJ_GENESISCMB2_TEXT_DOMAIN ), '0.1.0' );

		$config = [ $config ];
	}

	foreach ( (array) $config as $meta_box ) {
		( new $class( $meta_box ) )->init();
	}
}
