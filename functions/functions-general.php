<?
/**
 * File for general functions that are not WordPress related
 *
 * @author         Flurin Dürst
 * @version 	   1.4.1
 * @since 		   WPegg 0.14
 *
 */


/* GENERAL FUNCTIONS
/===================================================== */

	/* VARIABLES
	/------------------------*/
	$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	$loremipsum = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.';


    /* STRING SHORTENER
    /------------------------*/
    // shorten strings and append ...
    function wpegg_shorten($string,$length,$append="...") {
        $string = trim($string);
        if(strlen($string) > $length) {
            $string  = substr($string, 0, $length);
            $string .= $append;
        }
        return $string;
    }

    /* SANITIZER
    /------------------------*/
    function sanitize_output($buffer) {
    	$search = [
    		'/\>[^\S ]+/s',
    		'/[^\S ]+\</s',
    		'/(\s)+/s',
    	];
    	$replace = ['>', '<', '\\1'];
    	$buffer = preg_replace($search, $replace, $buffer);
    	return $buffer;
    }

    /* URL CHECK
    /------------------------*/
    // searches url by string
	// note: also consider basename() http://php.net/manual/de/function.basename.php
    function urlcontains($string) {
        if (strpos('http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'],$string) == true) {
            return true;
        }
    }
