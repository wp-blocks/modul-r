import { createHigherOrderComponent } from '@wordpress/compose';
import { InspectorControls } from '@wordpress/block-editor';
import {
	CheckboxControl,
	PanelBody,
	SelectControl,
} from '@wordpress/components';
import { animationList } from './animations';
import { __ } from '@wordpress/i18n';

export const customMediaTextEdit = createHigherOrderComponent(
	( BlockEdit ) => {
		return ( props ) => {
			const {
				attributes: { namespace, additionalClassName, repeatAnimation },
				setAttributes,
				isSelected,
			} = props;

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
	},
	'withInspectorControl'
);
