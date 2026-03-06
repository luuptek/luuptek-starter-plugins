# Luuptek Starter Plugins

This plugin is intended for [Luuptek Starter theme](https://github.com/luuptek/luuptek-wp-starter) and other Luuptek WordPress projects. It provides opinionated project defaults that are often implemented in the theme layer otherwise.

There are multiple filters available (see details below) to customise plugin behavior.

### What does this plugin do?
- Remove WP logo from admin bar
- Add notification, if ACF Pro is not available
- Disable ACF post type registration
- Clean admin menu (remove comments and site health)
- Clean dashboard widgets and add Luuptek guide feed
- Removes the auto-discovery link for the site's primary RSS feed.
- Removes the auto-discovery link for all other RSS feeds associated with the site.
- Removes the link to the previous and next posts in the site's RSS feed.
- Removes the shortlink meta tag, which provides a short URL for the current page or post.
- Removes dashicons from the frontend for logged out users
- Removes the script that detects and loads the emoji CSS and JavaScript files in the <head> section of a WordPress site for visitors.
- Removes the script that detects and loads the emoji CSS and JavaScript files in the admin area of a WordPress site.
- Removes the CSS for emojis in the <head> section of a WordPress site for visitors.
- Removes the CSS for emojis in the admin area of a WordPress site.
- Removes emoji characters from the content of RSS feeds.
- Removes emoji characters from the text of comments in RSS feeds.
- Removes emoji characters from emails sent by WordPress.
- When an email is sent using WordPress's wp_mail() function, set the "From" name to the site's name by default
- Disable admin notification emails for user password changes
- Multiple Gutenberg restrictions and editor defaults (customised via filters)
- Add a top-level menu item for block patterns for allowed users
- Remove accents from filenames
- Disable scaling of big image sizes
- Add Luuptek shape to robots.txt
- Multiple security related improvements (for example disable user REST API endpoint)
- Set opinionated default WordPress settings after theme switch
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

`disable_acf_warning`
- Return true/false
- Use to disable no acf warning (this is handy in projects were ACF is not needed anymore)

`luuptek_disable_comments`
- Return true/false
- comments are disabled by default
- set filter value to false to keep comments menu visible

`luuptek_disable_site_health`
- site health is disabled by default
- set filter value to false to keep site health visible

`luuptek_disable_guide_feed`
- Luuptek guide feed is provided by default
- disable it by setting filter value to true

`disable_luuptek_starter_email_from`
- Return true/false
- Used by default  to prevent emails from sender name "WordPress"

`luuptek_allowed_block_menu_user`
- Return a user slug string or an array of user slugs
- Controls which users can see the `Lohkomallit` admin menu item

`luuptek_gutenberg_js_settings`
- Return an array of JavaScript settings passed to `plugins/gutenberg.js`
- Use to control editor-side block style removals

# Gutenberg related filters

`disable_luuptek_allowed_blocks`
- Luuptek block restrictions are enabled by default
- set this filter to true to bypass this plugin's allowed block list
- enable this in FSE / block theme projects

`disable_luuptek_server_gutenberg`
- by default, server related Gutenberg changes are enabled
- set this filter true to disable all server related gutenberg modifications
- enable this in FSE / block theme projects

`luuptek_allowed_gutenberg_blocks`
- Filter the default allowed block list
- Use this to add or remove blocks per project or post type

`luuptek_add_editor_color_palette`
- Filter the editor color palette
- Default is an empty array

`luuptek_disable_custom_colors`
- Return true/false
- Disable or allow Gutenberg custom colors

`luuptek_disable_custom_font_sizes`
- Return true/false
- Disable or allow custom pixel-based font sizes

`luuptek_disable_custom_gradients`
- Return true/false
- Disable or allow the custom gradient UI

`luuptek_add_editor_gradient_presets`
- Filter editor gradient presets
- Default is an empty array

`luuptek_disable_editor_font_sizes`
- Return true/false
- Disable or allow preset editor font sizes

`luuptek_disable_core_block_patterns`
- Return true/false
- Disable or allow core block patterns

`luuptek_disable_gutenberg_widgets`
- Return true/false
- Disable or allow the block-based widgets editor

`luuptek_gutenberg_disable_fullscreen_default`
- Return true/false
- Disable fullscreen mode by default when the block editor loads

See file `plugins/gutenberg.php` for the implementation details of each filter.
