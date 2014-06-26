require-bower-grunt-boilerplate
===============================

A boilerplate for a front-end build system setup using requirejs, bower, gruntjs and of course LESS

You must have nodejs installed in order to use this tool.  http://nodejs.org/

<b>Lets get started:</b>
<pre>cd build</pre>
<pre>npm install</pre>
<h3>The File Watcher</h3>
I've setup automated tasks for both CSS and JS compilation. The compiled files will sit in <code>/assets/css/dist</code> and <code>/assets/js/dist</code> respectively. 
 
You can trigger the file watcher using the following command:
(assuming you're in the build folder)
<br />
<pre>grunt watch</pre>
Once the file watcher is initiated it will watch both <code>assets/js</code> and <code>assets/css</code> folders for any changes. Meaning if you change or add any files inside either of those folders, it will run the build tools and output the compiled file(s) in the respective <code>/dist</code> subfolder.

Since the LESS compiler is fairly straight foward. lets talk a bit more about the JS compiler.

<h3>Javascript Management</h3>
This system is using both <b>bower</b> and <b>requirejs</b> to help manage the js dependencies.

lets take a look at <code>/assets/js/config.js</code>

<pre>
requirejs.config({
    baseUrl: '/assets/js/',
    waitSeconds: 0,
    paths: {
        jquery: '../../build/bower_components/jquery/dist/jquery',
        parsleyjs: '../../build/bower_components/parsleyjs/dist/parsley',
        site: 'app/site'
    },
    shim: {
        site: ['jquery']
    },
    packages: [

    ]
});
</pre>

This is our config file which we use to keep track of dependencies and other assets. 

This is where bower comes into play. Using <code>bower install</code> we can safely generate new libs and plugins into our folder structure as well as automatically add them to our config file.  

For example, lets <code>cd</code> to our build folder and run <code>bower install colorbox</code>

The file watcher will recognize these changes and update the config file to look like this.

<pre>
requirejs.config({
    baseUrl: '/assets/js/',
    waitSeconds: 0,
    paths: {
        jquery: '../../build/bower_components/jquery/dist/jquery',
        parsleyjs: '../../build/bower_components/parsleyjs/dist/parsley',
        site: 'app/site',
        colorbox: '../../build/bower_components/colorbox/jquery.colorbox',
    },
    shim: {
        site: [
            'jquery'
        ]
    },
    packages: [

    ]
});
</pre>

Now that we've updated our  <code>config.js</code> we need to tell the build tool which assets we're going to include in our production file. This is pretty simple and we do it inside of <code>/assets/js/main.js</code> which looks like this.

<pre>
require(['./config'], function(){
    require([
        'parsleyjs',
        'colorbox',
        'site']);
});
</pre>


Notice that  I'm not including jquery, even though it's required for both colorbox, and <code>/app/site.js</code>. We don't need to do this inside of <code>main.js</code> because we're already defining it inside of <code>config.js</code>. This allows us to define dependencies for our plugins/files using:  <pre>  shim: {
        site: [
            'jquery'
        ]
    },
</pre>.

Assuming that the changes you make are error free, and you save <code>/assets/js/main.js</code> your production ready js file will be placed inside <code>/assets/js/dist/</code>

<h3>Debugging JS</h3>

So we've now covered how we can manage our JS assets and get them ready for production. Lets talk about how we can troubleshoot/debug any issues we run into along the way.

Inside of index.php I've included a very basic conditional script that looks for a querysting <code>yourdomain.com/?dev</code>

<pre>
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if(false !== strpos($url,'dev')) { 
<script data-main="assets/js/main.js"  src="assets/js/require.min.js"></script>
} else {
<script src="assets/js/require.min.js"></script>
<script src="assets/js/dist/main.min.js?v=1"></script>
}
</pre>

By placing this querystring on the end of your URL, you're telling require to load each script thats defined inside of <code>/assets/js/main.js</code> separately. To revert to production simply remove the <code>?dev</code> querystring. 

<h3>Other Defined Grunt Tasks</h3>

I've created a number of other commands that mimick the watcher, to help troubleshoot, or get a different output.

To compile your LESS into unminfied css, run:

<pre>grunt less:dev</pre>

To compile your LESS like the watcher, run:
<pre>grunt less:prod</pre>

To compile your JS like the watcher, run:
<pre>grunt buildjs</pre>

To update your <code>config.js</code> file with any new bower updates without the watcher, run:
<pre>grunt package</pre>


You can make edits to the watcher, and other grunt processes via <pre>/build/gruntfile.js</pre>

For windows users, I've also included batch files inside of <code>/build</code> that run the node commands.

<h3>Cool tricks</h3>

For those not to fimilar with bower, try checking out their package list.

http://bower.io/search/

