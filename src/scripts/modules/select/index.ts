/* Select */
import 'choices.js/public/assets/styles/choices.css';
import './style.scss';

/**
 * The `modulrSelectController` function selects all multiple select elements on the page and
 * initializes the Choices library to enhance their functionality.
 */
export async function modulrSelectController() {
	const selects = document.querySelectorAll( 'select[multiple]' );

	if ( selects.length === 0 ) {
		return;
	}

	const Choices = await import( 'choices.js' );

	selects?.forEach( ( sel ) => {
		new Choices.default( sel, {
			removeItemButton: true,
		} );
	} );
}
