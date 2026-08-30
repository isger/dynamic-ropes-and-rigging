# Deployment brief: Dynamic Ropes & Rigging

A handoff for setting up WordPress on the host and putting the new theme live.
Written to be handed to someone driving a browser session against cPanel.

## Where things stand

The new site is **built and finished** as a custom WordPress block theme. It has been
running and verified locally against **WordPress 7.1** using `wp-now`. Nothing has been
deployed. The host still needs WordPress installed.

`dynamicropesandrigging.co.uk` currently serves the **old 2017 site**: static HTML from
plain Apache, no WordPress, no database, served over HTTP. That site is untouched and
still live.

### What is ready to upload

Both files are in `dist/`:

| File | Size | What it is |
|---|---|---|
| `dynamic-theme.zip` | 4.3 MB | The theme. Upload through Appearance > Themes > Add New. |
| `showreel.mp4` | 21.7 MB | The showreel. Goes to the Media Library, not the theme. |

The video is deliberately **not** in the zip. Together they are 26 MB, which exceeds the
theme upload limit on most shared hosting. Split, the zip installs anywhere.

### Requirements the host must meet

- **PHP 8.0 or newer.** The theme declares this and will refuse to activate below it.
- **WordPress 6.5 or newer.** Built and tested against 7.1.
- Ability to send mail. Failing that, an SMTP plugin for the contact form.

---

## Part 1: install WordPress via Softaculous

In cPanel, find **Softaculous Apps Installer** and choose WordPress > Install.

Settings that matter:

| Field | Value | Why |
|---|---|---|
| Protocol | `https://` with `www` or without, pick one | Never `http://`. Decide www vs non-www now; changing it later means fixing every URL. |
| Domain | `dynamicropesandrigging.co.uk` | |
| In Directory | **leave empty** | An entry here installs to a subfolder such as `/wp`. The site must be at the root. |
| Site Name | `Dynamic Ropes & Rigging` | |
| Site Description | `Stunt action design team and wire rigging specialists` | |
| Admin Username | anything except `admin` | `admin` is the first username every bot tries. |
| Admin Password | long and random, saved to a password manager | |
| Admin Email | **a mailbox that is actually monitored** | Contact form enquiries are sent here. Getting this wrong means silently losing enquiries. |
| Language | English (UK) | |
| Select Plugins | **untick everything offered** | Softaculous bundles plugins nobody asked for. |
| PHP version | 8.1 or newer if offered | |

### Before clicking Install

**The old site is still in `public_html` and installing over it is destructive.**

1. Take a full backup first. cPanel > File Manager, select `public_html`, Compress to a
   zip, then download that zip locally. Do not skip this: the 2017 site exists nowhere
   else.
2. Only then clear `public_html`. Alternatively install and let Softaculous overwrite.

If Softaculous warns the directory is not empty, that warning is correct. Back up first.

### Right after install

- **Enable SSL.** cPanel > SSL/TLS Status, then AutoSSL. Confirm `https://` loads with a
  valid certificate before going further.
- **Settings > Permalinks > Post name**, then Save. This also flushes the rewrite rules,
  which the site needs for `/favicon.ico` and general URL handling.

---

## Part 2: install the theme

1. **Appearance > Themes > Add New > Upload Theme**, choose `dynamic-theme.zip`, install,
   then **Activate**.
2. If the upload is rejected for size, the host limit is below 4.3 MB. Either raise
   `upload_max_filesize` in cPanel's MultiPHP INI Editor. Otherwise unzip the folder and upload
   `dynamic-theme/` to `/public_html/wp-content/themes/` over FTP or File Manager instead.

Nothing else is needed to make the home page appear. The theme provides `front-page.html`,
so it takes over the front page automatically. **Do not create a page and set it as the
front page**, that would bypass the design.

### The showreel video

1. **Media > Add New**, upload `showreel.mp4`. If it exceeds the upload limit, put it in
   `/public_html/wp-content/uploads/` over FTP instead.
2. Copy its full URL.
3. Store it so the theme uses the uploaded copy rather than looking inside the theme:

   ```
   wp option update drr_showreel_url "https://dynamicropesandrigging.co.uk/wp-content/uploads/2026/08/showreel.mp4"
   ```

   If WP-CLI is not available, edit the fallback URL in `drr_showreel_src()` in
   `functions.php`.

Until this is done the showreel section shows its poster frame and will not play. Nothing
else breaks.

### Contact form

The form is first-party, in the theme, posting to `admin-post.php` with a nonce and a
honeypot. It sends through `wp_mail()` to the **admin email set during install**.

Shared hosts frequently block or silently drop `mail()`. Send a test enquiry through the
live form and confirm it arrives. If it does not, install an SMTP plugin (WP Mail SMTP or
similar) and point it at a real mailbox.

---

## Part 3: after go-live

- **Settings > General**: confirm Site Title and Tagline. The theme carries its own
  fallbacks, so the site reads correctly even if these are left, but set them properly.
- **Settings > General > Site Icon** (optional): the theme ships a favicon. A Site Icon
  set here overrides it. Either is fine.
- Check the site on a phone. Nothing should scroll sideways at any width.
- Submit the contact form and confirm the email arrives.
- Google Search Console and a Google Business Profile listing are worth doing. Backlinks
  from The Stunt Guild and Stunt Register Ireland directories are worth more than anything
  on the page.

## Things not to do

- **Do not install a page builder** (Elementor, Divi, WPBakery). This is a block theme.
  A builder would fight it and there is nothing for it to do.
- **Do not install a caching or optimisation plugin at first.** The page has no JavaScript
  libraries, no third-party requests and self-hosted fonts. Aggressive optimisers are more
  likely to break the layout than to speed anything up. Measure first.
- **Do not edit the front page in the Site Editor unless you mean to.** The first save
  writes the template into the database. The database copy then overrides the theme
  files. Later theme updates stop appearing. Reset is available from the template's three
  dot menu if it happens by accident.

## Open items on the content

Three things nobody has confirmed:

1. **Email address.** `chris@dynamicropesandrigging.co.uk` is currently on the site. The
   name comes from the IMDb profile, but nobody has confirmed the mailbox exists.
2. **The address line "Fleet Coy"**, carried through exactly as supplied.
3. **Film credits.** 28 titles pulled from the IMDb profile. Three are unreleased 2026
   productions and worth checking for embargo.

## Local environment, for reference

`npx @wp-now/wp-now start --path=. --port=8881` from `dynamic-theme/`, admin at
`/wp-admin` with `admin` / `password`. **Those credentials are local only.** They are
wp-now defaults and must never be used on the live site.

Full technical detail is in `README.md`.
