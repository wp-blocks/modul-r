/**
 * The above type defines the properties of a lightbox element, including its href, srcset, and title.
 *
 * @property {string}        href   The href property is a string that represents the URL of the image that
 *                                  will be displayed in the lightbox.
 * @property {string | null} srcset `srcset` is a property that specifies the URL of an image and its
 *                                  corresponding image sizes. It is used to provide multiple versions of an image with different
 *                                  resolutions, so that the browser can choose the most appropriate one based on the device's screen
 *                                  size and resolution. If there is only one version
 * @property {string}        title  The `title` property in the `LIGHTBOX_EL` type represents the title of
 *                                  the image or media element that will be displayed in the lightbox.
 */
export interface LIGHTBOX_EL {
	href: string;
	srcset: string | null;
	title: string;
}
