<?php
/**
 * Title: Header
 * Slug: dynamic-rigging/header
 * Categories: dynamic-rigging
 * Block Types: core/template-part/header
 * Inserter: no
 *
 * @package dynamic-rigging
 */

$drr_biz = drr_business();
$drr_uri = get_stylesheet_directory_uri();
?>
<!-- wp:html -->
<a class="drr-skip-link" href="#main">Skip to content</a>

<header class="drr-header">
	<div class="drr-header__inner">

		<a class="drr-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( $drr_biz['name'] ); ?> home">
			<img src="<?php echo esc_url( $drr_uri . '/assets/img/logo.png' ); ?>"
				width="426" height="121"
				alt="<?php echo esc_attr( $drr_biz['name'] ); ?>" />
		</a>

		<nav class="drr-nav" aria-label="Primary">
			<ul style="display:flex;gap:1.75rem;list-style:none;margin:0;padding:0">
				<li><a href="#services">Services</a></li>
				<li><a href="#showreel">Showreel</a></li>
				<li><a href="#hire">Equipment hire</a></li>
				<li><a href="#credits">Credits</a></li>
				<li><a href="#contact">Contact</a></li>
			</ul>
		</nav>

		<span class="drr-header__contact">
			<a class="drr-header__imdb" href="<?php echo esc_url( $drr_biz['imdb'] ); ?>" target="_blank" rel="noopener">IMDb</a>
			<?php echo drr_email_link( 'drr-tel drr-header__email' ); // phpcs:ignore WordPress.Security.EscapeOutput -- escaped in the helper. ?>
			<?php echo drr_tel_link(); // phpcs:ignore WordPress.Security.EscapeOutput -- escaped in the helper. ?>
		</span>

	</div>
</header>
<!-- /wp:html -->
