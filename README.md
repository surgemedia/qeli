<h1>Qeli (Queensland Education Leadership Institute)</h1>
- `grunt dev` Runs Once
- `grunt watch` watches for file changes.
- added Bugherd Commit Hook

For Markup Basics [Click Here](https://help.github.com/articles/markdown-basics/)

<h2>Git Setup</h2>
- repository manager: XXXX YYYYY
- feature branch workflow
https://www.atlassian.com/git/tutorials/comparing-workflows/feature-branch-workflow

<h2>cPanel location</h2>
- [Staging URL](http://54.79.72.151/~qeliedu/)
- [Staging Admin](http://54.79.72.151/~qeliedu/wp-admin/)

<h2>Wordpress CMS 4.0+</h2>

<h2>Roots IO Starter theme</h2>
- Bootrap front end framework
- Grunt, bower, node build tools

<h2>Plugins</h2>
- Advanced Custom Fields
- Advanced Custom Fields: Options Page
- Advanced Custom Fields: Repeater Field
- Advanced Custom Fields: Gallery Field
- Gravity Forms
- Enable Media Replace
- Regenerate Thumbnails
- Velvet Blues Update URLs
- Wordfence Security
- WordPress SEO
- WP Super Cache

<h2>Custom Post Types</h2>
- Case studies
- Courses [see QELi Course metadata for info]
- Testimonials
- QELi News
- QELi industry links

<h2>Custom Taxonomies - thinking here....</h2>
- Course

<h2>Build tools (see package.json) base set from Roots IO</h2>
- LESS precompiler
- Grunt terminal commands
	- "grunt build"
	- "grunt watch"
	- "grunt dev"

<h2>Javascript Libraries</h2>
-Add all VENDOR plugins to bower and manage from there if possible. List each below if not bower-able
	- refer to bower.json for plugin packages
	- see assets/js/vendor for deployed files
-Add all custom js plugins as individual modular files
	- see assets/js/plugins for build files
	- merged into scripts.min.js and scripts.js for deployment

<h2>Deployment</h2>
- No deployment tools at this time.
- Ensure final deployed files are minimised once site has bedded down.
- Remove all build files from the server.