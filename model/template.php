<?php
/**
 * Created by PhpStorm.
 * User: airo.hass
 * Date: 18.01.2018
 * Time: 10:21
 */

class template
{
    var $file = ''; // html vaate faili nimi
    var $content = false; // sisu deafultina pole, HTML faili sisu
    var $vars = array(); // tulevased väärtused
    //template klassi meetodid
    // Sisu lugemine
    function readFile($f) {
//        $fp = fopen($f, 'r');
//        $this -> content = fread($fp, filesize($f));
//        fclose($fp);
        $this-> content=file_get_contents($f);
    }
}