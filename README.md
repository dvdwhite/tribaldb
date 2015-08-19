# UMC Theme

Hi there. To get this theme up and running we're going to need to do some things:

1. [Install the System Requirements](#1)
2. [YeoPress: Install WordPress & Our Theme](#2)
3. [Get Grunt & Bower Up and Running](#3)

<a name="1" href=""></a>Install System Requirements
------

When installing you will need to be the install user. Some of these will not allow you to install them as `sudo` and it is not recommended to install as this user. To become the install user, open up your command line (terminal is default for mac) and run: `su - install`. Enter your password and your prompt should look something like: `install@[host] ~ >`

##### 1. Install GIT
To see if you already have git installed run: `git --version`
if you get a version number you have it.
Also, see where it is installed by running: `which git`
For Mac OSX, it should be installed in: `/usr/local/bin/git`

If you don't have it installed, follow <a href="https://help.github.com/articles/set-up-git/" target="_blank">this article</a>.

##### 2. Install Xcode, Xcode Command Line Tools, & Homebrew
<a href="https://developer.apple.com/xcode/downloads/" target="_blank">Download Xcode</a>
Command Line Tools run:
```
xcode-select --install
```

Install <a href="http://brew.sh/" target="_blank">Homebrew</a> run:
```
ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
```
Follow the directions at the end and run `brew doctor`.
You should get: `Your system is ready to brew.`

Add Homebrew to your $Path:
1st check to see if it is already part of your path: `echo $PATH` if you have somewhere in there `:/usr/local/bin:` ignore these next two steps. If you don't have it add this to your .bash_profile. All paths are seperated by `:`.

```
export PATH="/usr/local/bin:$PATH"
```
after adding/saving this, source your bash profile (~/.bash_profile):
```
source ~/.bash_profile
```

##### 3. Install Node & Node Package Manager (NPM) through Homebrew
<a href="http://blog.teamtreehouse.com/install-node-js-npm-mac" target="_blank">This article</a> from Treehouse explains why to use Homebrew to install Node and you can follow this article to install node or follow the instructions below. The great thing is, if you need to uninstall Node, all you need to run is: `brew uninstall node`.

Install Node & NPM:
```
 brew install node
 ```

to make sure node was installed run: `node -v` 
and you should get something like this: `v0.10.33`
to make sure NPM was installed run: `npm -v` 
and you should get something like this: `2.1.11`

##### 4. Install Yeoman & YeoPress
Now with NPM, things are super easy to install.

To Install Yeoman globally (all users have access) run:
```
npm install -g yo
```
To install the YeoPress generator run:
```
npm install -g yo generator-wordpress
```
We'll come back to YeoPress here after all the installs.

##### 5. Install Grunt & Bower
<a href="http://gruntjs.com/" target="_blank">Grunt</a> is a "JavaScript Task Runner." It takes care of automating tasks.
<a href="http://bower.io/" target="_blank">Bower</a>  manages front-end library dependencies and rainbows, aparently... Medium did a great job of giving a working overview of Bower at <a href="https://medium.com/@ZaidHanania/bower-101-c0b57322df8" target="_blank">Bower 101</a>.

To install Grunt & Bower run:
```
npm install -g grunt-cli bower
```

##### 6. Install SASS
On a Mac, this is fairly simple because Ruby, a SASS dependency, is pre-installed.
For installing SASS we are going to use `sudo` so it is installed global. To install run:
```
sudo gem install sass
```
Make sure you got it by running:
```
sass -v
```
It should return something like: `Sass 3.4.10 (Selective Steve)`

## <a name="2" href=""></a>YeoPress: Install WordPress & Our Theme

##### 1. Install Wordpress
Here is <a href="http://wesleytodd.com/2013/5/yeopress-a-yeoman-generator-for-wordpress.html" target="_blank">Wesley Todd's article</a> on the YeoPress generator.

Cd to your install directory and run the YeoPress generator:
```
cd /path/to/wp
yo wordpress
```

After the nice ASCII art logo, you'll answer the prompts like so:
```
? WordPress URL: [your dev url. ex: http://wp-2015tribaldb-sandbox.dev]
? Table prefix: wp_
? Database host: localhost
? Database name: 2015tribaldb_sandbox
? Database user: root
? Database password: [password]
? Use Git? No
? Would you like to install WordPress as a submodule? No
? Would you like to install WordPress with the custom directory structure? No
? Install a custom theme? No
? Does this all look correct? Yes
```
Enter `Y` for yes to the initial error to get things rolling.

##### 2. Install the theme
```
cd /wp-content/themes
git clone https://github.com/utah-marketing-communications/umc2015.git
cd tribaldb
git pull origin master
```
To use GIT with GitHub, click on the "+" icon, make sure add is highlighted, and then navigate to the umc2015 folder within this install. Then hit the "Add Repository" button.

Now configure your server and/or virtual hosts and run the 5min install. Then, voila! you have wordpress with this theme installed!


## <a name="3" href=""></a> Get Grunt & Bower Up and Running
##### 1. Install the grunt dependencies.
Run in the tribaldb folder: `npm install`
This will install the node_modules folder

##### 2. Install the bower components.
Run in the tribaldb folder: `bower install`
This will install the bower_components folder

##### 3. Setup BrowserSync.
Open up your Gruntfile.js and search for browserSync. Here you will see the settings for the browserSync task and what you need to change is the proxy. That is the local server you are running WordPress on. <a href="http://www.browsersync.io/docs/options/#option-proxy" target="_blank">See the documentation</a> for the different options.

##### 4. Get Grunt running! 
In the umc2015 folder run:
```
grunt
```
This runs the default grunt task, which compiles our SASS, runs BrowserSync, and watches for changes to our files.
BrowserSync will launch a tab or window in your browser, with the local url being: http://localhost:3000
You can also use BrowserSync on an external device by using the External URL given (see your command line) while BrowserSync is running.

##### 5. Try it out!
To see the SASS compliling and BrowserSync working, switch to the UMC 2015 Theme in WordPress, then, in the theme open up the scss/style.scss file. Go to the bottom of the file and change the pink background color, hit save, and you'll see the update in your browser.

##### 6. Try out the release task!
The Grunt task that will prefix, compress, min, and concat the necessary files is the "release" task. You can try it out. To stop the current grunt task, press Ctrl+C. Then run:
```
grunt release
```

## Congratulations!
You made it! From here we can start building the UMC Theme.
