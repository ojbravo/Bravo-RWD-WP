## What's Included:

This framework is a mashup of resources that I have put together in order to get my development workflow started as quickly as possible.

Please note that all of the CSS is compiled using Sass / Compass.  If you are not currently using CSS Preprocessing, start doing so now.  I recommend using <a href="http://incident57.com/codekit/" target="_blank">CodeKit</a> (on a Mac), or the <a href="http://compass.handlino.com/" target="_blank">Compass app</a> (on a PC)

Here is a breakdown of the files and what they do:

###	HTML (php) -

* index.php - The main page that calls in all other files via the php include command.

* header.php - Includes the
	<code>&lt;head&gt;&lt;/head&gt;
	&lt;body&gt;
	&lt;header&gt;&lt;/header&gt;,

* footer.php - Includes the javascript for the BravoMenu, and Scott Jehl's iOS Orientation Fix.

* config.rb - The Sass / Compass Configuration File.
		   

### CSS (sass / compass) -
		
* style.scss - Main stylesheet that imports all other _sass.scss files (listed below) and compiles them into the minified style.css.

* <a href="http://meyerweb.com/eric/tools/css/reset/" target="_blank">_reset.scss</a> - CSS Reset from Eric Meyer

* _bravo-grid-v16.scss - Responsive Grid I rolled myself.

* _bravo-menu-v5.scss - Responsive Menu I rolled myself.

* _toobox.scss - Some useful utility classes that I use repeatedly.

* _typography.scss - Basic type settings.

* login.css - Styles for Wordpress Login Screen.

* <a href="http://fortawesome.github.com/Font-Awesome/" target="_blank">_font-awesome.scss</a> - Settings for Font-Awesome icon font.


### Javascript -
		
* <a href="https://github.com/aFarkas/html5shiv" target="_blank">html5shiv.js</a> - Makes older browsers recognize new HTML5 Elements.

* <a href="https://github.com/scottjehl/Respond" target="_blank">respond.min.js</a> - Makes older browsers recognize CSS Media Queries.

* <a href="http://quojs.tapquo.com/" target="_blank">quo.js</a> - Enables touch gestures (swipe left / right).


