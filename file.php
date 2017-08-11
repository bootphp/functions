<?php
/**
 * Created by IntelliJ IDEA.
 * User: LT
 * Date: 25/06/17
 * Time: 3:40 AM
 */

namespace bootphp {

    class file
    {
        public static function path($str)
        {
            return str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $str);
        }

        public static function clean($str)
        {
            return str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $str);
        }


        /**
         *
         * @param string $file_name
         * @return number
         */
        public static function is_remote($file_name = "")
        {
            return (strpos($file_name, '://') > 0 ? 1 : 0) && preg_match("#\.[a-zA-Z0-9]{1,4}$#", $file_name) ? 1 : 0;
        }

        /**
         *
         * @param unknown $str
         * @return string
         */
        public static function resolve_path($str)
        {
            $array = explode('/', $str);
            $domain = array_shift($array);
            $parents = array();
            foreach ($array as $dir) {
                switch ($dir) {
                    case '.' :
                        // Don't need to do anything here
                        break;
                    case '..' :
                        $popped = array_pop($parents);
                        if (empty ($popped)) {
                            // Its meaningful, cant afford to loose it
                            $parents [] = $dir;
                        } else if ($popped == "..") {
                            // Sorry, will have to put it back
                            $parents [] = $popped;
                            $parents [] = $dir;
                        }
                        break;
                    case "" :
                        // Some stupid guy didn't do his job :P
                        break;
                    default :
                        $parents [] = $dir;
                        break;
                }
            }
            return $domain . '/' . implode('/', $parents);
        }


        /**
         *
         * @param string $dirName
         * @param number $rights
         * @return boolean
         */
        public static function mkdir($dirName, $rights = 0777)
        {
            $dirs = explode('/', $dirName);
            $dir = "";
            foreach ($dirs as $part) {
                $dir .= $part . DIRECTORY_SEPARATOR;
                if (!is_dir($dir) && strlen($dir) > 0) {
                    if (!mkdir($dir, $rights)) {
                        return false;
                    }
                }
            }
            return true;
        }

        public static function check($filepath)
        {
            try {
                $isInFolder = preg_match("/^(.*)\/([^\/]+)$/", $filepath, $filepathMatches);
                if ($isInFolder) {
                    $folderName = $filepathMatches [1];
                    $fileName = $filepathMatches [2];
                    self::mkdir($folderName);
                }
            } catch (Exception $e) {
                echo "ERR: error writing  to '$filepath', " . $e->getMessage();
            }
        }

        public static function write($filepath, $content)
        {
            self::check($filepath);
            return file_put_contents($filepath, $content);
        }

        public static function export_object($filename, $objet)
        {
            return self::write($filename, '<?php return ' . var_export($objet, true) . ';');
        }


        public static function recursive_list_all($folder, $prefix = '')
        {

            // Add trailing slash
            $folder = (substr($folder, strlen($folder) - 1, 1) == '/') ? $folder : $folder . '/';

            $return = array();

            foreach (self::list_all($folder) as $file) {
                if (is_dir($folder . $file)) {
                    $return = array_merge($return, self::recursive_list_all($folder . $file, $prefix . $file . '/'));
                } else {
                    $return [] = $prefix . $file;
                }
            }
            return $return;
        }

        public static function list_all($folder, $ignore = array())
        {
            $ignore [] = '.';
            $ignore [] = '..';
            $ignore [] = '.DS_Store';
            $return = array();

            foreach (scandir($folder) as $file) {
                if (!in_array($file, $ignore)) {
                    $return [] = $file;
                }
            }

            return $return;
        }


        public static function write_ini($assoc_arr, $path, $has_sections = FALSE)
        {
            $content = "";
            if ($has_sections) {
                foreach ($assoc_arr as $key => $elem) {
                    $content .= "[" . $key . "]\n";
                    foreach ($elem as $key2 => $elem2) {
                        if (is_array($elem2)) {
                            for ($i = 0; $i < count($elem2); $i++) {
                                $content .= $key2 . "[] = " . $elem2 [$i] . "\n";
                            }
                        } else if ($elem2 == "")
                            $content .= $key2 . " = \n";
                        else
                            $content .= $key2 . " = " . $elem2 . "\n";
                    }
                }
            } else {
                foreach ($assoc_arr as $key => $elem) {
                    if (is_array($elem)) {
                        for ($i = 0; $i < count($elem); $i++) {
                            $content .= $key . "[] = \"" . $elem [$i] . "\"\n";
                        }
                    } else if ($elem == "")
                        $content .= $key . " = \n";
                    else
                        $content .= $key . " = \"" . $elem . "\"\n";
                }
            }

            if (!$handle = fopen($path, 'w')) {
                return false;
            }

            $success = fwrite($handle, $content);
            fclose($handle);
            return $success;
        }

    }
}

