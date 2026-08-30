<?php
/**
 * Title: Introduction
 * Slug: dynamic-rigging/intro
 * Categories: dynamic-rigging
 *
 * @package dynamic-rigging
 */

$drr_uri = get_stylesheet_directory_uri();
?>
<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<section class="wp-block-group alignfull has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">

	<!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-top">

		<!-- wp:column {"verticalAlignment":"top","width":"38%"} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:38%">
			<!-- wp:paragraph {"className":"drr-eyebrow"} -->
			<p class="drr-eyebrow">Who we are</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2} -->
			<h2 class="wp-block-heading">Stunt action design team</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"top"} -->
		<div class="wp-block-column is-vertically-aligned-top">
			<!-- wp:paragraph {"fontSize":"large"} -->
			<p class="has-large-font-size">We specialise in providing a specialist rigging service for stunt work in the movie business. We have over 30 years experience in the Motion Film and Dramatic arts industry supplying a professional premium quality service all around the world.</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p>Our clients range from major Hollywood blockbusters to television and commercials, offering a complete and comprehensive stunt rigging service for film set and crew safety. We travel and work internationally, on location and in the studio.</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","fontWeight":"500"}},"textColor":"accent-bright"} -->
			<p class="has-accent-bright-color has-text-color" style="font-style:italic;font-weight:500">Remember... we have a habit of leaving you hanging around... safely of course!</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:html -->
	<div class="drr-intro__media">
		<figure>
			<img src="<?php echo esc_url( $drr_uri . '/assets/img/team-set.jpg' ); ?>"
				srcset="<?php echo esc_attr( "{$drr_uri}/assets/img/team-set-640.jpg 640w, {$drr_uri}/assets/img/team-set-1000.jpg 1000w, {$drr_uri}/assets/img/team-set.jpg 1600w" ); ?>"
				sizes="(min-width: 782px) 46vw, 92vw"
				width="1600" height="1200" loading="lazy" decoding="async"
				alt="Four of the Dynamic Ropes and Rigging crew on a film set, in front of a large stained glass spiderweb window." />
		</figure>
		<figure>
			<img src="<?php echo esc_url( $drr_uri . '/assets/img/flying-crane.jpg' ); ?>"
				srcset="<?php echo esc_attr( "{$drr_uri}/assets/img/flying-crane-600.jpg 600w, {$drr_uri}/assets/img/flying-crane.jpg 874w" ); ?>"
				sizes="(min-width: 782px) 46vw, 92vw"
				width="874" height="584" loading="lazy" decoding="async"
				alt="Two performers in flying harnesses suspended from a crane-mounted rig, reaching for each other in mid-air." />
		</figure>
	</div>
	<!-- /wp:html -->

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"textColor":"accent","fontSize":"x-large"} -->
			<h3 class="wp-block-heading has-accent-color has-text-color has-x-large-font-size">30+ years</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
			<p class="has-muted-color has-text-color has-small-font-size">In motion film and the dramatic arts</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"textColor":"accent","fontSize":"x-large"} -->
			<h3 class="wp-block-heading has-accent-color has-text-color has-x-large-font-size">Worldwide</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
			<p class="has-muted-color has-text-color has-small-font-size">Working internationally, on location and in the studio</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3,"textColor":"accent","fontSize":"x-large"} -->
			<h3 class="wp-block-heading has-accent-color has-text-color has-x-large-font-size">Film, TV &amp; ads</h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
			<p class="has-muted-color has-text-color has-small-font-size">From blockbusters to commercials</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

</section>
<!-- /wp:group -->
