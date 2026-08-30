<?php
/**
 * Dynamic Ropes & Rigging: theme bootstrap.
 *
 * @package dynamic-rigging
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const DRR_VERSION = '1.4.0';

/** Business details, used by the patterns and the schema output. */
function drr_business() {
	return array(
		'name'      => 'Dynamic Ropes and Rigging Ltd',
		'tel_human' => '+44 7866 574543',
		'tel_link'  => '+447866574543',
		// Shown in the header, contact section and footer. Every place that
		// renders it checks for a value first, so leaving this empty simply
		// hides the email everywhere rather than printing a broken link.
		//
		// CONFIRM BEFORE LAUNCH: the local part is inferred from the old
		// site's own image filenames ("Chris manger 2.png"), not supplied.
		// Change this one line if the name or mailbox differs.
		'email'     => 'chris@dynamicropesandrigging.co.uk',
		'address_lines' => array(
			'Woolie Farm',
			'Langary Gate Road',
			'Fleet Coy',
			'Gedney Hill',
			'Spalding',
		),
		'street'    => 'Woolie Farm, Langary Gate Road, Fleet Coy',
		'locality'  => 'Gedney Hill',
		'town'      => 'Spalding',
		'region'    => 'Lincolnshire',
		'postcode'  => 'PE12 0RU',
		'facebook'  => 'https://www.facebook.com/dynamicropesandrigging',
		'imdb'      => 'https://www.imdb.com/name/nm0542184/',
	);
}

/**
 * Click-to-call link. Used in the header, the contact section and the footer.
 *
 * @param string $classes Class attribute for the link.
 * @param int    $icon    Icon size in px. Pass 0 for no icon.
 */
function drr_tel_link( $classes = 'drr-tel', $icon = 18 ) {
	$biz = drr_business();
	$svg = $icon
		? sprintf(
			'<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.9.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>',
			(int) $icon
		)
		: '';

	return sprintf(
		'<a class="%s" href="tel:%s">%s<span>%s</span></a>',
		esc_attr( $classes ),
		esc_attr( $biz['tel_link'] ),
		$svg,
		esc_html( $biz['tel_human'] )
	);
}

/**
 * Mailto link. Returns an empty string when no address is configured, so every
 * call site can output it unconditionally.
 *
 * @param string $classes Class attribute for the link.
 * @param int    $icon    Icon size in px. Pass 0 for no icon.
 */
function drr_email_link( $classes = 'drr-email', $icon = 18 ) {
	$biz = drr_business();

	if ( empty( $biz['email'] ) ) {
		return '';
	}

	$svg = $icon
		? sprintf(
			'<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><rect x="2" y="4" width="20" height="16" rx="2"></rect><path d="m2 7 10 6 10-6"></path></svg>',
			(int) $icon
		)
		: '';

	return sprintf(
		'<a class="%s" href="mailto:%s">%s<span>%s</span></a>',
		esc_attr( $classes ),
		esc_attr( $biz['email'] ),
		$svg,
		esc_html( $biz['email'] )
	);
}


/* -------------------------------------------------------------------------
 * Favicon
 *
 * The icon is the ornate D from the wordmark, set in the brand yellow. It is
 * shipped with the theme so the site is never iconless, but WordPress's own
 * Site Icon wins if one is set under Settings > General, which is the route a
 * client should use.
 * ---------------------------------------------------------------------- */

function drr_icon_uri( $file ) {
	return get_stylesheet_directory_uri() . '/assets/icons/' . $file;
}

function drr_favicon() {
	// A Site Icon set in the admin takes precedence; WordPress prints its own tags.
	if ( has_site_icon() ) {
		return;
	}

	printf( '<link rel="icon" href="%s" sizes="any" />' . "\n", esc_url( drr_icon_uri( 'favicon.ico' ) ) );
	printf( '<link rel="icon" type="image/png" sizes="32x32" href="%s" />' . "\n", esc_url( drr_icon_uri( 'favicon-32.png' ) ) );
	printf( '<link rel="icon" type="image/png" sizes="16x16" href="%s" />' . "\n", esc_url( drr_icon_uri( 'favicon-16.png' ) ) );
	printf( '<link rel="apple-touch-icon" sizes="180x180" href="%s" />' . "\n", esc_url( drr_icon_uri( 'apple-touch-icon.png' ) ) );
	printf( '<link rel="manifest" href="%s" />' . "\n", esc_url( drr_icon_uri( 'manifest.json' ) ) );
	printf( '<meta name="theme-color" content="%s" />' . "\n", '#0F0E0D' );
}
add_action( 'wp_head', 'drr_favicon', 2 );

