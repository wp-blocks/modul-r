import { registerBlockVariation } from '@wordpress/blocks';
import { addFilter } from '@wordpress/hooks';

import { createHigherOrderComponent } from '@wordpress/compose';
import { InspectorControls } from '@wordpress/block-editor';
import {
	CheckboxControl,
	PanelBody,
	SelectControl,
} from '@wordpress/components';
import { mediaAndText } from '@wordpress/icons';
import { __ } from '@wordpress/i18n';
import { animationList } from './assets/animations';

/** The Block namespace */
export const NAMESPACE = 'custom-media-text';

registerBlockVariation( 'core/media-text', {
	name: NAMESPACE,
	title: 'Custom media-text',
	icon: mediaAndText,
	attributes: {
		className: 'animated',
		align: '',
		additionalClassName: '',
	},
	isActive: ( blockAttributes ) =>
		blockAttributes.namespace?.includes( 'animated' ),
} );

const customMediaTextEdit = createHigherOrderComponent( ( BlockEdit ) => {
	return ( props ) => {
		const {
			attributes: { namespace, additionalClassName, repeatAnimation },
			setAttributes,
			isSelected,
		} = props;

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
						title={ __( 'Animation Controls' ) }
						initialOpen={ true }
					>
						<SelectControl
							label={ __( 'Image Animation' ) }
							options={ animationList }
							value={ additionalClassName }
							onChange={ ( val ) =>
								setAttributes( {
									additionalClassName: val,
								} )
							}
						/>
						<CheckboxControl
							onChange={ () =>
								setAttributes( {
									repeatAnimation: ! repeatAnimation,
								} )
							}
							label={ __( 'Repeat Animation' ) }
							checked={ repeatAnimation }
						/>
					</PanelBody>
				</InspectorControls>
			</>
		);
	};
}, 'withInspectorControl' );

/**
 * infiniteLoop block Editor scripts
 */
addFilter( 'editor.BlockEdit', NAMESPACE, customMediaTextEdit );
