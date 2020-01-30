# Books4Languages Child Theme for PressBooks

* Contributors: @colomet, @danzhik, @huguespages, @lukastonhajzer
* Donate link: https://opencollective.com/mylanguageskills
* Tags: wordpress, multisite, pressbooks
* Tags: pressbooks, wordpress, theme, books4languages
* Requires at least: 3.0.1
* Tested up to WP: 5.2.4
* Tested up to PB: 5.9.5
* Requires PHP: 5.6.0
* Stable tag: 1.4.7
* License: GNU 3.0
* License URL: https://www.gnu.org/licenses/gpl-3.0.en.html

Requires:
Pressbooks 5.8,
For fully functional translations (plugin translations-for-pressbooks at least v1.2.6 with conjunction of extensions-for-pressbooks v1.2.4)

Stable tag: [![Current Release](https://img.shields.io/github/release/Books4Languages/pressbooks-metadata.svg)](https://github.com/my-language-skills/books4languages-book-child-theme-for-pressbooks/releases/latest/)

License:  [![License](https://img.shields.io/badge/license-GPL--3.0-red.svg)](https://github.com/my-language-skills/all-in-one-metadata/blob/master/LICENSE.txt)

This is child theme of Jacobs theme (Pressbooks) provides the front end requirements for Books For Languages Catalog.

## Description

This theme is personalization of Jacobs Pressbooks theme (child theme of McLoohan theme), made with requirements of [Books4Languages](https://open.books4languages.com/) website.

## Installation

1. Clone (or copy) this repository folder `books4languages-book-child-theme-for-pressbooks` to the `/wp-content/themes/` directory
2. Activate the theme through the 'Themes' screen in WordPress Network Administration

## Upgrades

For upgrades, download the last stable version from github, delete from the old version of theme from your FTP and upload the new one.

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

## Frequently Asked Questions

## Screenshots

## Changelog
* **MODIFICATIONS**
 * Images optimiced to 64 colors png 8 ImageAlpha and ImageOptim)
 * index.php now use a custom style and order (Alpha version)
 * new sprite css file for simple metadata relations icons.
 * new sprite css file for translation for pressbook flag's icons.
 * new sprite css file for footer icons.
 * external links has nopeener attribute to improve security.

### 1.4.7
* **ENHANCEMENTS**
  * Deregister dashicons
  * Update css jacobs files
  * Modify css H2, H3, H4, Th
  * Modify boxes style
  * Deactivated googlefonts (finish)
  * Change toc from menu to url on mobile

### 1.4.6
  * **MODIFICATION**
  * HTML header fix related to update of the parent theme (smdre).
  * front-end TINYmce for Presssooks css code required

* **List of Files revised**
  * header.php

### 1.4.5
  * **MODIFICATION**
  * Merge CSS styles to single File
  * Remove CSS fixation of the content to 720px
  * Update header logo

### 1.4.4
* **ENHANCEMENTS**
  * Renamed functions related to updated Translations-for-pressbooks plugins
  * Remove google fonts from fonts.googleapis.com (now, just local google fonts) (not finish)

* **List of Files revised**
  * functions.php

### 1.4.3
* **ADDITIONS**
  * Site index link in the footer

* **ENHANCEMENTS**
  * CSS modifications

* **List of Files revised**
  * functions.php
  * style.css


### 1.4.2
* **ADDITIONS**
  * Modification of displaying post thumbnails related to upgraded version of featured_images_for_pressbooks plugin v0.7
  * Styles for switching order of bottom navigation bar.

* **ENHANCEMENTS**
  * Headar navigation menu styling

* **List of Files revised**
  * conent-single.php
  * style.css

### 1.4.1
* **ADDITIONS**
  * Function for monitoring if displaying of featured images is disabled for mobile devices. (related to featured-images-for-pressbooks plugin v0.6)

* **ENHANCEMENTS**
  * Fix book content width to 720px.

* **BUG**
  * Fixed error for relations-for-pressbooks when simple-metadata plugin deactivated.

* **List of Files revised**
  * header.php
  * content-cover-book-header.php
  * conent-single.php


### 1.4
 * **ADDITIONS**
  * Display related content from simple-metadata-relation plugin.
  * Adding functionality related to displaying translation options.
  * Adding functionality related to upgrade of translations-for-pressbooks plugin which checks if translations option for current book and post is enabled.

 * **ENHANCEMENTS**
  * Removed redundant tags in footer.php
  * Updated logo size


* **List of Files revised**
  * added smd-relations.css
  * added and modified content-cover-book-header.php
  * header.php
  * footer.php
  * functions.php
  * script.js
  * translations-menu.css


### 1.3
Complete RE-BUILD of the book child theme due to update of the parent theme (pressbook-book) McLuhan to version 2.8.9 and its Jacobs child-theme to version 1.2.0.

* **ADDITIONS**
  * All the useful functionalities from previous versions.
  * Translations menu in header and footer (Requires: plugin translations-for-pressbooks at least v1.2.4)
  * Added and modified featured image functionality from previous version.

* **ENHANCEMENTS**
  * All the useful enhancements from previous versions.
  * Book download button and its dropdown menu.

### 1.2.4
* **ENHANCEMENTS**
  * Center small image

* **REMOVED**
  *  Auto update from github

* **ADDITIONS**
  * Meta data in front web page of book : City

* **List of Files revised**
  * content-cover-metadata.php
  * content-single.php

### 1.2.3
* **BUG**
  * Auto update

* **List of Files revised**
  * functions.php
  * style.css

### 1.2.2
* **ADDITIONS**
  * Add possibility to add featured image in top of the page

* **ENHANCEMENTS**
  * Add space paddind for featured image

* **List of Files revised**
  * content-single.php
  * style.css

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
	* single.php (changed function for creation of next/previous chapters
    links)
	* functions.php (extends parent)
	* style.css (extends parent)

## Upgrade Notice

* Here's a link to [PressBooks](https://pressbooks.org/get-involved/ "Your favorite ebook platform")

* [Online Documentation](https://make.wordpress.org/core/handbook/best-practices/inline-documentation-standards/)

---
[Up](/README.md)
