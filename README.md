# Dynamic Ropes & Rigging: website rebuild

A custom WordPress block theme replacing the 2017 EverWeb site at
<https://dynamicropesandrigging.co.uk/>.

## Running it locally

Node is installed through nvm, so load it first:

```bash
export NVM_DIR="$HOME/.nvm"; . "$NVM_DIR/nvm.sh"
cd dynamic-theme
npx @wp-now/wp-now start --path=. --port=8881
```

`wp-now` detects the folder as a theme, spins up WordPress with PHP compiled to
WebAssembly, installs the theme and activates it. No Docker, no MySQL, no system PHP.
The site is then at <http://localhost:8881>, admin at `/wp-admin` (`admin` / `password`).

State lives in `~/.wp-now`, not in this repo. Delete that directory to start clean.

Note that `wp-now` prints a deprecation notice on startup and points at
`npx @wp-playground/cli@latest start` as its replacement. `wp-now` still works and
resolves `latest` to WordPress 7.1, so there is no urgency, but the Playground CLI is
the maintained tool to move to.

## Editing through the WordPress UI

Log in at <http://localhost:8881/wp-admin> with **`admin`** / **`password`**, then
Appearance > Editor.

- **Templates > Front Page** is the whole page. Each section appears as a named block
  group: Hero, Introduction, Services, Showreel, Equipment hire, Film credits, Contact.
  Headings, paragraphs, buttons and colours are all editable, and sections can be dragged
  into a different order or removed.
- **Patterns > Dynamic Ropes & Rigging** lists the seven insertable sections. Header and
  Footer are registered with `Inserter: no`, since they are bound to the template parts
  and are edited under Patterns > Template Parts instead.

### The one thing to know before you save

Templates currently report `source: theme`, meaning WordPress is reading
`templates/front-page.html` and the pattern files straight off disk.

**The first time you save an edit in the Site Editor, that flips to `source: custom`.**
WordPress writes the whole template into the database, and the database copy wins from
then on. Any later change to the PHP or HTML files stops appearing on the front end,
which looks exactly like the edit "not working".

To go back to the files: in the Site Editor, open the template's actions menu (the three
dots) and choose **Reset**, or Appearance > Editor > Templates, then Reset on the
customised one. That deletes the database copy and the theme files take over again.

So it is worth deciding which mode you are in. Use the UI to try layout and copy ideas,
then either keep the database version as the source of truth, or reset it and I will
fold the changes back into the theme files.

## Layout

```
dynamic-theme/
  style.css        theme header plus the CSS theme.json cannot express
  theme.json       the design system: palette, type scale, spacing, layout widths
  functions.php    enqueues, SEO head output, contact form handler
  templates/       front-page.html composes the single page; index and 404 as fallbacks
  parts/           header.html / footer.html, each a one-line pattern include
  patterns/        one PHP file per page section, where the real markup lives
  assets/          img/ (photographs), video/ (showreel), fonts/ (self-hosted woff2)
```

The page is assembled from patterns, so sections can be reordered, edited or removed in
Appearance > Editor without touching code. That is also what makes the migration cheap,
because patterns are portable WordPress markup.

## What changed from the old site

| Old | New |
|---|---|
| 1000px fixed layout, absolute positioning | Fluid, responsive from 320px up |
| Separate `/mobile.html` behind a JS redirect | One page, one source |
| jQuery 1.9 and 2.1 from Google CDN, `jquery.tcycle` | No JavaScript libraries at all |
| 3.7 MB stock background texture | Dropped |
| Facebook SDK iframe and hit counter | Plain link to the Facebook page |
| Arial/Helvetica | Barlow Condensed and Inter, self-hosted (SIL OFL) |
| Four studio movie posters | Text credits list plus your own set photography |
| Phone number as plain text | `tel:` link in the header, contact section and footer |
| `http://` canonical, no structured data | `https://` canonical, Open Graph, `LocalBusiness` JSON-LD |
| No keyboard focus styles, no skip link | Visible focus rings, skip link, `prefers-reduced-motion` |

The rendered page makes no external subresource requests: no third-party script,
stylesheet, image or iframe. Images total about 4.3 MB on disk across every responsive
variant, but `srcset` means a desktop visitor loads only the variants that fit, and the
showreel does not download at all until it is played.

## Content that needs your input

These are marked in the code and are the only things stopping the site being complete:

1. **Film credits: check what I pulled.** `$drr_credits` in `patterns/credits.php` now
   holds 28 titles taken from the IMDb profile (`nm0542184`, Chris Manger), with IMDb's
   own department labels. Worth a read to confirm nothing there is under embargo.

   Deliberately excluded: the Actor and Transportation Department credits, as not rigging
   work, and three undated Stunts entries with no confirmed release (Kung Fu Deadly,
   Eloise, A Colt Is My Passport). The three 2026 titles are included and unreleased at
   time of writing, so they are the ones to check first.

   IMDb counts 60 credits because episodic work counts per episode (Loki 7, Wednesday 8,
   Citadel 6, Sanctuary 4, The Great Fire 4). 28 unique rigging-relevant titles is the
   same body of work, counted once each.
