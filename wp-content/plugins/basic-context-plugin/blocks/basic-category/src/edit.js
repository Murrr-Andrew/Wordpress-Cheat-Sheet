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
import { useBlockProps, InspectorControls, InnerBlocks } from '@wordpress/block-editor';

import { PanelBody, QueryControls } from '@wordpress/components';
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
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { categoryId } = attributes;
	const query = { per_page: -1, hide_empty: true };
	const allCategories = useSelect( (select) => {
		return select( 'core' ).getEntityRecords( 'taxonomy', 'category', query );
	},[] );

	const onCategoryChange = (value) => {
		setAttributes( { categoryId: parseInt(value) } );
	}

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Set category', 'basic-category' ) } initialOpen={ true }>
					<QueryControls
						categoriesList={ allCategories }
						selectedCategoryId={ categoryId }
						onCategoryChange={ onCategoryChange }
					/>
				</PanelBody>
			</InspectorControls>
			<div {...useBlockProps()}>
				<InnerBlocks />
			</div>
		</>
	);
}
