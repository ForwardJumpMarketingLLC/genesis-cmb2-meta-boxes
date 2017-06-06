<?php
/**
 * Genesis CPT Archive Settings Meta Box configuration.
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
			'title'        => 'Example Genesis CPT Settings CMB2 meta box', // String. Translation function is handled by the Genesis_CMB2_Admin_Meta_Box() class.
			'object_types' => [ 'new-post-type', 'new-post-type-2' ], // Array. CPT slug(s).
			'priority'     => 'high', // 'high' or 'low'.
			'show_names'   => true,
			'closed'       => false,
			'classes'      => 'extra-classes',
		],
		'fields'  => [
			[
				'name'    => 'Example field',
				'id'      => 'example_cmb2_field',
				'type'    => 'text',
			],
			[
				'name'    => 'Example Group',
				'id'      => 'example_group',
				'type'    => 'group',
				'repeatable' => true,
				'options'     => [
					'group_title'   => __( 'Entry {#}', FJ_GENESISCMB2_TEXT_DOMAIN ),
					'add_button'    => __( 'Add Another Entry', FJ_GENESISCMB2_TEXT_DOMAIN ),
					'remove_button' => __( 'Remove Entry', FJ_GENESISCMB2_TEXT_DOMAIN ),
					'sortable'      => true,
				],
				'fields'  => [
					[
						'name'    => 'Example group field',
						'id'      => 'example_group_field',
						'type'    => 'text',
						'repeatable' => true,
					],
				],
			],
		],
	],
];
