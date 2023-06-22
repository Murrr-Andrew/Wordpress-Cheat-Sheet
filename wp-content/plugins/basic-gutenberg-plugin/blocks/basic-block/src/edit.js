/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, ColorPalette, InspectorControls } from '@wordpress/block-editor';
import { TextControl } from '@wordpress/components';

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
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit( { attributes, setAttributes } ) {
	const onChangeBGColor = ( hexColor ) => {
		setAttributes( { bg_color: hexColor } );
	};

	const onChangeTextColor = ( hexColor ) => {
		setAttributes( { text_color: hexColor } );
	};

    return (
		<div { ...useBlockProps() }>
			<InspectorControls key="setting">
				<div id="basic-block-controls">
					<fieldset>
						<legend className="blocks-base-control__label">
							{ __( 'Background color', 'basic-block' ) }
						</legend>
						<ColorPalette
							onChange={ onChangeBGColor }
						/>
					</fieldset>
					<fieldset>
						<legend className="blocks-base-control__label">
							{ __( 'Text color', 'basic-block' ) }
						</legend>
						<ColorPalette
							onChange={ onChangeTextColor }
						/>
					</fieldset>
				</div>
			</InspectorControls>
			<TextControl
                    value={ attributes.message }
                    onChange={ ( val ) => setAttributes( { message: val } ) }
                    style={ {
                        backgroundColor: attributes.bg_color,
                        color: attributes.text_color,
                    } }
                />
		</div>
    );
}
