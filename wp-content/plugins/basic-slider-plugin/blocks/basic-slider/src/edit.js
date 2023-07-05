/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-block-editor/#useBlockProps
 */
import { useBlockProps, InnerBlocks, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, __experimentalNumberControl as NumberControl } from '@wordpress/components';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit( { attributes, setAttributes } ) {

	const onChangeSpeed = ( value ) => { setAttributes( { speed: parseInt(value) } ); };
	// const onChangeLoop 	= ( loop ) => { setAttributes( { loop: loop } ); };
	// const onChangeAutoplay = ( autoplay ) => { setAttributes( { autoplay: autoplay } ); };
	// const onChangeDelay = ( delay ) => { setAttributes( { delay: delay } ); };
 
	return (
		<div { ...useBlockProps() }>
			<InspectorControls key="setting">
				<PanelBody title="Global settings" initialOpen={ true } >
					<NumberControl 
						label={ __( 'Animation duration in miliseconds', 'bsp') }
						isShiftStepEnabled={ true }
						onChange={ onChangeSpeed }
						shiftStep={ 100 }
						step={ 100 }
						min={ 100 }
						value={ attributes.speed }
					/>
				</PanelBody>
			</InspectorControls>
			<InnerBlocks />
		</div>
	);
}