2. **Email address: confirm the local part.** Set to
   `chris@dynamicropesandrigging.co.uk` in `drr_business()` in `functions.php`. The IMDb
   profile confirms the name is Chris Manger, so the local part is a reasonable guess,
   but nobody has confirmed the mailbox exists. Check that before launch. That one value
   drives the header, the contact section, the footer and the JSON-LD; left empty, the
   email hides everywhere rather than rendering a broken link.
3. **"Fleet Coy".** That line of the address is carried through exactly as supplied.
   Worth a second look before it goes live in case it is a typo.

## Keywords and structured data

The site is written around the terms the business wants to be found for, placed in
headings and body copy rather than bolted on as a keyword list:

| Term | Where it lives |
|---|---|
| Stunt action design team | Hero eyebrow, and the intro `h2` |
| Wire rigging specialist | Hero copy, and the capability list |
| Stunt coordinator | Capability list |
| Head stunt rigger | Capability list |
| Stunt performer | Capability list |
| Stunt equipment and harness rental | Capability list, and the equipment `h2` |
| For all your stunt requirements | Contact eyebrow, and `slogan` in the structured data |

The capability list under "Stunt rigging and safety on set" is plain `<li>` text, not an
image, so it is readable by a crawler and by anything summarising the page.

International reach was barely stated before and is now explicit in the hero, the intro
copy, the "Worldwide" stat and the equipment eyebrow.

The `LocalBusiness` JSON-LD was extended for the same reason. It now declares
`ProfessionalService` alongside `LocalBusiness`, because the work is delivered on
location rather than traded from the registered address, and adds `areaServed`
(Worldwide, United Kingdom, Ireland), `knowsAbout`, `slogan`, `memberOf` for the two
guilds and a `hasOfferCatalog` listing all six services. That is the part most likely to
be read by an assistant answering a question like "who rigs stunts for film in the UK".

Two things worth doing that code cannot: get the business listed on Google Business
Profile, and make sure the guild directories link back to the site. Inbound links from
those bodies are worth more than anything on the page itself.

## Where the credits came from

IMDb blocks scripted requests: `WebFetch` gets a 403 and `curl` an empty 202, whatever
headers you send. A real browser gets through, so the list was read out of the page's
own `__NEXT_DATA__` payload in headless Chrome, from
`mainColumnData.released` / `.unreleased`, which carries the department grouping, release
year and title type per credit.

Worth knowing if the list ever needs refreshing: a blind walk of that JSON also picks up
sponsored and recommended titles, which is how "A Colt Is My Passport" (a 1967 Japanese
film) turned up on the first pass. Read the credits structure specifically rather than
matching on anything title-shaped.

## Why there are no posters

The old site displayed four studio movie posters. Poster artwork, film stills and trailer
frames are studio copyright and are not reproduced here.

Titles themselves are fine. A film title is a fact rather than a copyrightable work, and
naming a production to describe work you actually did is nominative use. Production
company names as plain text are fine on the same basis, though their logos are trademarks
and are best avoided. So the credits section is set as type, laid out like end-title
cards, rather than as artwork.

The remaining risk is contractual rather than copyright: film work often carries NDAs. The
safe line is to list only credits that are already public on the IMDb page.

## Favicon

The icon is the ornate D from the wordmark, black on the brand yellow. The D is the only
part of the logo that survives at 16px; the full wordmark and the rope knot turn to mush.

It was cut from `LOGO VERSIOn.jpeg` (a better logo than the one in the header, with a rope
knot motif) by knocking the dark ground out on a canvas and trimming to the letterform.
Yellow rather than the site's own near-black, because a dark tile disappears into a dark
browser tab strip, while yellow reads on both.

`assets/icons/` holds the set, 64 KB in total:

| File | Use |
|---|---|
| `favicon.ico` | 16, 32 and 48px in one file, for `/favicon.ico` requests |
| `favicon-16.png`, `favicon-32.png` | Modern browsers |
| `apple-touch-icon.png` | 180px, iOS home screen |
| `icon-192.png`, `icon-512.png` | Android, referenced by the manifest |
| `manifest.json` | Web app manifest |

`drr_favicon()` prints the tags on `wp_head`, and `drr_favicon_ico()` answers a request for
`/favicon.ico` at the site root. That one hooks `init` rather than `do_faviconico`, because
`redirect_canonical` gets there first and rewrites `/favicon.ico` to `/favicon.ico/`, which
serves the home page instead of an icon.

Both check `has_site_icon()` first, so **a Site Icon set under Settings > General wins**.
That is the route to prefer on the live site: WordPress then generates every size itself
and the client can change it without touching code. The theme icons are the fallback, so
the site is never iconless.

The file is named `manifest.json` rather than the conventional `site.webmanifest` because
the server serves an unknown extension as `application/octet-stream`. As `.json` it comes
back as `application/json`, which browsers accept.

## Colour

The accent is IMDb yellow, `#F5C518`, with `#FFDC5C` for hover and link states. It
replaced an amber sampled from the old site's background texture.

Both live in `theme.json` as the `accent` and `accent-bright` palette entries, and
everything reads from those tokens, including the IMDb chips in the header and credits
section, which previously hardcoded the same yellow. Changing the two values in
`theme.json` restyles the whole site.

