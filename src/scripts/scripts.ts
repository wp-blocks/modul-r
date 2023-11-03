import { modulrLightboxController } from './modules/lightbox';
import { modulrSliderController } from './modules/slider';
import { modulrScrollControl } from './modules/scrollControl';
import { modulrAnimations } from './modules/animations';
import { modulrMasonryController } from './modules/masonry';
import { modulrSelectController } from './modules/select';
import { modulrGrid } from './modules/grid';

window.addEventListener( 'DOMContentLoaded', async () => {
	/* enable scroll animations */
	modulrScrollControl();
	/* enable on-screen animations */
	modulrAnimations();
	/* enable sliders */
	modulrSliderController();
	/* enable oxone like animation for grid elements */
	modulrGrid();
} );

window.addEventListener( 'load', async () => {
	/* enable masonry layout */
	modulrMasonryController();
	/* enable light-boxes */
	modulrLightboxController();
	/* enable fancy select */
	modulrSelectController();
} );