/**
 * Browsers still ask for /favicon.ico directly.
 *
 * This runs on init rather than on `do_faviconico`, because redirect_canonical
 * gets there first and rewrites /favicon.ico to /favicon.ico/, which then
 * renders the home page instead of an icon.
 */
function drr_favicon_ico() {
	if ( has_site_icon() ) {
		return;
	}

	$path = wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH );

	if ( $path && preg_match( '#^/favicon\.ico/?$#', $path ) ) {
		wp_safe_redirect( drr_icon_uri( 'favicon.ico' ), 301 );
		exit;
	}
}
add_action( 'init', 'drr_favicon_ico' );


/**
 * Where the showreel video lives.
 *
 * The file is 22MB, which pushes the theme past the upload limit on most shared
 * hosts and does not belong in a theme anyway. On the live site, upload it to
 * the Media Library and store the URL in the `drr_showreel_url` option:
 *
 *   wp option update drr_showreel_url "https://example.com/wp-content/uploads/2026/08/showreel.mp4"
 *
 * With no option set this falls back to the copy in the theme, which is what
 * the local build uses.
 */
function drr_showreel_src() {
	$uploaded = get_option( 'drr_showreel_url' );

	if ( is_string( $uploaded ) && '' !== trim( $uploaded ) ) {
		return $uploaded;
	}

	return get_stylesheet_directory_uri() . '/assets/video/showreel.mp4';
}

/**
 * Theme supports.
 */
function drr_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'style', 'script', 'search-form', 'gallery', 'caption' ) );
	add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'drr_setup' );

/**
 * Front-end styles. Block themes do not enqueue the theme stylesheet for us.
 */
function drr_styles() {
	wp_enqueue_style( 'drr-style', get_stylesheet_uri(), array(), DRR_VERSION );
}
add_action( 'wp_enqueue_scripts', 'drr_styles' );

/**
 * Drop the emoji detection script: it is the only third-party request left on
 * the page (it pulls twemoji from s.w.org) and nothing here needs it.
 */
function drr_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'drr_disable_emojis' );

/**
 * Document title.
 *
 * The theme carries its own title so the site reads correctly before anyone
 * sets Settings → General → Site Title. A title set there still wins.
 */
function drr_document_title( $parts ) {
	$biz     = drr_business();
	$default = 'My WordPress Website' === get_option( 'blogname' );

	if ( is_front_page() ) {
		$parts['title']    = $default ? 'Dynamic Ropes &amp; Rigging' : get_bloginfo( 'name' );
		$parts['tagline']  = 'Stunt action design team and wire rigging specialists';
		unset( $parts['site'] );
	} elseif ( $default ) {
		$parts['site'] = $biz['name'];
	}

	return $parts;
}
add_filter( 'document_title_parts', 'drr_document_title' );

/** The site name used in social tags, independent of the blogname option. */
function drr_site_name() {
	return 'My WordPress Website' === get_option( 'blogname' )
		? 'Dynamic Ropes & Rigging'
		: get_bloginfo( 'name' );
}

/**
 * Pattern category so the sections group together in the inserter.
 */
function drr_pattern_category() {
	register_block_pattern_category(
		'dynamic-rigging',
		array( 'label' => __( 'Dynamic Ropes & Rigging', 'dynamic-rigging' ) )
	);
}
add_action( 'init', 'drr_pattern_category' );

/* -------------------------------------------------------------------------
 * SEO head output
 *
 * The old site had a meta description and og: tags pointing at http://, and
 * no structured data at all.
 * ---------------------------------------------------------------------- */

function drr_meta_description() {
	return 'Stunt action design team and wire rigging specialists for film and '
		. 'television, working internationally. Stunt coordinator, head stunt rigger '
		. 'and stunt performer services, film set and crew safety rigging, plus stunt '
		. 'equipment and harness rental. Over 30 years in the motion film and dramatic '
		. 'arts industry.';
}

