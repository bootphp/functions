<?php
/**
 * Created by IntelliJ IDEA.
 * User: LT
 * Date: 25/06/17
 * Time: 3:40 AM
 */

namespace bootphp {

    class str
    {
        static function replace_first($search, $replace = "", $subject = "")
        {
            if (empty($search)) {
                return $subject;
            }
            $pos = strpos($subject, $search);
            if ($pos !== false) {
                $newstring = substr_replace($subject, $replace, $pos, strlen($search));
            }
            return $newstring;
        }

        static function starts_with($haystack, $needle)
        {
            $length = strlen($needle);
            return (substr($haystack, 0, $length) === $needle);
        }
    }
}

