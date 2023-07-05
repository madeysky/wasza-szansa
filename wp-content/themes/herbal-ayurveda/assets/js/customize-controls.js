( function( api ) {

	// Extends our custom "herbal-ayurveda" section.
	api.sectionConstructor['herbal-ayurveda'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );