# Block Lab – Pokémon Control

This is a simple add-on for [Block Lab](https://github.com/getblocklab/block-lab/), which demonstrates how to extend the plugin with a custom control type.

It starts with the `block_lab_controls` filter. In `Plugin`, we instantiate a new `Control`, and add it to Block Lab's list of controls.

Next we create the Javascript portion of our control. The `pokemon-control.js` file renders a simple select drop-down inside the WordPress Editor.

We also need to add this control to Block Lab's known controls using WordPress' JavaScript filters, using the `block_lab_controls` filter in `index.js`.

Lastly, we ensure that this JavaScript is correctly loaded during the `enqueue_block_editor_assets` action. Back in `Plugin`, we enqueue the built `scripts.js`.

That's it! If you have any questions about extending Block Lab with controls, please leave them as an Issue in this repo.

---

**Don't Forget!**

To run this add-on in WordPress, first build the Javascript using `npm install`, then `npm run build`.
