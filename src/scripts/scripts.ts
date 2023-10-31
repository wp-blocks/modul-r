/* Swiper slider */
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/scrollbar';
import 'swiper/css/effect-fade';
import './modules/slider.scss';

/* Lightbox */
import 'glightbox/dist/css/glightbox.min.css';
import './modules/lightbox.scss';

/* Masonry */
import './modules/masonry.scss';

/* Timeline */
import './modules/timeline.scss';

/* Select */
import 'choices.js/public/assets/styles/choices.css';
import './modules/select.scss';

import { modulrLightboxController } from './modules/lightbox';
import { modulrSliderController } from './modules/slider';
import { modulrScrollControl } from './modules/scrollControl';
import { modulrAnimations } from './modules/animations';
import { modulrMasonryController } from './modules/masonry';
import { modulrSelectController } from './modules/select';
import { modulrGrid } from './modules/grid';

window.addEventListener( 'DOMContentLoaded', () => {
	/* enable scroll animations */
	modulrScrollControl();
	/* enable on-screen animations */
	modulrAnimations();
	/* enable sliders */
	modulrSliderController();
	/* enable oxone like animation for grid elements */
	modulrGrid();
} );

window.addEventListener( 'load', () => {
	/* enable masonry layout */
	modulrMasonryController();
	/* enable light-boxes */
	modulrLightboxController();
	/* enable fancy select */
	modulrSelectController();
} );
