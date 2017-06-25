<?php
/**
 * Created by IntelliJ IDEA.
 * User: LT
 * Date: 25/06/17
 * Time: 3:40 AM
 */

namespace bootphp {

    class cookie
    {
        static function remove($key, $context = "/")
        {
            if (isset ($_COOKIE [$key])) {
                unset ($_COOKIE [$key]);
                setcookie($key, null, -1, $context);
                return true;
            } else {
                return false;
            }
        }

    }
}

