<h1>Qeli (Queensland Education Leadership Institute)</h1>
- `grunt dev` Runs Once
- `grunt watch` watches for file changes.
- added Bugherd Commit Hook

---
###Update
__Home page__
Promotion panel - make link update option

__Programs__
QELI Newsletter – move newsletters in to Archives (archive2014 articles) 

__Home page__
- Create blog panel based on News panel

__Programs page__
- Merge Our Programs & Program Catalogue and apply Scheduled Programs dropdown 

__Case study integration__
- Add case study panel to program pages, develop case study landing and details page based on blog template 
- Add case study lisings to the Customised Programs and Specialist Services pages

QELi Talks
- add ability to filter like Our Community page - outsource to BCD if required

---

For Markup Basics [Click Here](https://help.github.com/articles/markdown-basics/)

<h2>Git Setup</h2>
- repository manager: XXXX YYYYY
- feature branch workflow
https://www.atlassian.com/git/tutorials/comparing-workflows/feature-branch-workflow

<h2>cPanel location</h2>
- [Cpanel](https://s4.surgehost.com.au:2083)


<h2>Wordpress CMS 4.0+</h2>
- [Staging URL](http://54.79.72.151/~qeliedu/)
- [Staging Admin](http://54.79.72.151/~qeliedu/wp-admin/)

<h2>Roots IO Starter theme</h2>
- Bootrap front end framework
- Grunt, bower, node build tools

<h2>Plugins</h2>
- Advanced Custom Fields : *Installed*
- Advanced Custom Fields: Options Page : *Installed* 
- Advanced Custom Fields: Repeater Field : *Installed*
- Advanced Custom Fields: Gallery Field : *Installed*
- Gravity Forms : *Installed*
- Enable Media Replace : *Installed*
- Regenerate Thumbnails : *Installed*
- Velvet Blues Update URLs : *Installed*
- Wordfence Security : *Installed*
- WordPress SEO : *Installed*
- WP Super Cache : *Installed*
- wp-session-manager(Required for Cart) : 

<h2>Custom Post Types</h2>
- Case studies
- Courses [see QELi Course metadata for info]
- Testimonials
- QELi News
- QELi industry links

<h2>ACF JSON Sync</h2>
<img src="http://www.advancedcustomfields.com/wp-content/uploads/2014/12/acf-pro-sync-available.png" alt="">
[Read More](http://www.advancedcustomfields.com/resources/synchronized-json/)

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

<h2>PHP request (php.ini)</h2>
	-max_execution_time = 30000     ; Maximum execution time of each script, in seconds
	-max_input_time = 100000	; Maximum amount of time each script may spend parsing request data
	-memory_limit = 256M      ; Maximum amount of memory a script may consume (8MB)
	-max_input_vars = 10000;
