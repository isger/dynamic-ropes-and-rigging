<?php
/**
 * Title: Showreel
 * Slug: dynamic-rigging/showreel
 * Categories: dynamic-rigging
 *
 * @package dynamic-rigging
 */

$drr_uri = get_stylesheet_directory_uri();
?>
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<section class="wp-block-group alignfull" id="showreel" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">

	<!-- wp:paragraph {"className":"drr-eyebrow"} -->
	<p class="drr-eyebrow">On the job</p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":2} -->
	<h2 class="wp-block-heading">Watch the rig work</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"drr-measure"} -->
	<p class="drr-measure">Rigging, descent lines and flying work, shot on location.</p>
	<!-- /wp:paragraph -->

	<!-- wp:spacer {"height":"var:preset|spacing|30"} -->
	<div style="height:var(--wp--preset--spacing--30)" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:html -->
	<figure class="drr-showreel">
		<video
			controls
			preload="none"
			playsinline
			width="1024" height="576"
			poster="<?php echo esc_url( $drr_uri . '/assets/img/showreel-poster.jpg' ); ?>">
			<source src="<?php echo esc_url( drr_showreel_src() ); ?>" type="video/mp4" />
			<p>Your browser cannot play this video. <a href="<?php echo esc_url( drr_showreel_src() ); ?>">Open it directly</a>.</p>
		</video>
	</figure>
	<!-- /wp:html -->

</section>
<!-- /wp:group -->
