<?php

namespace bootphp {

    /**
     * Class project
     * @package bootphp
     */
    class project
    {

        /**
         * @var string root path of script ex: /Users/lucas/projects/pichku-service
         */
        public static $DOC_ROOT = "/Users/lalittanwar/Projects/pichku-service";

        /**
         * @var string Absolute path to your installation ex: /Users/lucas/projects/pichku-service/web
         */
        public static $DOC_BASE = "/Users/lalittanwar/Projects/pichku-service/web";

        /**
         * @var string Name of ex: '' or '/web'
         */
        public static $DOC_BASE_DIR = "/web";

        /**
         * @var string Name of script file ex : /web/index.php
         */
        public static $SCRIPT = "/web/index.php";

        /**
         * @var string Name of script file ex : /Users/lucas/Projects/pichku-service/web/index.php
         */
        public static $SCRIPT_FILE = "/Users/lalittanwar/Projects/pichku-service/web/index.php";

        /**
         * @var string protocol ex: http
         */
        public static $PROTOCOL = "http";

        /**
         * @var string port ex: 80
         */
        public static $PORT = "80";

        /**
         * @var string protocol ex: http
         */
        protected static $DISP_PORT = "";

        /**
         * @var string HOSTNAME:PORT ex: local.pichku.com:80
         */
        public static $REQUEST_HOST = "local.pichku.com:80";

        /**
         * @var string HOSTNAME ex: www.pichku.com
         */
        public static $REQUEST_HOSTNAME = "local.pichku.com";

        /**
         * @var string PROTOCOL://HOSTNAME:PORT ex: http://www.pichku.com:8087
         */
        public static $REQUEST_ORIGIN = "http://local.pichku.com";

        /**
         * @var string full url ex: http://www.pichku.com
         */
        public static $REQUEST_BASE = "http://local.pichku.com/web";

        /**
         * @var string protocol ex: http://local.pichku.com/
         */
        public static $REQUEST_REMOTE = "http://local.pichku.com/web";

        /**
         * @var string subdomain ex: www
         */
        public static $REQUEST_SUBDOMAIN = "local";

        /**
         * @var string subdomain ex: www
         */
        public static $REQUEST_DOMAIN = "pichku.com";

        /**
         * @var string protocol ex: /cleanurl/path
         */
        public static $REQUEST_PATHNAME = "/web/cleanurl/path";

        /**
         * @var string protocol ex: path
         */
        public static $REQUEST_FILENAME = "path";

        /**
         * @var string protocol ex: /cleanurl
         */
        public static $REQUEST_DIRNAME = " /web/cleanurl";

        /**
         * @var string protocol ex:
         */
        public static $REQUEST_QUERY = "id=78";

        /**
         * @var string protocol ex:
         */
        public static $REQUEST_FILE_EXT;

        public static function configure()
        {

            self::$SCRIPT = file::clean($_SERVER ['SCRIPT_NAME']);
            self::$SCRIPT_FILE = file::clean($_SERVER ['SCRIPT_FILENAME']);

            self::$DOC_BASE = file::clean(dirname(self::$SCRIPT_FILE));; // Absolute path to your installation, ex: /var/www/mywebsite
            self::$DOC_ROOT = str_replace(self::$SCRIPT, '', self::$SCRIPT_FILE); // ex: /var/www
            self::$DOC_BASE_DIR = str_replace(self::$DOC_ROOT, '', self::$DOC_BASE); // ex: '' or '/mywebsite'
            self::$PROTOCOL = empty ($_SERVER ['HTTPS']) ? 'http' : 'https';
            self::$PORT = $_SERVER ['SERVER_PORT'];

            self::$DISP_PORT = (self::$PROTOCOL == 'http' && self::$PORT == 80 || self::$PROTOCOL == 'https' && self::$PORT == 443) ? '' : ":" . self::$PORT;


            self::$REQUEST_HOSTNAME = $_SERVER ['SERVER_NAME'];

            self::$REQUEST_HOST = self::$REQUEST_HOSTNAME . ":" . self::$PORT;

            self::$REQUEST_ORIGIN = self::$PROTOCOL . "://" . self::$REQUEST_HOSTNAME . self::$DISP_PORT;

            self::$REQUEST_BASE = self::$PROTOCOL . "://" . self::$REQUEST_HOSTNAME . self::$DISP_PORT . self::$DOC_BASE_DIR;

            $subdomains = explode(".", $_SERVER['HTTP_HOST']);

            self::$REQUEST_SUBDOMAIN = count($subdomains) == 3 ? array_shift($subdomains) : "";
            self::$REQUEST_DOMAIN = implode(".", $subdomains);

            if (array_key_exists('REQUEST_SCHEME', $_SERVER)) {
                self::$REQUEST_REMOTE = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] .
                    dirname($_SERVER["SCRIPT_NAME"]);
            } else {
                self::$REQUEST_REMOTE = "http://" . $_SERVER["HTTP_HOST"];
            }
            self::$REQUEST_REMOTE = str_replace('\\', "/", self::$REQUEST_REMOTE);

            $pathinfo = pathinfo($_SERVER ["REQUEST_URI"]);
            $parsedInfo = parse_url($_SERVER ["REQUEST_URI"]);

            //print_r($pathinfo);
            //print_r($parsedInfo);

            self::$REQUEST_PATHNAME = $parsedInfo['path'];
            self::$REQUEST_DIRNAME = $pathinfo['dirname'];
            self::$REQUEST_QUERY = isset($parsedInfo['query']) ? $parsedInfo['query'] : "";
            self::$REQUEST_FILE_EXT = isset($pathinfo['extension']) ? $pathinfo['extension'] : "";
            self::$REQUEST_FILENAME = str_replace("?" . self::$REQUEST_QUERY, "", $pathinfo['basename']);
            self::$REQUEST_FILE_EXT = str_replace("?" . self::$REQUEST_QUERY, "", self::$REQUEST_FILE_EXT);
        }


        static function print_all($prefix = "")
        {
            $class = new \ReflectionClass(get_called_class());
            $arr = $class->getStaticProperties();
            foreach ($arr as $key => $value) {
                $fullKey = strtoupper($prefix . $key);
                printf("\n%s  ==  %s\n", $fullKey, $value);
            }
        }
    }


    project::configure();
}
