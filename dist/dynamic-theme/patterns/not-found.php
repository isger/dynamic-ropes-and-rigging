<?php
/**
 * Title: Not found content
 * Slug: dynamic-rigging/not-found
 * Categories: dynamic-rigging
 * Inserter: no
 *
 * @package dynamic-rigging
 */

?>
<!-- wp:paragraph {"className":"drr-eyebrow"} -->
<p class="drr-eyebrow">404</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading">Nothing rigged here</h1>
<!-- /wp:heading -->

<!-- wp:html -->
<p class="drr-measure">
	That page does not exist. Head back to the <a href="<?php echo esc_url( home_url( '/' ) ); ?>">home page</a>
	or call us on <?php echo drr_tel_link( 'drr-tel', 0 ); // phpcs:ignore WordPress.Security.EscapeOutput -- escaped in the helper. ?>.
</p>
<!-- /wp:html -->
