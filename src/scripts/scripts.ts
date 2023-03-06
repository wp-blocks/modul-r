/* Blaze slider */
import 'blaze-slider/dist/blaze.css';
import './user/slider.scss';

/* Lightbox */
import 'glightbox/dist/css/glightbox.min.css';
import './user/lightbox.scss';

/* Lightbox */
import 'glightbox/dist/css/glightbox.min.css';
import './user/lightbox.scss';

/* Masonry */
import './user/masonry.scss';

import { modulrLightboxController } from './user/lightbox';
import { modulrSliderController } from './user/slider';
import { modulrScrollControl } from './user/scrollControl';
import { modulrAnimations } from './user/animations';
import { modulrMasonryController } from './user/masonry';

document.addEventListener( 'DOMContentLoaded', () => {
	/* enable lightboxes */
	modulrLightboxController();
	/* enable sliders */
	modulrSliderController();
	/* enable masonry layout */
	modulrMasonryController();
	/* enable scroll animations */
	modulrScrollControl();
	/* enable on-screen animations */
	modulrAnimations();
} );
