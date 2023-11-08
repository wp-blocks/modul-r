export function backToTop() {
	const button: HTMLDivElement = document.createElement( 'div' );
	button.setAttribute( 'id', 'backtotop' );
	const scrollToTop = () => {
		window.scrollTo( 0, 0 );
	};
	button.onclick = scrollToTop;
	document.body.appendChild( button );
	window.addEventListener( 'scroll', () => {
		if (
			window.scrollY >=
			( document.body.scrollHeight - window.innerHeight ) / 2
		) {
			document.body.classList.remove( 'above-the-fold' );
		} else {
			document.body.classList.add( 'above-the-fold' );
		}
	} );
}
