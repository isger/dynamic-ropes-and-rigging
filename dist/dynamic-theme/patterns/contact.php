<?php
/**
 * Title: Contact
 * Slug: dynamic-rigging/contact
 * Categories: dynamic-rigging
 *
 * @package dynamic-rigging
 */

$drr_biz = drr_business();
?>
<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<section class="wp-block-group alignfull has-surface-background-color has-background" id="contact" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">

	<!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-top">

		<!-- wp:column {"verticalAlignment":"top","width":"42%"} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:42%">
			<!-- wp:paragraph {"className":"drr-eyebrow"} -->
			<p class="drr-eyebrow">For all your stunt requirements</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2} -->
			<h2 class="wp-block-heading">Contact us</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Tell us about the shoot: dates, location and what needs to fly. Call or email us direct. The form below reaches the same inbox.</p>
			<!-- /wp:paragraph -->

			<!-- wp:html -->
			<div class="drr-contact__direct">
				<?php echo drr_tel_link( 'drr-tel drr-contact__link', 20 ); // phpcs:ignore WordPress.Security.EscapeOutput -- escaped in the helper. ?>
				<?php echo drr_email_link( 'drr-tel drr-contact__link', 20 ); // phpcs:ignore WordPress.Security.EscapeOutput -- escaped in the helper. ?>
			</div>

			<address class="drr-contact__detail" style="margin-top:1.5rem;color:var(--wp--preset--color--muted)">
				<?php echo esc_html( $drr_biz['name'] ); ?><br />
				<?php foreach ( $drr_biz['address_lines'] as $drr_line ) : ?>
					<?php echo esc_html( $drr_line ); ?><br />
				<?php endforeach; ?>
				<?php echo esc_html( $drr_biz['postcode'] ); ?>
			</address>

			<span class="drr-social" style="margin-top:1.5rem">
				<a href="<?php echo esc_url( $drr_biz['facebook'] ); ?>" target="_blank" rel="noopener" aria-label="Dynamic Ropes and Rigging on Facebook">
					<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false"><path d="M22 12a10 10 0 1 0-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.78l-.45 2.89h-2.33v6.99A10 10 0 0 0 22 12z"></path></svg>
				</a>
				<a class="drr-social__pill" href="<?php echo esc_url( $drr_biz['imdb'] ); ?>" target="_blank" rel="noopener">IMDb</a>
			</span>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"top"} -->
		<div class="wp-block-column is-vertically-aligned-top">
			<!-- wp:shortcode -->
			[drr_contact_form]
			<!-- /wp:shortcode -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</section>
<!-- /wp:group -->
