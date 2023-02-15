// Modul-r scroll controller
import './user/scrollControl';

/* Blaze slider */
import 'blaze-slider/dist/blaze.css';
import './user/slider.scss';

/* Lightbox */
import 'glightbox/dist/css/glightbox.min.css';
import './user/lightbox.scss';

import { modulrLightboxController } from './user/lightbox';
import { modulrSliderController } from './user/slider';
import { modulrScrollControl } from './user/scrollControl';

document.addEventListener( 'DOMContentLoaded', () => {
	/* enable lightboxes */
	modulrLightboxController();
	/* enable sliders */
	modulrSliderController();
	/* enable scroll animations */
	modulrScrollControl();
} );
