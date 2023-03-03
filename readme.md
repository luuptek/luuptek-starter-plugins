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