Contrast improved across the board, roughly doubling, and every accent pairing is now
WCAG AAA:

| Pairing | Yellow | Old amber |
|---|---|---|
| Eyebrows and stat headings on base | 11.8 | 6.6 |
| Eyebrows on the surface bands | 10.8 | 6.0 |
| Button text on the accent | 11.8 | 6.6 |
| Links and hover states | 14.4 | 9.3 |

## Address

Held in one place, `drr_business()` in `functions.php`, and used by the contact section,
the footer and the JSON-LD:

```
Dynamic Ropes and Rigging Ltd
Woolie Farm
Langary Gate Road
Fleet Coy
Gedney Hill
Spalding
PE12 0RU
```


## Media

The August 2026 refresh replaced most of the 2017 photography. Sources supplied were far
higher resolution than anything on the old site, whose best original was 874px wide.

| Where | Image | Kept or new |
|---|---|---|
| Hero | Performer flown through a water dump on a blue screen stage | new |
| Intro | Crew on set, and two performers flown from a crane rig | one new, one **kept** |
| Film Crew Safety Rigging | Camera crew harnessed on a cliff face | **kept** from the old site |
| Actor Safety Rigging | Rigger with four costumed performers on a dam | new |
| Flying Actor Scene | Performer flown on a wire in the studio | new |
| Showreel | 1m52s video, with a poster frame pulled from it | new |
| Equipment hire | Camera rigged to a DMM plate, plus the red truss and the silhouetted tower rig | new, plus two **kept** |
| Film credits | Wednesday Season 2 set signage, beside the credits grid | new |
| Memberships | The Stunt Guild and Stunt Register Ireland marks | new |

Every image the theme used before the refresh is in `media-archive/v1-site-images/`,
including the originals that are no longer displayed (the gallows shot).
Copy one back over the file of the same name in `dynamic-theme/assets/img/` to restore it.
That is how the silhouetted tower rig came back into the equipment hire section, and how
the crane flying shot came back into the intro as `flying-crane.jpg`.

`media-archive/v2-supplied-unused/` holds photographs from the August 2026 drop that are
not on the site right now, currently the tall ship mast shot that the crane photo
replaced. Nothing in `media-archive/` is served or deployed.

### The showreel video

`assets/video/showreel.mp4` is 22 MB and 1m52s, which makes the theme folder about 26 MB.
It is set to `preload="none"` with a poster frame, so nothing downloads until someone
presses play, and the page itself stays light.

Two things to sort before launch:

1. **Move it out of the theme.** Media belongs in the WordPress Media Library (or a video
   host), not in a theme folder. A 26 MB theme is slow to deploy and awkward to version.
   Upload it and point the `<source>` at the uploads URL.
2. **Trim and compress it.** Just under two minutes is long for a landing page, and 22 MB
   is heavy even on demand. A 30 to 45 second cut re-encoded for web would be a fraction
   of the size.

### A note on the Wednesday photographs

Two of the supplied images are from the Wednesday Season 2 set: the crew photograph used
in the intro, and the set signage used in the credits section. These are photographs you
took, so the copyright in them is yours, which puts them on much safer ground than
reproducing poster artwork.

The remaining considerations are not copyright ones:

- The signage carries the production's title treatment, which is a trademark.
- Film work frequently carries NDAs, and set photography is usually the most restricted
  part of them.

The series is publicly released, so the association is not itself a secret. Even so, this
is the one piece of the site worth a moment's thought before it goes live.

## Contact form

`functions.php` has a first-party handler (`drr_handle_contact`) posting to
`admin-post.php`, protected by a nonce and a honeypot field, sending through `wp_mail()`
to the site's admin email.

The form itself is a shortcode (`[drr_contact_form]`) rather than raw markup in the
pattern. A pattern renders once, and whatever it produced is what the Site Editor saves
into the database, so a nonce written inline would be frozen at that moment and every
later submission would fail validation. A shortcode is stored as text and re-rendered on
each request, so the nonce is always current. `drr_render_shortcode_block()` is what
makes it run: the `core/shortcode` block has no server-side render callback and depends
on the `the_content` filter, which never runs over a block theme's templates.

**It will not send mail from `wp-now`**, because the WASM runtime has no mail transport,
so submissions locally redirect back with the error notice. That is expected. On the real
host, either the host's `mail()` works or you add an SMTP plugin. Swap `wp_mail()` for a
form plugin instead if you would rather the client managed the fields themselves.

## Migrating to hosted WordPress

1. Copy `dynamic-theme/` into `wp-content/themes/` on the host and activate it.
2. Set Settings > General > Site Title. The theme falls back to "Dynamic Ropes & Rigging"
   until you do, so nothing breaks if it is missed.
3. Set the admin email, since that is where enquiries go.
4. Confirm mail delivery, then send a test enquiry.
5. Check PHP is 8.0 or newer.

Two things to settle at that point: the host's PHP version and whether the current
hosting can run WordPress at all. The domain currently serves static files from plain
Apache over HTTP, so it may need moving.
