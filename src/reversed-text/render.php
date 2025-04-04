<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

$content = isset($attributes['content']) ? $attributes['content'] : '';
$content = wp_kses_post( $content );

?>
<p <?= get_block_wrapper_attributes(); ?>>
	<?= $content ?>
</p>
