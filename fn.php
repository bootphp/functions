<?php
/**
 * Created by IntelliJ IDEA.
 * User: LT
 * Date: 25/06/17
 * Time: 3:40 AM
 */

namespace bootphp {

    /**
     * Class fn
     *
     * @package bootphp
     */
    class fn
    {
        /**
         * Prints one argument per line
         * @param $str
         */
        static function println($str)
        {
            foreach (func_get_args() as $ar) {
                echo "\n" . $ar;
            }
        }

        /**
         *  Prints one argument per line in javascript comments format
         *
         * @param $str
         */
        static function printjs($str)
        {
            echo "\n/*  ";
            foreach (func_get_args() as $ar) {
                echo "\n * " . $ar;
            }
            echo "\n */";
        }

        /**
         *  Prints one argument per line with html break
         *
         * @param $str
         */
        static function printbr($str)
        {
            foreach (func_get_args() as $ar) {
                echo "<br/>" . $ar;
            }
            print "<br/>";
        }

        /**
         *   Prints one argument per line with html comment format
         *
         * @param $str
         */
        static function printhtml($str)
        {
            foreach (func_get_args() as $ar) {
                echo "<!-- " . $ar." -->";
            }
        }

    }
}

