<?php
/**
 * Title: Footer
 * Slug: dynamic-rigging/footer
 * Categories: dynamic-rigging
 * Block Types: core/template-part/footer
 * Inserter: no
 *
 * @package dynamic-rigging
 */

$drr_biz = drr_business();
?>
<!-- wp:html -->
<footer class="drr-footer">
	<div class="drr-footer__inner">
		<p style="margin:0">
			&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( $drr_biz['name'] ); ?><br />
			<?php echo esc_html( implode( ', ', $drr_biz['address_lines'] ) . ' ' . $drr_biz['postcode'] ); ?>
		</p>
		<p class="drr-footer__contact" style="margin:0">
			<?php echo drr_tel_link( 'drr-tel', 0 ); // phpcs:ignore WordPress.Security.EscapeOutput -- escaped in the helper. ?>
			<?php echo drr_email_link( 'drr-tel', 0 ); // phpcs:ignore WordPress.Security.EscapeOutput -- escaped in the helper. ?>
		</p>
	</div>
</footer>
<!-- /wp:html -->
