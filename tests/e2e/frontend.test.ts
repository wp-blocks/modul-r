/**
 * Load utilities from the e2e-test-utils package.
 */

describe( 'Frontend works!', () => {
	beforeAll( async () => {
		await page.goto( 'http://localhost:8889/' );
	}, 15000 );

	it( 'Should take the screenshot of the homepage', async () => {
		await page.setViewport( { height: 900, width: 1200 } );

		// Take the screenshot of the page with puppeteer
		const image = await page.screenshot( {
			path: './screenshot.png',
			fullPage: false,
		} );

		expect( image ).toBeTruthy();
	} );

	it( 'Should load properly front-facing website', async () => {
		// Assertions
		const nodes = await page.$x( '//h1 /a[contains(text(), "modul-r")]' );
		expect( nodes.length ).not.toEqual( 0 );
	} );
} );
