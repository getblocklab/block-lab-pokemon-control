<?php
/**
 * Pokémon control.
 *
 * @package   Block_Lab_Pokemon
 * @copyright Copyright(c) 2019, Block Lab
 * @license http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2 (GPL-2.0)
 */

namespace Block_Lab_Pokemon;

use Block_Lab\Blocks\Controls\Control_Abstract;
use Block_Lab\Blocks\Controls\Control_Setting;

/**
 * Class Pokemon
 */
class Pokemon_Control extends Control_Abstract {

	/**
	 * Control name.
	 *
	 * @var string
	 */
	public $name = 'pokemon';

	/**
	 * Text constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
		$this->label = __( 'Pokémon', 'block-lab-pokemon' );
	}

	/**
	 * Register settings.
	 *
	 * @return void
	 */
	public function register_settings() {
		$this->settings[] = new Control_Setting(
			array(
				'name'    => 'default',
				'label'   => __( 'Default Value', 'block-lab' ),
				'type'    => 'pokemon',
				'default' => '',
				'values'  => array(
					'asd' => 'ASDF',
				),
			)
		);
		foreach ( array( 'location', 'help' ) as $setting ) {
			$this->settings[] = new Control_Setting( $this->settings_config[ $setting ] );
		}
	}

	/**
	 * Renders a <select> of pokemon.
	 *
	 * @param Control_Setting $setting The Control_Setting being rendered.
	 * @param string          $name    The name attribute of the option.
	 * @param string          $id      The id attribute of the option.
	 *
	 * @return void
	 */
	public function render_settings_pokemon( $setting, $name, $id ) {
		$file    = trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'assets/pokemon.json';
		$json    = file_get_contents( $file ); // @codingStandardsIgnoreLine
		$pokemon = json_decode( $json );
		$pokemon = wp_list_pluck( $pokemon, 'label', 'value' );
		$pokemon = array_merge( array( '' => __( 'No Default', 'block-lab-pokemon' ) ), $pokemon );
		$this->render_select( $setting, $name, $id, $pokemon );
	}
}
