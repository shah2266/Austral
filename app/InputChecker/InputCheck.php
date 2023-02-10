<?php

namespace App\InputChecker;

class InputCheck
{
    //String clean
	public static function cleanString($string){
        $str = str_replace(' ', ' ', trim(strip_tags(html_entity_decode($string, ENT_QUOTES, 'UTF-8')))); // Replaces all spaces with hyphens.
        $str = preg_replace('/[^A-Za-z0-9. \"\'\?,-]/', '', $str);
        // Replace sequences of spaces with hyphen
        $str = preg_replace('/  */', ' ', $str);
        //$tables = DB::select('SHOW TABLES'); // Get all tables name in db;
        //$str = strtok($str, " "); // return first word in a sentence
        return $str;
    }

    //String clean
	public static function clean($string){
        $str = str_replace(' ', ' ', trim(strip_tags(html_entity_decode($string, ENT_QUOTES, 'UTF-8')))); // Replaces all spaces with hyphens.
        $str = preg_replace('/[^A-Za-z0-9. \_\?,-]/', '', $str);
        // Replace sequences of spaces with hyphen
        $str = preg_replace('/  */', ' ', $str);
        //$tables = DB::select('SHOW TABLES'); // Get all tables name in db;
        //$str = strtok($str, " "); // return first word in a sentence
        return $str;
    }
    
}
