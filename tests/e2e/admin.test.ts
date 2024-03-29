/**
 * Load utilities from the e2e-test-utils package.
 */
// Load utilities from the e2e-test-utils package.
import { visitAdminPage } from '@wordpress/e2e-test-utils';

// Name of the test suite.
describe( 'Admin works!', () => {
	it( 'Should load properly admin', async () => {
		// Navigate the admin and performs tasks
		// Use Puppeteer APIs to interact with mouse, keyboard...
		await visitAdminPage( '/' );

		// Assertions
		const nodes = await page.$x(
			'//h2[contains(text(), "Welcome to WordPress!")]'
		);
		expect( nodes.length ).not.toEqual( 0 );
	}, 60000 );
} );
