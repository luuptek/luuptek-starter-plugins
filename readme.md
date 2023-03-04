# Luuptek Starter Plugins

This is plugin repo to be used with [Luuptek Starter theme](https://github.com/luuptek/luuptek-wp-starter).

There are multiple filters available (see details below) to customise plugin behavior.

### What does this plugin do?
- Remove WP logo from admin bar
- Add notification, if ACF Pro is not available
- Cleans admin menu (remove comments and site health)
- Removes the auto-discovery link for the site's primary RSS feed.
- Removes the auto-discovery link for all other RSS feeds associated with the site.
- Removes the Really Simple Discovery (RSD) link, which is used by some older blogging tools to identify the site's blogging API.
- Removes the Windows Live Writer manifest link, which is used by the Windows Live Writer desktop application to determine the site's capabilities.
- Removes the link to the previous and next posts in the site's RSS feed.
- Removes the shortlink meta tag, which provides a short URL for the current page or post.
- Removes the script that detects and loads the emoji CSS and JavaScript files in the <head> section of a WordPress site for visitors.
- Removes the script that detects and loads the emoji CSS and JavaScript files in the admin area of a WordPress site.
- Removes the CSS for emojis in the <head> section of a WordPress site for visitors.
- Removes the CSS for emojis in the admin area of a WordPress site.
- Removes emoji characters from the content of RSS feeds.
- Removes emoji characters from the text of comments in RSS feeds.
- Removes emoji characters from emails sent by WordPress.
- When an email is sent using WordPress's wp_mail() function, set the "From" name to the site's name by default
- Multiple Gutenberg modifications (customised via filters)
- Remove accents from filenames
- Disable scaling of big image sizes
- Sets Luuptek shape to robots.txt
- Multiple security related improvements (example disable user api endpoint)
- Sets proper default settings
- Removes X-Pingback header

## Composer install

Add

```json
{
    "type": "vcs",
    "url": "git@github.com:luuptek/luuptek-starter-plugins.git",
    "no-api": true
}
```
To the `repositories` array in `composer.json` and run


```
composer require luuptek/luuptek-starter-plugins
```

## Theme modifications

Modify file `library/hooks/luuptek-mu-filters.php` according to your need in theme code.

# Filters available

`luuptek_no_acf_warning_message`
- No parameters
- Use to define notification, if you don't have ACF Pro activated.

`luuptek_disable_comments`
- Return true/false
- comments are disable automatically (true)
- enabled comments settings filter value to false

`luuptek_disable_site_health`
- same as comments, site health is disabled by default
- set filter value to true to enable site health

`luuptek_disable_quide_feed`
- Luuptek guide feed is provided by default
- disable it by setting filter value to true

# Gutenberg related filters

`disable_luuptek_allowed_blocks`
- by default all blocks are allowed by theme
- set this filter false to define your own block palette ==> see filter `luuptek_allowed_gutenberg_blocks`

`disable_luuptek_server_gutenberg`
- by default, server related changes are done
- set this filter true to disable all server related gutenberg modifications

See file `plugins/gutenberg.php` for all available filters, example disable custom colors, disable custom font sizes, define own color palette etc...
