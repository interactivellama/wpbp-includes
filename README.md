wpbp-includes
===========

WordPress Boilerplate (PHP includes)
These are PHP files includes to be added to the [Roots theme](https://github.com/retlehs/roots). Functions within this library typically begin with `llama_` or `wpbp_` in order to distinguish them from built-in or other third party functions. These files are very granular. Some only contain one function. This is so they don't all have to always be added.

## Roots Theme Overview
The Roots theme has many benefits:

* HTML5 Boilerplate’s markup
* Bootstrap from Twitter
* Theme wrapper
* Root relative URLs
* Clean URLs (no more /wp-content/)
* All static theme assets are rewritten to the website root (/assets/css/, /assets/img/, and /assets/js/)
* Cleaner HTML output of navigation menus
* Cleaner output of wp_head and enqueued scripts/styles
* Posts use the hNews microformat

## Content
Import this XML file via the "built-in" importer to test the blog post portion of WordPress. It contains a few categories and posts that have sample HTML elements in them. It is recommended that all this "dummy content" be assigned to a user that will be deleted (an thus all associated posts removed) when the site goes into production.

## Copy to /lib/ files
This is a storage bin located in `/copy-to-root-lib-folder/` for snippets of PHP and HTML that should be manually added to the /lib/ folder of the theme and included in `/lib/custom.php`.

## Snippets
This is a storage bin located in `/snippets/` for snippets of PHP and HTML. These are typically overwrites of the default theme files. Please manually add to them to your theme (if you want).

## Third-party libraries and WordPress Plugins (unversioned)
These are found in /lib/wpbp-includes/vendor/. Any other folder is probably custom.

* *acf-options-page* - Copy to the WordPress plugins directory

* *acf-repeater* - Copy to the WordPress plugins directory

* *wp-h5bp-htaccess-master* - HTML5 Boilerplate's htaccess file. Removed from roots in April 2013. Recommended to be a direct include instead of a plugin. <https://github.com/roots/wp-h5bp-htaccess/>

## Additional Reference Information
> Formidable Forms Logins:
> welldonemarketing
> welldone1

## Contact
This repository was began by Stephen M. James (InteractiveLlama) while working at Well Done Marketing.

* Twitter: @tweetllama
