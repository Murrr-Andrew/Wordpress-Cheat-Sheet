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
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function save( { attributes } ) {
	const config = {
		'speed': attributes.speed,
		'loop': attributes.loop,
		'autoplay': attributes.autoplay,
		'delay': attributes.delay,
		'slidesPerView': attributes.slidesPerViewMobile,
		'spaceBetween': attributes.spaceBetweenMobile,
		'lazyLoading': true,
		'breakpoints': {
			768: {
				'slidesPerView': attributes.slidesPerViewTablet,
				'spaceBetween': attributes.spaceBetweenTablet
			},
			1200: {
				'slidesPerView': attributes.slidesPerViewDesktop,
				'spaceBetween': attributes.spaceBetweenDesktop
			}
		}
	}

	return (
		<div { ...useBlockProps.save() } className='swiper swiper-container' data-config={JSON.stringify(config)}>
			<div className='swiper-wrapper'>
				<InnerBlocks.Content/>
			</div>
		</div>
	);
}
