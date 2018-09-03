# Books4Languages Child Theme for PressBooks

Contributors: @colomet, @danzhik

Donate link: https://opencollective.com/mylanguageskills

Tags: wordpress, pressbooks

Tested up to: [![WordPress](https://img.shields.io/wordpress/v/akismet.svg)](https://wordpress.org/download/)

Requires:  [![Pressbooks](https://img.shields.io/badge/Pressbooks-V%205.3-red.svg)](https://github.com/pressbooks/pressbooks/releases/tag/5.3)

Stable tag: [![Current Release](https://img.shields.io/github/release/Books4Languages/pressbooks-metadata.svg)](https://github.com/my-language-skills/all-in-one-metadata/releases/latest/)

License:  [![License](https://img.shields.io/badge/license-GPL--3.0-red.svg)](https://github.com/my-language-skills/all-in-one-metadata/blob/master/LICENSE.txt)

License URI: http://www.gnu.org/licenses/gpl-3.0.txt

Personalization of the Jacobs child theme for Pressbooks.

## Description

This theme is personalization of Jacobs Pressbooks theme (child theme of McLoohan theme), made with requirements of [Books4Languages](https://open.books4languages.com/) webiste. 

## Installation

1. Clone (or copy) this repository folder `all-in-one-metadata` to the `/wp-content/themes/` directory
1. Activate the plugin through the 'Appearence' screen in WordPress

## Upgrades

For upgrades, download the last stable version from github, delete from FTP the old version of theme and upload the new one.

## Frequently Asked Questions


## Requirements

Books4Languages Book Child Theme for Pressbooks works with:

 * ![PHP](https://img.shields.io/badge/PHP-7.2.X-blue.svg)
 * [![Pressbooks](https://img.shields.io/badge/Pressbooks-V%205.3-red.svg)](https://github.com/pressbooks/pressbooks/releases/tag/5.3)

 Lower versions are not supported.

## Disclaimers

Books4Languages Child Theme for Pressbooks is supplied "as is" and all use is at your own risk.

## Screenshots

## Roadmap


### Now
#### 0.1
* **ADDITIONS**
	* Static footer for Books4Languages (logos, links)
	* Logo image of Books4Languages in header
	* Resources tab (requires 'AIOM Education Related Content' plugin)
	* Automatically generated links for tranlsations <-> original books (works with 'Extensions For Pressbooks' plugin)
	
* **ENHANCEMENTS**
	* Hidden 'Download' dropdown in book cover page and 'Resources tab' in content for non-logged in users (requires 'Restrict Content Pro', **If not installed, can cause a break!**)
	* 'Show All Contents' button if front page of book moved to the top of TOC
	* Navigation arrows in chapters show titles of previous and following chapters
	
* **List of Files revised**
	* footer.php
	* header.php
	* partials/content-cover-book-header.php
	* partials/content-cover-toc.php
	* single.php (changed function for creation of next/previous chapters links)
	* functions.php (extends parent)
	* style.css (extends parent)


### Soon

### Later

### Future

## Upgrade Notice


## Credits

* Here's a link to [Plugin Boilerplate](http://wppb.io/ "Uses the WordPress Plugin Boilerplate")
* Here's a link to [Composer](https://getcomposer.org/)
* Here's a link to [PressBooks](https://pressbooks.org/get-involved/ "Your favorite ebook platform")

---
[Up](/README.md)
