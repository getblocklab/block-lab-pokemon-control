<?php
/**
 * Primary plugin file.
 *
 * @package   Block_Lab_Pokemon
 * @copyright Copyright(c) 2019, Block Lab
 * @license   http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2 (GPL-2.0)
 */

namespace Block_Lab_Pokemon;

/**
 * Class Plugin
 */
class Plugin {
	/**
	 * Version number.
	 *
	 * @var string
	 */
	public $version = '1.0';

	/**
	 * Execute this once plugins are loaded.
	 */
	public function plugin_loaded() {
		$this->register_hooks();
	}

	/**
	 * Register all the hooks.
	 */
	public function register_hooks() {
		add_filter( 'block_lab_controls', array( $this, 'add_controls' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'editor_assets' ) );
	}

	/**
	 * Add the controls.
	 *
	 * @param array $controls {
	 *     An associative array of the available controls.
	 *
	 *     @type string $control_name The name of the control, like 'user'.
	 *     @type object $control The control opbject, extending Controls\Control_Abstract.
	 * }
	 *
	 * @return array
	 */
	public function add_controls( $controls ) {
		require 'class-pokemon-control.php';
		$controls['pokemon'] = new Pokemon_Control();
		return $controls;
	}

	/**
	 * Enqueue the blocks inside Gutenberg.
	 */
	public function editor_assets() {
		wp_enqueue_script(
			'block-lab-pokemon-control',
			trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'js/scripts.js',
			array( 'block-lab-blocks', 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-api-fetch' ),
			$this->version,
			true
		);
	}
}
