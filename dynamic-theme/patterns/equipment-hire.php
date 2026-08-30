<?php
/**
 * Title: Equipment hire
 * Slug: dynamic-rigging/equipment-hire
 * Categories: dynamic-rigging
 *
 * @package dynamic-rigging
 */

$drr_uri = get_stylesheet_directory_uri();
?>
<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"surface","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<section class="wp-block-group alignfull has-surface-background-color has-background" id="hire" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">

	<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:paragraph {"className":"drr-eyebrow"} -->
			<p class="drr-eyebrow">Also available worldwide</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2} -->
			<h2 class="wp-block-heading">Stunt equipment and harness rental</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"large"} -->
			<p class="has-large-font-size">In addition to our stunt rigging service, we offer for hire a comprehensive range of rigging equipment purpose built for the movie and stunt industry.</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p>From stunt flying harnesses to truss and flying winches. Subject to your requirements, these are available for short or long term use. Please contact us to discuss your individual requirements.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contact">Enquire about hire</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"48%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:48%">
			<!-- wp:html -->
			<div class="drr-hire__media">
				<figure>
					<img src="<?php echo esc_url( $drr_uri . '/assets/img/hire-camera.jpg' ); ?>"
						srcset="<?php echo esc_attr( "{$drr_uri}/assets/img/hire-camera-600.jpg 600w, {$drr_uri}/assets/img/hire-camera.jpg 750w" ); ?>"
						sizes="(min-width: 782px) 24vw, 46vw"
						width="750" height="1000" loading="lazy" decoding="async"
						alt="A camera body rigged to a DMM suspension plate and pulley, held up on set." />
				</figure>
				<figure>
					<img src="<?php echo esc_url( $drr_uri . '/assets/img/hire-1.jpg' ); ?>"
						srcset="<?php echo esc_attr( "{$drr_uri}/assets/img/hire-1-400.jpg 400w, {$drr_uri}/assets/img/hire-1.jpg 556w" ); ?>"
						sizes="(min-width: 782px) 24vw, 46vw"
						width="556" height="372" loading="lazy" decoding="async"
						alt="A red and silver truss rig suspended from a crane above a pine forest." />
				</figure>
				<figure>
					<img src="<?php echo esc_url( $drr_uri . '/assets/img/hire-2.jpg' ); ?>"
						srcset="<?php echo esc_attr( "{$drr_uri}/assets/img/hire-2-400.jpg 400w, {$drr_uri}/assets/img/hire-2.jpg 556w" ); ?>"
						sizes="(min-width: 782px) 24vw, 46vw"
						width="556" height="372" loading="lazy" decoding="async"
						alt="A tower and truss flying rig silhouetted against an overcast sky, with a harness hanging from it." />
				</figure>
			</div>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</section>
<!-- /wp:group -->
