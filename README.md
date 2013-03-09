WP Aldren
========
Just another starter theme for WordPress development
--------
#### This theme is a pretty barebones theme based on a few suggestions
*   Uses the Aldren sass framework for responsive design
*   Uses the Houndstooth Bolt WP theme structure
*   Uses Grunt.js for project scaffold and production build
*   Uses Bower to pull in components
    * jQuery
    * Modernizr
    * Flexslider

We also suggest using our WordPress core starter, [Topcoat](https://github.com/HoundstoothSTL/topcoat/ "Topcoat"), in conjunction with this theme.

We use this to theme to start off our WordPress site builds.  

This is a work in progress and we're putting it up on github for easier tracking and versioning, feel free to use at your discretion.

### Setup
    git clone https://github.com/HoundstoothSTL/wp-aldren
    bower install
    npm install
    grunt scaffold
    grunt compass


### Production Build
    grunt build

### Todo
- Still tweaking the grunt build to include grunt-contrib-imagemin (waiting for grunt@0.4.0rc5 support)
- This theme uses grunt 0.4.0rc5 - use at your discretion
- More thorough documentation
- Need to update all gruntjs modules to 0.4 current