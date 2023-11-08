export function backToTop() {
	const button: HTMLDivElement = document.createElement( 'div' );
	button.setAttribute( 'id', 'backtotop' );
	const scrollToTop = () => {
		window.scrollTo( {
			top: 0,
			behavior: 'smooth',
		} );
	};
	button.onclick = scrollToTop;
	document.body.appendChild( button );
}
