import BlockLabPokemonSelectControl from './pokemon-control'

const { addFilter } = wp.hooks

function block_lab_pokemon_add_controls( controls ) {
	controls['pokemon'] = BlockLabPokemonSelectControl
	return controls;
}
addFilter( 'block_lab_controls', 'Test', block_lab_pokemon_add_controls );