function drr_head() {
	if ( ! is_front_page() ) {
		return;
	}

	$biz  = drr_business();
	$desc = drr_meta_description();
	$url  = home_url( '/' );
	$img  = get_stylesheet_directory_uri() . '/assets/img/hero-stunt.jpg';

	printf( '<meta name="description" content="%s" />' . "\n", esc_attr( $desc ) );
	printf( '<link rel="canonical" href="%s" />' . "\n", esc_url( $url ) );
	printf( '<meta property="og:type" content="website" />' . "\n" );
	printf( '<meta property="og:site_name" content="%s" />' . "\n", esc_attr( drr_site_name() ) );
	printf( '<meta property="og:title" content="%s" />' . "\n", esc_attr( drr_site_name() . ': stunt action design and wire rigging' ) );
	printf( '<meta property="og:description" content="%s" />' . "\n", esc_attr( $desc ) );
	printf( '<meta property="og:url" content="%s" />' . "\n", esc_url( $url ) );
	printf( '<meta property="og:image" content="%s" />' . "\n", esc_url( $img ) );
	printf( '<meta name="twitter:card" content="summary_large_image" />' . "\n" );

	$services = array(
		'Stunt coordinator',
		'Head stunt rigger',
		'Wire rigging specialist',
		'Stunt performer',
		'Film set and crew safety rigging',
		'Stunt equipment and harness rental',
	);

	$schema = array(
		'@context'    => 'https://schema.org',
		// ProfessionalService as well as LocalBusiness: the work is a service
		// delivered on location worldwide, not trade from the registered address.
		'@type'       => array( 'LocalBusiness', 'ProfessionalService' ),
		'name'        => $biz['name'],
		'description' => $desc,
		'url'         => $url,
		'image'       => $img,
		'telephone'   => $biz['tel_link'],
		'address'     => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => $biz['street'],
			'addressLocality' => $biz['locality'],
			'addressRegion'   => $biz['region'],
			'postalCode'      => $biz['postcode'],
			'addressCountry'  => 'GB',
		),
		'areaServed'  => array(
			array( '@type' => 'Place', 'name' => 'Worldwide' ),
			array( '@type' => 'Country', 'name' => 'United Kingdom' ),
			array( '@type' => 'Country', 'name' => 'Ireland' ),
		),
		'knowsAbout'  => $services,
		'slogan'      => 'For all your stunt requirements',
		'hasOfferCatalog' => array(
			'@type'           => 'OfferCatalog',
			'name'            => 'Stunt rigging services',
			'itemListElement' => array_map(
				static function ( $service ) {
					return array(
						'@type'       => 'Offer',
						'itemOffered' => array( '@type' => 'Service', 'name' => $service ),
					);
				},
				$services
			),
		),
		'memberOf'    => array(
			array( '@type' => 'Organization', 'name' => 'The Stunt Guild' ),
			array( '@type' => 'Organization', 'name' => 'Stunt Register Ireland' ),
		),
		'sameAs'      => array( $biz['facebook'], $biz['imdb'] ),
	);

	if ( ! empty( $biz['email'] ) ) {
		$schema['email'] = $biz['email'];
	}

	echo '<script type="application/ld+json">'
		. wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
		. '</script>' . "\n";
}
add_action( 'wp_head', 'drr_head', 1 );

/* -------------------------------------------------------------------------
 * Contact form
 *
 * A small first-party handler so the site works without a form plugin.
 * Protected by a nonce and a honeypot field. Delivery depends on the host
 * being able to send mail: see README before going live.
 * ---------------------------------------------------------------------- */

