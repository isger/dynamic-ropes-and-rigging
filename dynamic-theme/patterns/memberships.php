<?php
/**
 * Title: Guild memberships
 * Slug: dynamic-rigging/memberships
 * Categories: dynamic-rigging
 *
 * @package dynamic-rigging
 */

$drr_uri = get_stylesheet_directory_uri();

/*
 * Both logos were supplied as JPEGs with backgrounds that could not sit on a
 * dark page. They are transparent PNGs here; the originals are kept in
 * media-archive/v3-logos/ with a note on how they were converted.
 */
$drr_memberships = array(
	array(
		'name' => 'The Stunt Guild',
		'file' => 'logo-stunt-guild.png',
		'w'    => 209,
		'h'    => 140,
	),
	array(
		'name' => 'Stunt Register Ireland',
		'file' => 'logo-stunt-register-ireland.png',
		'w'    => 306,
		'h'    => 140,
	),
);
?>
<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<section class="wp-block-group alignfull has-surface-background-color has-background" id="memberships" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">

	<!-- wp:html -->
	<div class="drr-memberships">
		<p class="drr-eyebrow drr-memberships__label">Guild memberships</p>
		<ul class="drr-logos">
			<?php foreach ( $drr_memberships as $drr_m ) : ?>
				<li>
					<img src="<?php echo esc_url( $drr_uri . '/assets/img/' . $drr_m['file'] ); ?>"
						width="<?php echo esc_attr( $drr_m['w'] ); ?>" height="<?php echo esc_attr( $drr_m['h'] ); ?>"
						loading="lazy" decoding="async"
						alt="<?php echo esc_attr( $drr_m['name'] ); ?>" />
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<!-- /wp:html -->

</section>
<!-- /wp:group -->
