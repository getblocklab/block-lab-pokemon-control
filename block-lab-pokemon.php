<?php
/**
 * Block Lab – Pokémon Control
 *
 * @package   Block_Lab_Pokémon
 * @copyright Copyright(c) 2019, Block Lab
 * @license http://opensource.org/licenses/GPL-2.0 GNU General Public License, version 2 (GPL-2.0)
 *
 * Plugin Name: Block Lab – Pokémon Control
 * Plugin URI: https://getblocklab.com
 * Description: Adds a Pokémon selector control to Block Lab.
 * Version: 1.0
 * Author: Block Lab
 * Author URI: https://getblocklab.com
 * License: GPL2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: block-lab-pokemon
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin notice for the Block Lab plugin requirement.
 */
function block_lab_pokemon_requirements_error() {
	printf(
		'<div class="error"><p>%s</p></div>',
		esc_html(
			__( 'Block Lab – Pokémon Control error: You must have Block Lab installed and active before using this add-on plugin.', 'block-lab-pokemon' )
		)
	);
}

/**
 * Get the plugin object.
 *
 * @return \Block_Lab_Pokemon\Plugin
 */
function block_lab_pokemon() {
	static $instance;

	if ( null === $instance ) {
		require 'php/class-plugin.php';
		$instance = new \Block_Lab_Pokemon\Plugin();
	}

	return $instance;
}

/**
 * Setup the plugin instance during plugins_loaded, so that the main Block Lab plugin is ready.
 */
function block_lab_pokemon_init() {
	if ( ! function_exists( 'block_lab' ) ) {
		add_action( 'admin_notices', 'block_lab_pokemon_requirements_error' );
		return;
	}

	block_lab_pokemon()->plugin_loaded();
}
add_action( 'plugins_loaded', 'block_lab_pokemon_init' );
