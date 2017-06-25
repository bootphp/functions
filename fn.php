<?php
/**
 * Created by IntelliJ IDEA.
 * User: LT
 * Date: 25/06/17
 * Time: 3:40 AM
 */

namespace bootphp {

    class fn
    {
        static function println()
        {
            foreach (func_get_args() as $ar) {
                echo "\n" . $ar;
            }
        }

        static function printjs($str)
        {
            echo "\n/*  ";
            foreach (func_get_args() as $ar) {
                echo "\n * " . $ar;
            }
            echo "\n */";
        }

        static function printbr($str)
        {
            $args = func_get_args();
            call_user_func_array('printf', $args);
            print "<br/>";
        }

    }
}

