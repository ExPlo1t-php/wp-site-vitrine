( function( api ) {

	// Extends our custom "classic-ecommerce" section.
	api.sectionConstructor['classic-ecommerce'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );