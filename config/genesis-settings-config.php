<?php
/**
 * Genesis Theme Settings Meta Box configuration.
 *
 * @package ForwardJump\GenesisCMB2
 * @since   0.1.0
 * @author  Tim Jensen
 * @link    https://forwardjump.com/
 * @license GNU General Public License 2.0+
 */

/**
 * This is an example config array.
 *
 * 'metabox' (array) => Configuration array to pass to `CMB2()`.
 * 'fields'  (array) => Configuration arrays to pass to
 *                      `CMB2->add_field()`.
 *
 * @see https://github.com/CMB2/CMB2/blob/master/example-functions.php
 *
 * @return array
 */
return [
	[
		'metabox' => [
			'title'        => 'Example Genesis Theme Settings CMB2 meta box', // String. Translation function is handled by the class.
			'priority'     => 'high', // 'high' or 'low'.
			'show_names'   => true, // Bool.
			'cmb2_styles'  => true, // Bool.
			'closed'       => false, // Bool.
			'classes'      => 'extra-classes',
		],
		'fields'  => [
			[
				'name'    => __( 'Example field', FJ_GENESISCMB2_TEXT_DOMAIN ),
				'id'      => 'example_cmb2_field',
				'type'    => 'text',
				'default' => false,
			],
		],
	],
];
