<?php
/**
 * Title: Services
 * Slug: dynamic-rigging/services
 * Categories: dynamic-rigging
 *
 * @package dynamic-rigging
 */

$drr_uri = get_stylesheet_directory_uri();

/*
 * Copy is carried over from the existing site, with "discrete" corrected to
 * "discreet". Images are the same photographs, taken from the retina sources.
 */
$drr_services = array(
	array(
		'slug'   => 'service-crew',
		'title'  => 'Film Crew Safety Rigging',
		'body'   => 'An example of our film set safety rigging for a camera crew harnessed into position, filming on location off a precarious rocky cliff face.',
		'alt'    => 'A camera crew harnessed into safety rigging while filming on a steep rocky cliff face under a clear blue sky.',
		// Widest variant first; the file with no suffix is the largest.
		'widths' => array( 874, 640, 440 ),
	),
	array(
		'slug'   => 'service-actor',
		'title'  => 'Actor Safety Rigging',
		'body'   => 'Performers harnessed out in our safety rigging on location, with the hardware kept to a discreet profile so it stays hidden under costume on camera.',
		'alt'    => 'A rigger on a dam with four performers in costume and body harnesses, rigged on descent lines.',
		'widths' => array( 1400, 900, 600 ),
	),
	array(
		'slug'   => 'service-flying',
		'title'  => 'Flying Actor Scene Safety Rigging',
		'body'   => 'Flying scenes rigged in the studio and on location, where performers are harnessed out on wires and flown to the shot while the rig stays out of frame.',
		'alt'    => 'A performer in a football kit flown horizontally on a wire against a white studio cyclorama, guided by a rigger.',
		'widths' => array( 1400, 900, 600 ),
	),
);
?>
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<section class="wp-block-group alignfull" id="services" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">

	<!-- wp:paragraph {"className":"drr-eyebrow"} -->
	<p class="drr-eyebrow">What we do</p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":2} -->
	<h2 class="wp-block-heading">Stunt rigging and safety on set</h2>
	<!-- /wp:heading -->

	<!-- wp:html -->
	<ul class="drr-capabilities">
		<li>Stunt coordinator</li>
		<li>Head stunt rigger</li>
		<li>Wire rigging specialist</li>
		<li>Stunt performer</li>
		<li>Film set and crew safety rigging</li>
		<li>Stunt equipment and harness rental</li>
	</ul>
	<!-- /wp:html -->

<?php foreach ( $drr_services as $drr_i => $drr_s ) : ?>
	<?php $drr_reverse = ( 1 === $drr_i % 2 ) ? ' drr-service--reverse' : ''; ?>

	<!-- wp:columns {"verticalAlignment":"center","className":"drr-service<?php echo esc_attr( $drr_reverse ); ?>","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|40"},"margin":{"bottom":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center drr-service<?php echo esc_attr( $drr_reverse ); ?>" style="margin-bottom:var(--wp--preset--spacing--40)">

		<!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
			<!-- wp:html -->
			<?php
			$drr_w   = $drr_s['widths'];
			$drr_max = $drr_w[0];
			$drr_set = array();
			foreach ( $drr_w as $drr_i2 => $drr_width ) {
				$drr_file  = 0 === $drr_i2 ? "{$drr_s['slug']}.jpg" : "{$drr_s['slug']}-{$drr_width}.jpg";
				$drr_set[] = "{$drr_uri}/assets/img/{$drr_file} {$drr_width}w";
			}
			?>
			<figure>
				<img src="<?php echo esc_url( "{$drr_uri}/assets/img/{$drr_s['slug']}.jpg" ); ?>"
					srcset="<?php echo esc_attr( implode( ', ', array_reverse( $drr_set ) ) ); ?>"
					sizes="(min-width: 782px) 46vw, 92vw"
					width="<?php echo esc_attr( $drr_max ); ?>" height="<?php echo esc_attr( (int) round( $drr_max / 1.5 ) ); ?>"
					loading="lazy" decoding="async"
					alt="<?php echo esc_attr( $drr_s['alt'] ); ?>" />
			</figure>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading"><?php echo esc_html( $drr_s['title'] ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php echo esc_html( $drr_s['body'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->
<?php endforeach; ?>

</section>
<!-- /wp:group -->
