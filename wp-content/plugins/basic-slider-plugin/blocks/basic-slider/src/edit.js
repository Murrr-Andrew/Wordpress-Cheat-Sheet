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
import { useEffect } from '@wordpress/element';
import { useBlockProps, InnerBlocks, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, __experimentalNumberControl as NumberControl, ToggleControl } from '@wordpress/components';

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
	return (
		<div { ...useBlockProps() }>
			<InspectorControls key="setting">
				<PanelBody title="Global settings" initialOpen={ true } >
					<NumberControl 
						label={ __( 'Animation duration in miliseconds', 'bsp') }
						isShiftStepEnabled={ true }
						onChange={ ( value ) => { setAttributes( { speed: parseInt(value) } ) } }
						shiftStep={ 100 }
						step={ 100 }
						min={ 100 }
						value={ attributes.speed }
					/>
					<ToggleControl
            			label={ __( 'Loop', 'bsp') }
            			checked={ attributes.loop }
            			onChange={ ( value ) => { setAttributes( { loop: value } ) } }
        			/>
					<ToggleControl
            			label={ __( 'Autoplay', 'bsp') }
            			checked={ attributes.autoplay }
            			onChange={ ( value ) => { setAttributes( { autoplay: value } ) } }
        			/>
					{
						( attributes.autoplay ) && 
						(<NumberControl 
							label={ __( 'Animation delay in miliseconds', 'bsp') }
							isShiftStepEnabled={ true }
							onChange={ ( value ) => { setAttributes( { delay: parseInt(value) } ) } }
							shiftStep={ 100 }
							step={ 100 }
							min={ 100 }
							value={ attributes.delay }
						/>)
					}
				</PanelBody>
				<PanelBody title="Desktop settings" initialOpen={ false } >
					<NumberControl 
						label={ __( 'Slides to show', 'bsp') }
						isShiftStepEnabled={ true }
						onChange={ ( value ) => { setAttributes( { slidesPerViewDesktop: parseInt(value) } ) } }
						shiftStep={ 1 }
						step={ 1 }
						min={ 1 }
						value={ attributes.slidesPerViewDesktop }
					/>
					<ToggleControl
            			label={ __( 'Dots', 'bsp') }
            			checked={ attributes.dotsDesktop }
            			onChange={ ( value ) => { setAttributes( { dotsDesktop: value } ) } }
        			/>
					<ToggleControl
            			label={ __( 'Arrows', 'bsp') }
            			checked={ attributes.arrowsDesktop }
            			onChange={ ( value ) => { setAttributes( { arrowsDesktop: value } ) } }
        			/>
					<NumberControl 
						label={ __( 'Space between slides', 'bsp') }
						isShiftStepEnabled={ true }
						onChange={ ( value ) => { setAttributes( { spaceBetweenDesktop: parseInt(value) } ) } }
						shiftStep={ 1 }
						step={ 1 }
						min={ 0 }
						value={ attributes.spaceBetweenDesktop }
					/>
				</PanelBody>
				<PanelBody title="Tablet settings" initialOpen={ false } >
					<NumberControl 
						label={ __( 'Slides to show', 'bsp') }
						isShiftStepEnabled={ true }
						onChange={ ( value ) => { setAttributes( { slidesPerViewTablet: parseInt(value) } ) } }
						shiftStep={ 1 }
						step={ 1 }
						min={ 1 }
						value={ attributes.slidesPerViewTablet }
					/>
					<ToggleControl
            			label={ __( 'Dots', 'bsp') }
            			checked={ attributes.dotsTablet }
            			onChange={ ( value ) => { setAttributes( { dotsTablet: value } ) } }
        			/>
					<ToggleControl
            			label={ __( 'Arrows', 'bsp') }
            			checked={ attributes.arrowsTablet }
            			onChange={ ( value ) => { setAttributes( { arrowsTablet: value } ) } }
        			/>
					<NumberControl 
						label={ __( 'Space between slides', 'bsp') }
						isShiftStepEnabled={ true }
						onChange={ ( value ) => { setAttributes( { spaceBetweenTablet: parseInt(value) } ) } }
						shiftStep={ 1 }
						step={ 1 }
						min={ 0 }
						value={ attributes.spaceBetweenTablet }
					/>
				</PanelBody>
				<PanelBody title="Mobile settings" initialOpen={ false } >
					<NumberControl 
						label={ __( 'Slides to show', 'bsp') }
						isShiftStepEnabled={ true }
						onChange={ ( value ) => { setAttributes( { slidesPerViewMobile: parseInt(value) } ) } }
						shiftStep={ 1 }
						step={ 1 }
						min={ 1 }
						value={ attributes.slidesPerViewMobile }
					/>
					<ToggleControl
            			label={ __( 'Dots', 'bsp') }
            			checked={ attributes.dotsMobile }
            			onChange={ ( value ) => { setAttributes( { dotsMobile: value } ) } }
        			/>
					<ToggleControl
            			label={ __( 'Arrows', 'bsp') }
            			checked={ attributes.arrowsMobile }
            			onChange={ ( value ) => { setAttributes( { arrowsMobile: value } ) } }
        			/>
					<NumberControl 
						label={ __( 'Space between slides', 'bsp') }
						isShiftStepEnabled={ true }
						onChange={ ( value ) => { setAttributes( { spaceBetweenMobile: parseInt(value) } ) } }
						shiftStep={ 1 }
						step={ 1 }
						min={ 0 }
						value={ attributes.spaceBetweenMobile }
					/>
				</PanelBody>
			</InspectorControls>
			<InnerBlocks />
		</div>
	);
}
