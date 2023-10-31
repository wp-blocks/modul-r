/* The animation metadata stored into html markup */
import {SwiperOptions} from "swiper";

export type AnimationDataset = {
	animation?: string;
	counter?: string;
	duration: string;
	delay: string;
	isAnimating?: string;
	repeat?: string;
	easing?: string;
};

export type AnimationsCounterOptions = {
	type: string;
	delay: string;
	duration: string;
	startValue: string;
	endValue: string;
};


/**
 * Custom options
 */
export type SliderContainerConfig = {
	selector: string;
	container: 'gallery' | 'group' | 'covers' | 'query-loop';
	slidesPerView: number | 'auto';
	autoplay?: boolean;
	spaceBetween?: number;
	fitHeight?: boolean;
	keyboard?: boolean;
	fade?: boolean;
	navigation?: boolean;
	pagination?: 'bullets' | 'scrollbar' | 'fraction' | 'progressbar';
	captionsAnimation?: boolean;
	breakpoints?: SwiperOptions[ 'breakpoints' ]
};
