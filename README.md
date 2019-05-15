# Books4Languages Child Theme for PressBooks

Contributors: @colomet, @danzhik, @huguespages

Donate link: https://opencollective.com/mylanguageskills

Tags: wordpress, multisite, pressbooks

Tested up to: WP 5.2

Requires:  Pressbooks 5.8

Stable tag: [![Current Release](https://img.shields.io/github/release/Books4Languages/pressbooks-metadata.svg)](https://github.com/my-language-skills/books4languages-book-child-theme-for-pressbooks/releases/latest/)

License:  [![License](https://img.shields.io/badge/license-GPL--3.0-red.svg)](https://github.com/my-language-skills/all-in-one-metadata/blob/master/LICENSE.txt)

License URI: http://www.gnu.org/licenses/gpl-3.0.txt

Personalization of the Jacobs child theme for Pressbooks.

## Description

This theme is personalization of Jacobs Pressbooks theme (child theme of McLoohan theme), made with requirements of [Books4Languages](https://open.books4languages.com/) webiste.

## Installation

1. Clone (or copy) this repository folder `books4languages-book-child-theme-for-pressbooks` to the `/wp-content/themes/` directory
1. Activate the theme through the 'Themes' screen in WordPress Network Administration

## Upgrades

For upgrades, download the last stable version from github, delete from FTP the old version of theme and upload the new one.

## Frequently Asked Questions


## Requirements

Books4Languages Book Child Theme for Pressbooks works with:

  * PHP 7.2
  * Pressbooks 5.8
  * PressBooks Mc McLuhan
  * Extensions for pressbooks 1.2.1
  * Simple metadata
  * Simple metadata education
  * Restic content
 Lower versions are not supported.

## Disclaimers

Books4Languages Child Theme for Pressbooks is supplied "as is" and all use is at your own risk.

## Screenshots

## Roadmap
### Soon

### Later

### Future

### Now
### 1.2.1
* **REMOVED**
	* From picture name:  Title and Alt Text and Description is created automatic.

* **ADDITIONS**
  * Add possibility to modify responsive theme

* **List of Files revised**
  * functions.php
  * style.css
  * responsive.css

### 1.2
* **ADDITIONS**
	* Add fav-icon of the page of the site

* **BUG**
	* correct the install of uptade of the new version of themes

* **List of Files revised**
	* functions.php
  * footer.php
  * header.php
	* partials/content-cover-book-header.php
	* partials/content-cover-toc.php


### 1.1.1
* **ADDITIONS**
	* From picture name:  Title and Alt Text and Description is created automatic.

* **List of Files revised**
	* functions.php (extends parent)

### 1.1
* **REMOVED**
	* partials/content-cover-toc.php no longer required after update to McLuhan 2.6.0

* **List of Files revised**
	* partials/content-cover-toc.php

#### 1.0
* **ADDITIONS**
	* Static footer for Books4Languages (logos, links)
	* Logo image of Books4Languages in header
	* Resources tab (requires ['AIOM Education Related Content'](https://) plugin to manage content of resources)
	* Automatically generated links for tranlsations <-> original books (requires ['Extensions for Pressbooks'](https://) plugin to manage relations of translations)

* **ENHANCEMENTS**
	* 'Show All Contents' button if front page of book moved to the top of TOC
	* Navigation arrows in chapters show titles of previous and following chapters
	* Hidden 'Download' dropdown in book cover page and 'Resources tab' in content for non-logged in users (requires [Restric Content](https://github.com/restrictcontentpro/restrict-content) plugin to manage the restrictions. **If not installed, can cause a break!**)
	* 'Sign Up' link in header and 'Your Membership' link in footer for RCP (requires [Restric Content](https://github.com/restrictcontentpro/restrict-content) plugin to manage the restrictions.)

* **List of Files revised**
	* footer.php
	* header.php
	* partials/content-cover-book-header.php
	* partials/content-cover-toc.php
	* single.php (changed function for creation of next/previous chapters links)
	* functions.php (extends parent)
	* style.css (extends parent)


## Upgrade Notice


## Credits

* Here's a link to [PressBooks](https://pressbooks.org/get-involved/ "Your favorite ebook platform")

* [Inline Documentation](https://make.wordpress.org/core/handbook/best-practices/inline-documentation-standards/)

---
[Up](/README.md)
