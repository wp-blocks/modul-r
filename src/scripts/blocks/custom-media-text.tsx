import { registerBlockVariation } from '@wordpress/blocks';
import { addFilter } from '@wordpress/hooks';

import { createHigherOrderComponent } from '@wordpress/compose';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';
import { more } from '@wordpress/icons';
import { __ } from '@wordpress/i18n';

/** The Block namespace */
export const NAMESPACE = 'custom-media-text';

/** Registering a variation of the core/media-text block. */
registerBlockVariation( 'core/media-text', {
	name: NAMESPACE,
	title: 'Custom media-text',
	icon: more,
	attributes: {
		className: 'animated',
		align: '',
		additionalClassName: '',
	},
	isActive: ( blockAttributes ) =>
		blockAttributes.namespace.includes( NAMESPACE ),
} );

/** It's adding a custom classname to the image. */
const customMediaTextEdit = createHigherOrderComponent( ( BlockEdit ) => {
	return ( props ) => {
		const {
			attributes: { namespace, additionalClassName },
			setAttributes,
			isSelected,
		} = props;

		/* It's checking if the block is selected and if it's the right block. */
		if ( namespace !== NAMESPACE || ! isSelected ) {
			return <BlockEdit { ...props } />;
		}

		// Render the block editor and display the query post loop.
		return (
			<>
				<BlockEdit { ...props } />
				<InspectorControls>
					<PanelBody
						key={ namespace }
						title={ 'Custom ClassName' }
						icon={ more }
						initialOpen={ true }
					>
						<TextControl
							label={ __( 'Additional Image Classname' ) }
							value={ additionalClassName }
							onChange={ ( value ) =>
								setAttributes( {
									additionalClassName: value,
								} )
							}
						/>
					</PanelBody>
				</InspectorControls>
			</>
		);
	};
}, 'withInspectorControl' );
addFilter( 'editor.BlockEdit', NAMESPACE, customMediaTextEdit );
