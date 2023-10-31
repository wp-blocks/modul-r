/**
 * Animation easeInOutCubic animation algorithm.
 *
 * @param {number} t The current time.
 */
export function easeInOutCubic( t: number ): number {
	{
		return t < 0.5
			? 4 * t * t * t
			: ( t - 1 ) * ( 2 * t - 2 ) * ( 2 * t - 2 ) + 1;
	}
}

/**
 * This function returns a promise that resolves after the given number of milliseconds.
 *
 * @param {number} ms The number of milliseconds to delay.
 */
export const delay = ( ms: number ) =>
	new Promise( ( r ) => setTimeout( r, ms ) );
