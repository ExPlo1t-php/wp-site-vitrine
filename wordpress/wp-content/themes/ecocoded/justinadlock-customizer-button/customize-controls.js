( function( api ) {

	// Extends our custom "ecocoded" section.
	api.sectionConstructor['ecocoded'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
