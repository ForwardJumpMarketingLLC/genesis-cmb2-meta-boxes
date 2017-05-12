<?php
/**
 * Genesis CMB2 Admin Meta Boxes
 *
 * @package     ForwardJump\GenesisCMB2
 * @author      Tim Jensen <tim@forwardjump.com>
 * @license     GNU General Public License 2.0+
 * @link        https://forwardjump.com
 * @since       0.1.0
 */

namespace ForwardJump\GenesisCMB2;

/**
 * Class Genesis_CMB2_Admin_Meta_Box
 *
 * @version 0.1.0
 *
 * @package ForwardJump\GenesisCMB2
 */
abstract class Genesis_CMB2_Admin_Meta_Box {

	/**
	 * Meta box config.
	 *
	 * @var array
	 */
	protected $metabox_config = [];

	/**
	 * Fields config.
	 *
	 * @var array
	 */
	protected $fields_config = [];

	/**
	 * Use CMB2 styles to style the meta boxes and fields.
	 *
	 * @var bool
	 */
	protected $use_cmb2_styles = true;

	/**
	 * Admin hooks
	 *
	 * @var array
	 */
	protected $admin_hooks = [];

	/**
	 * The admin page slug.
	 *
	 * @var string
	 */
	protected $admin_page = '';

	/**
	 * Option keys.
	 *
	 * @var array
	 */
	protected $option_keys = [];

	/**
	 * Holds an instance of the CMB2 object.
	 *
	 * @var \CMB2 object.
	 */
	private $cmb2_instance;

	/**
	 * Constructor
	 *
	 * @since 0.1.0
	 *
	 * @param array $config Meta box configuration array.
	 */
	public function __construct( array $config ) {
		$this->set_properties( $config );
	}

	/**
	 * Set the class properties.
	 *
	 * @since 0.1.0
	 *
	 * @param array $config Meta box configuration array.
	 * @return void
	 */
	protected function set_properties( array $config ) {
		$this->metabox_config  = $config['metabox'];
		$this->fields_config   = $config['fields'];
		$this->use_cmb2_styles = isset( $config['metabox']['cmb2_styles'] ) ? $config['metabox']['cmb2_styles'] : false;
	}

	/**
	 * Initiate our hooks.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function init() {
		add_action( 'admin_menu', [ $this, 'admin_hooks' ] );
		add_action( 'cmb2_admin_init', [ $this, 'init_metabox' ] );
	}

	/**
	 * Add admin hooks.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function admin_hooks() {

		foreach ( (array) $this->admin_hooks as $admin_hook ) {

			if ( $this->use_cmb2_styles ) {
				add_action( "admin_print_styles-{$admin_hook}", [ 'CMB2_hookup', 'enqueue_cmb_css' ] );
			}

			add_action( "{$admin_hook}_settings_page_boxes", [ $this, 'add_meta_box' ] );
		}

		foreach ( $this->option_keys as $option_key ) {
			add_filter( "sanitize_option_{$option_key}", [ $this, 'add_sanitized_values' ], 999 );
		}
	}

	/**
	 * Register our Genesis meta box and return the CMB2 object.
	 *
	 * @since  0.1.0
	 *
	 * @return \CMB2 instance.
	 */
	public function init_metabox() {

		static $count = 0;
		$count ++;

		$overrides = [
			'id'           => "genesis-$this->admin_page-{$count}",
			'title'        => __( $this->metabox_config['title'], FJ_GENESISCMB2_TEXT_DOMAIN ),
			'hookup'       => false, // Handled with $this->add_sanitized_values().
			'cmb_styles'   => false, // Handled with $this->admin_hooks().
			'context'      => 'main', // Important for Genesis.
			'object_types' => [ 'options-page' ],
			'show_on'      => [
				'key'   => 'options-page',
				'value' => $this->admin_page,
			],
		];

		$this->cmb2_instance = new_cmb2_box(
			array_merge( $this->metabox_config, $overrides )
		);

		foreach ( (array) $this->fields_config as $field_config ) {
			$field_config['name'] = __( $field_config['name'], FJ_GENESISCMB2_TEXT_DOMAIN );

			// Set our CMB2 fields.
			$this->cmb2_instance->add_field( $field_config );
		}

		return $this->cmb2_instance;
	}

	/**
	 * Hook up our Genesis meta box.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function add_meta_box() {

		add_meta_box(
			$this->cmb2_instance->cmb_id,
			$this->cmb2_instance->prop( 'title' ),
			[ $this, 'output_metabox' ],
			null,
			$this->cmb2_instance->prop( 'context' ),
			$this->cmb2_instance->prop( 'priority' )
		);
	}

	/**
	 * Output our Genesis CMB2 meta box.
	 *
	 * @since 0.1.0
	 *
	 * @param array $metabox_params Metabox parameters.
	 * @return void
	 */
	public function output_metabox( $param, $metabox_params ) {

		$current_screen = get_current_screen();
		$option_key     = empty( $current_screen->post_type ) ? 'genesis-settings' : "genesis-cpt-archive-settings-$current_screen->post_type";

		$cmb = cmb2_get_metabox( $metabox_params['id'], $option_key, 'options-page' );
		$cmb->show_form(
			$cmb->object_id(),
			$cmb->object_type()
		);
	}

	/**
	 * If saving the cpt settings option, add the CMB2 sanitized values.
	 *
	 * @since 0.1.0
	 *
	 * @param array $new_value Array of values for the setting.
	 * @return array
	 */
	public function add_sanitized_values( $new_value ) {

		if ( empty( $_POST ) ) {
			return $new_value;
		}

		$new_value = array_merge(
			$new_value,
			$this->cmb2_instance->get_sanitized_values( $_POST )
		);

		return $new_value;
	}
}
