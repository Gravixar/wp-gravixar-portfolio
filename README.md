# Gravixar Portfolio 
* Contributors: fahdi
* Donate link: https://www.gravixarthemes.com
* Tags: full width portfolio, portfolio, artwork, full width showcase, full width gallery, portfolio grid, full width grid, full width portfolio grid, full screen portfolio, responsive portfolio, responsive portfolio grid, responsive grid
* Requires at least: 3.0.1
* Tested up to: 5.2.2
* Stable tag: 1.11
* License: GPLv3
* License URI: http://www.gnu.org/licenses/gpl-3.0.html

This is a Wordpress plugin that allows you to easily manage and showcase a grid of your portfolio items. If an item has a "Writeup" or additional information, then clicking the image will go to the single portfolio item page. If not, then it will expand to a larger image.

##  Description 

This plugin integrates a stripped down bootstrap scaffolding in order to allow you to showcase a full screen / full width grid of portfolio items on your site. Simply use the short-code to place your grid anywhere you want. A custom content type called "Gravixar Portfolio" is created for you to manage internally. You have the option of having a separate single page for each portfolio item added (that you will arrive when you click the image in the grid). If no additional information is given in the backend then clicking the image in the grid will simply enlarge it as a modal window.

## Installation 

This section describes how to install the plugin and get it working.

e.g.

1. Upload the plugin files to the `/wp-content/plugins/gravixar-portfolio` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the short-code markup anywhere in your site 


## Frequently Asked Questions 

### What are the short-code options? 

An example short-code would be the following :

<pre>
[gravixar_portfolio numposts="10"]
</pre>


### How can I style the markup? 

You can either style the content that the short-code pulls by using the built-in Wordpress WYSIWYG editor or you can apply CSS styling to the custom classes that are generated in the markup. There will be general "catch-all" CSS classes generated and custom per-short-code classes that will allow you to style each markup individually, or all at once.

### How do I change the number of grid items per row?

Unfortunately this is not possible at this point. Eventually a number will be passed via short-code options

### What else have you done? 

We do [Gravixar Themes](https://www.gravixarthemes.com "Gravixar Themes") :)

## Changelog

### 1.0 
* Stable version created
* Implemented short code options 

### 1.1
* Added check for template folder for single-portfolio.php file. You can now copy the file to your theme and safely modify the single portfolio page template

### 1.2
* Added the short-code option "numperrow" to specify how many items per row to list

### 1.3
* Changed ID of each portfolio item in multiple view page (short-code) to use ID instead of class

### 1.4 
* Fixed bug in saving meta data. Used improper escape function for gallery image save.

### 1.5
* Fixed bug in inline jQuery to make entire image area clickable in multi portfolio item page

### 1.6
* Added ability to add mobile version of tile images TBD for mobile portrait mode version of images

### 1.7
* Adjusted generated bootstrap with less font-family conflicts

### 1.8
* Updated readme with proper short-code example

### 1.9 
* Resolved bug in jQuery media dialogue when adding an image that is less than the thumbnail size set in settings (Thanks Danny!)

### 1.10
* Updated support for latest Wordpress Version

### 1.11
* Wordpress 5 compatibility
