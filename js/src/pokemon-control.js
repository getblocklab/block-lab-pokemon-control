import pokemon from '../../assets/pokemon.json'
const { SelectControl } = wp.components;

const BlockLabPokemonSelectControl = ( props, field, block ) => {
	const { setAttributes } = props
	const attr = { ...props.attributes }
	const { __ } = wp.i18n;

	field.options = [
		{ label: __( '– Select a Pokémon –', 'block-lab-pokemon' ), value: '', disabled: true },
		...pokemon
	]

	return (
		<SelectControl
			label={field.label}
			help={field.help}
			value={attr[ field.name ] || field.default}
			options={field.options}
			onChange={selectControl => {
				attr[ field.name ] = selectControl
				setAttributes( attr )
			}}
		/>
	)
}

export default BlockLabPokemonSelectControl