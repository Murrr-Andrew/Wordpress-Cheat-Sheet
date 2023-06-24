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
import { useSelect } from '@wordpress/data';

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

export default function Edit( { attributes: { numPosts, bgColor, textColor }, setAttributes } ) {
	
	const blockProps = useBlockProps();
	const posts = useSelect( ( select ) => {
		return select( 'core' ).getEntityRecords( 'postType', 'post', {
			per_page: numPosts,
		} );
	}, [numPosts] );

	const onChangeBGColor = ( hexColor ) => {
		setAttributes( { bgColor: hexColor } );
	};
	const onChangeTextColor = ( newColor ) => {
		setAttributes( { textColor: newColor } );
	};
	const onChangeNumPosts = (value) => {
		setAttributes( { numPosts: parseInt(value, 10) || 0 } );
	};

	if ( ! posts ) {
		return null;
	}

	return (
		<div { ...blockProps }>
			<InspectorControls key="setting">
				<fieldset>
					<legend className="blocks-base-control__label">
						{ __( 'Background color' ) }
					</legend>
					<ColorPalette
						onChange={ onChangeBGColor }
					/>
				</fieldset>
				<fieldset>
					<legend className="blocks-base-control__label">
						{ __( 'Text color' ) }
					</legend>
					<ColorPalette
						value={ textColor }
						onChange={ onChangeTextColor }
					/>
				</fieldset>
				<fieldset>
                    <legend className="blocks-base-control__label">
                        { __( 'Number of posts' ) }
                    </legend>
                    <TextControl 
                        type="number"
                        min="0"
                        value={ numPosts }
                        onChange={ onChangeNumPosts }
                    />
                </fieldset>
			</InspectorControls>

			{ !! posts.length && 
				posts.map((post, index) => (
					<div style={{ backgroundColor: bgColor }}>
                		<a key={index} href={post.link} style={{ color: textColor }}>{post.title.rendered}</a>
					</div>
            	)) 
			}
		</div>
	)
}
