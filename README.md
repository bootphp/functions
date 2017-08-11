# functions
Basic Util Functions



## project
Provides values of paths/URLs on Server which can be used throughout the project.

Lets say your Apache points to `/Users/lalittanwar/Projects/pichku-service` directory on server hence it becomes root directory. 
And `.htaccess` and `index.php` are in `web` folder inside root directory. And `.htaccess` is like this
```.htaccess
RewriteRule ^(.*)$ index.php?_q=$1 [L,QSA]
```
On hitting the URL `http://local.pichku.com/web/cleanurl/path.json?id=78` **project** constants will have these values
 ```
project::$DOC_ROOT  ==  /Users/lalittanwar/Projects/pichku-service
project::$DOC_BASE  ==  /Users/lalittanwar/Projects/pichku-service/web
project::$DOC_BASE_DIR  ==  /web
project::$SCRIPT  ==  /web/noindex.php
project::$SCRIPT_FILE  ==  /Users/lalittanwar/Projects/pichku-service/web/noindex.php
project::$PROTOCOL  ==  http
project::$PORT  ==  80
project::$DISP_PORT  ==  
project::$REQUEST_HOST  ==  local.pichku.com:80
project::$REQUEST_HOSTNAME  ==  local.pichku.com
project::$REQUEST_ORIGIN  ==  http://local.pichku.com
project::$REQUEST_BASE  ==  http://local.pichku.com/web
project::$REQUEST_REMOTE  ==  http://local.pichku.com/web
project::$REQUEST_SUBDOMAIN  ==  local
project::$REQUEST_DOMAIN  ==  pichku.com
project::$REQUEST_PATHNAME  ==  /web/cleanurl/path.json
project::$REQUEST_FILENAME  ==  path.json
project::$REQUEST_DIRNAME  ==  /web/cleanurl
project::$REQUEST_QUERY  ==  id=78
project::$REQUEST_FILE_EXT  ==  json
```

## fn

[Api Docs](DOCS.md#class-bootphpfn)


## cokiee

[Api Docs](DOCS.md#class-bootphpcookie)

## str

[Api Docs](DOCS.md#class-bootphpstr)

## file

[Api Docs](DOCS.md#class-bootphpfile)


## Command & Link
```$xslt
./lib/bin/phpdoc-md generate bootphp\\fn,bootphp\\str,bootphp\\cookie,bootstrap\\file > lib/bootphp/functions/DOCS.md
```
Will generate [DOCS](DOCS.md)