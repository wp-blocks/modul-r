/**
 * The `delay` function is a TypeScript function that returns a promise that resolves after a specified
 * number of milliseconds.
 *
 * @param {number} ms - The parameter "ms" is a number that represents the duration of the delay in
 *                    milliseconds.
 */
export const delay = ( ms: number ) =>
	new Promise( ( f ) => setTimeout( f, ms ) );