function drr_handle_contact() {
	$redirect = home_url( '/#contact' );

	// Honeypot: a real person never fills this in.
	if ( ! empty( $_POST['drr_website'] ) ) {
		wp_safe_redirect( add_query_arg( 'contact', 'sent', $redirect ) );
		exit;
	}

	if ( ! isset( $_POST['drr_nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['drr_nonce'] ) ), 'drr_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'contact', 'error', $redirect ) );
		exit;
	}

	$name    = sanitize_text_field( wp_unslash( $_POST['drr_name'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['drr_email'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['drr_message'] ?? '' ) );

	if ( '' === $name || ! is_email( $email ) || '' === $message ) {
		wp_safe_redirect( add_query_arg( 'contact', 'invalid', $redirect ) );
		exit;
	}

	$body = sprintf(
		"New enquiry from the website.\n\nName: %s\nEmail: %s\n\nMessage:\n%s\n",
		$name,
		$email,
		$message
	);

	$sent = wp_mail(
		get_option( 'admin_email' ),
		'New message from your website',
		$body,
		array( 'Reply-To: ' . $name . ' <' . $email . '>' )
	);

	wp_safe_redirect( add_query_arg( 'contact', $sent ? 'sent' : 'error', $redirect ) );
	exit;
}
add_action( 'admin_post_nopriv_drr_contact', 'drr_handle_contact' );
add_action( 'admin_post_drr_contact', 'drr_handle_contact' );

/**
 * The contact form, as a shortcode.
 *
 * This deliberately is not raw markup inside the pattern. A pattern is rendered
 * once and its output is what the Site Editor saves into the database, which
 * would freeze the CSRF nonce and the referer field at that moment and break
 * validation for every later submission. A shortcode is stored as text and
 * re-rendered on every request, so the nonce is always current.
 */
function drr_contact_form_shortcode() {
	ob_start();
	?>
	<?php echo drr_contact_notice(); // phpcs:ignore WordPress.Security.EscapeOutput -- built from a fixed set of escaped strings. ?>

	<form class="drr-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
		<input type="hidden" name="action" value="drr_contact" />
		<?php wp_nonce_field( 'drr_contact', 'drr_nonce', false ); ?>

		<div>
			<label for="drr-name">Name</label>
			<input type="text" id="drr-name" name="drr_name" autocomplete="name" required />
		</div>

		<div>
			<label for="drr-email">Email</label>
			<input type="email" id="drr-email" name="drr_email" autocomplete="email" required />
		</div>

		<div>
			<label for="drr-message">Message</label>
			<textarea id="drr-message" name="drr_message" rows="6" required></textarea>
		</div>

		<div class="drr-form__hp" aria-hidden="true">
			<label for="drr-website">Leave this field empty</label>
			<input type="text" id="drr-website" name="drr_website" tabindex="-1" autocomplete="off" />
		</div>

		<div>
			<button type="submit" class="wp-block-button__link wp-element-button" style="border:0;cursor:pointer">Send message</button>
		</div>
	</form>
	<?php
	return ob_get_clean();
}
add_shortcode( 'drr_contact_form', 'drr_contact_form_shortcode' );

/**
 * Run shortcodes inside core/shortcode blocks.
 *
 * The block has no server-side render callback; it relies on the `the_content`
 * filter, which never runs over a block theme's templates. Without this the
 * shortcode is emitted as literal text on the front end.
 *
 * @param string $content Rendered block HTML.
 * @param array  $block   Parsed block.
 */
function drr_render_shortcode_block( $content, $block ) {
	if ( isset( $block['blockName'] ) && 'core/shortcode' === $block['blockName'] ) {
		return do_shortcode( $content );
	}

	return $content;
}
add_filter( 'render_block', 'drr_render_shortcode_block', 10, 2 );

/**
 * Feedback banner shown after a submission redirect.
 */
function drr_contact_notice() {
	$status = isset( $_GET['contact'] ) ? sanitize_key( wp_unslash( $_GET['contact'] ) ) : '';

	$messages = array(
		'sent'    => array( 'ok', 'Thanks, your message has been sent. We will be in touch.' ),
		'invalid' => array( 'bad', 'Please fill in your name, a valid email address and a message.' ),
		'error'   => array( 'bad', 'Sorry, the message could not be sent. Please call ' . drr_business()['tel_human'] . ' instead.' ),
	);

	if ( ! isset( $messages[ $status ] ) ) {
		return '';
	}

	list( $tone, $text ) = $messages[ $status ];
	$colour = 'ok' === $tone ? 'var(--wp--preset--color--accent)' : '#E5534B';

	return sprintf(
		'<p role="status" style="border-left:4px solid %s;padding:0.75rem 1rem;background:var(--wp--preset--color--surface);margin:0 0 1.5rem">%s</p>',
		esc_attr( $colour ),
		esc_html( $text )
	);
}
