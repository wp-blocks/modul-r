import { modulrLightboxController } from './modules/lightbox';
import { modulrSliderController } from './modules/slider';
import { modulrScrollControl } from './modules/scrollControl';
import { modulrAnimations } from './modules/animations';
import { modulrMasonryController } from './modules/masonry';
import { modulrSelectController } from './modules/select';
import { modulrGrid } from './modules/grid';
import { modulrScrollTo } from './modules/scroll/scroll';
import { backToTop } from './modules/backToTop';
import { modulrSidebarController } from './modules/mobileSidebar';
import { modulrVivusController } from './modules/animateSvg';
import { modulrPageableController } from './modules/pageable';
import { modulrNavigationAccordionController } from './modules/navigation-accordion';

window.addEventListener( 'DOMContentLoaded', async () => {
	/* create a back-to-top button */
	backToTop();
	/* enable scroll animations */
	modulrScrollControl();
	/* enable on-screen animations */
	modulrAnimations();
	/* enable sliders */
	modulrSliderController();
	/* enable oxone like animation for grid elements */
	modulrScrollTo();
	/* enable oxone like animation for grid elements */
	modulrGrid();
} );

window.addEventListener( 'load', async () => {
	/* enable masonry layout */
	modulrMasonryController();
	/* enable fancy select */
	modulrSelectController();
	/* enable light-boxes */
	modulrLightboxController();
	/* enable mobile sidebar */
	modulrSidebarController();
	/* enable Vivus animations */
	modulrVivusController();
	/* enable pageable */
	modulrPageableController();
	/* enable navigation accordion */
	modulrNavigationAccordionController();
} );
