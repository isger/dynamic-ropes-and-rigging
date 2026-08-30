<?php
/**
 * Title: Film credits
 * Slug: dynamic-rigging/credits
 * Categories: dynamic-rigging
 *
 * @package dynamic-rigging
 */

$drr_biz = drr_business();
$drr_uri = get_stylesheet_directory_uri();

/*
 * The old site showed four studio movie posters here. Poster artwork is studio
 * copyright and is deliberately not reproduced.
 *
 * Titles are a different matter: a film title is a fact rather than a
 * copyrightable work. Naming a production to describe work you actually did
 * is nominative use. So the credits render as type, not artwork.
 *
 * Taken from the IMDb profile (nm0542184), which is the public record and the
 * safe line to stay on where a production carries an NDA. Departments are
 * IMDb's own: Stunts, Special effects, Additional crew. The Actor and
 * Transportation credits listed there are left out as not rigging work, as are
 * three undated Stunts entries with no confirmed release.
 *
 * IMDb counts 60 credits because episodic work is counted per episode
 * (Loki 7, Wednesday 8, Citadel 6, Sanctuary 4, The Great Fire 4). These are
 * the unique titles.
 */
$drr_credits = array(
	array( 'title' => 'Practical Magic 2', 'year' => '2026', 'role' => 'Stunts' ),
	array( 'title' => 'The Dog Stars', 'year' => '2026', 'role' => 'Stunts' ),
	array( 'title' => 'Shelter', 'year' => '2026', 'role' => 'Special effects' ),
	array( 'title' => 'Frankenstein', 'year' => '2025', 'role' => 'Stunts' ),
	array( 'title' => 'F1: The Movie', 'year' => '2025', 'role' => 'Special effects' ),
	array( 'title' => 'Gladiator II', 'year' => '2024', 'role' => 'Stunts' ),
	array( 'title' => "Sanctuary: A Witch's Tale", 'year' => '2024', 'role' => 'Stunts' ),
	array( 'title' => 'Napoleon', 'year' => '2023', 'role' => 'Stunts' ),
	array( 'title' => 'Citadel', 'year' => '2023', 'role' => 'Stunts' ),
	array( 'title' => 'Wednesday', 'year' => '2022', 'role' => 'Stunts' ),
	array( 'title' => 'Morbius', 'year' => '2022', 'role' => 'Stunts' ),
	array( 'title' => 'Loki', 'year' => '2021-2023', 'role' => 'Stunts' ),
	array( 'title' => 'Black Widow', 'year' => '2021', 'role' => 'Stunts' ),
	array( 'title' => 'Infinite', 'year' => '2021', 'role' => 'Stunts' ),
	array( 'title' => 'Hanna', 'year' => '2019-2021', 'role' => 'Stunts' ),
	array( 'title' => 'Last Christmas', 'year' => '2019', 'role' => 'Stunts' ),
	array( 'title' => 'Fast & Furious Presents: Hobbs & Shaw', 'year' => '2019', 'role' => 'Stunts' ),
	array( 'title' => 'Spider-Man: Far from Home', 'year' => '2019', 'role' => 'Special effects' ),
	array( 'title' => 'Rogue One: A Star Wars Story', 'year' => '2016', 'role' => 'Special effects' ),
	array( 'title' => "Assassin's Creed", 'year' => '2016', 'role' => 'Special effects' ),
	array( 'title' => 'Into the Woods', 'year' => '2014', 'role' => 'Additional crew' ),
	array( 'title' => 'The Great Fire', 'year' => '2014', 'role' => 'Additional crew' ),
	array( 'title' => 'Game of Thrones', 'year' => '2011-2019', 'role' => 'Additional crew' ),
	array( 'title' => 'Your Highness', 'year' => '2011', 'role' => 'Additional crew' ),
	array( 'title' => 'Prince of Persia: The Sands of Time', 'year' => '2010', 'role' => 'Additional crew' ),
	array( 'title' => 'The Wolfman', 'year' => '2010', 'role' => 'Additional crew' ),
	array( 'title' => 'Sleepy Hollow', 'year' => '1999', 'role' => 'Special effects' ),
	array( 'title' => 'Plunkett & Macleane', 'year' => '1999', 'role' => 'Additional crew' ),
);
?>

<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<section class="wp-block-group alignfull" id="credits" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">

	<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center","width":"32%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:32%">
			<!-- wp:html -->
			<figure class="drr-credits__shot">
				<img src="<?php echo esc_url( $drr_uri . '/assets/img/credit-wednesday.jpg' ); ?>"
					srcset="<?php echo esc_attr( "{$drr_uri}/assets/img/credit-wednesday-600.jpg 600w, {$drr_uri}/assets/img/credit-wednesday.jpg 746w" ); ?>"
					sizes="(min-width: 782px) 28vw, 92vw"
					width="746" height="1000" loading="lazy" decoding="async"
					alt="Set signage reading Wednesday Season 2, beneath a stained glass spiderweb window." />
			</figure>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:paragraph {"className":"drr-eyebrow"} -->
			<p class="drr-eyebrow">Selected work</p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2} -->
			<h2 class="wp-block-heading">Film credits for rigging include</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Feature film and television, across stunts, special effects and crew. The full record, episode credits included, is on IMDb.</p>
			<!-- /wp:paragraph -->

			<!-- wp:html -->
			<a class="drr-imdb" href="<?php echo esc_url( $drr_biz['imdb'] ); ?>" target="_blank" rel="noopener">
				<span class="drr-imdb__mark" aria-hidden="true">IMDb</span>
				<span class="drr-imdb__text">
					<strong>See the full credit list</strong>
					<small>60 credits and counting</small>
				</span>
				<svg class="drr-imdb__arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M7 17 17 7M9 7h8v8"></path></svg>
			</a>
			<!-- /wp:html -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

<?php if ( ! empty( $drr_credits ) ) : ?>
	<!-- wp:html -->
	<ul class="drr-credits">
		<?php foreach ( $drr_credits as $drr_c ) : ?>
			<?php $drr_meta = array_filter( array( $drr_c['year'] ?? '', $drr_c['role'] ?? '' ) ); ?>
			<li class="drr-credits__item">
				<span class="drr-credits__title"><?php echo esc_html( $drr_c['title'] ); ?></span>
				<?php if ( $drr_meta ) : ?>
					<span class="drr-credits__meta"><?php echo esc_html( implode( ' / ', $drr_meta ) ); ?></span>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
	<!-- /wp:html -->
<?php endif; ?>

</section>
<!-- /wp:group -->
