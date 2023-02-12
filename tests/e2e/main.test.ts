/**
 * Load utilities from the e2e-test-utils package.
 */
// Load utilities from the e2e-test-utils package.
import { visitAdminPage } from '@wordpress/e2e-test-utils';
import 'expect-puppeteer';

// Name of the test suite.
describe( 'It works!', () => {
	it( 'Should load properly admin', async () => {
		// Navigate the admin and performs tasks
		// Use Puppeteer APIs to interacte with mouse, keyboard...
		await visitAdminPage( '/' );

		// Assertions
		const nodes = await page.$x(
			'//h2[contains(text(), "Welcome to WordPress!")]'
		);
		expect( nodes.length ).not.toEqual( 0 );
	}, 60000 );
} );

describe( 'It works!', () => {
	beforeAll( async () => {
		await page.goto( HOMEPAGE );
	} );

	it( 'Should load properly front-facing website', async () => {
		// Assertions
		const title = await page.title();
		expect( title ).toEqual( 'modul-r' );
	}, 60000 );
} );
