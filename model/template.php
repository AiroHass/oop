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
    // Funktsioon mis kontrollib faili ning võtab selle kasutusele.
    function loadFile(){
        if(!is_dir(VIEWS_DIR)){
            echo "Kataloogi ".VIEWS_DIR.'ei ole leitud<br/>';
            exit;
        }
        $f = $this->file;
        if(file_exists($f) and is_file($f) and is_readable($f)){
            $this->readFile($f);
        }
        $f=VIEWS_DIR.$this->file;
        if(file_exists($f) and is_file($f) and is_readable($f)){
            $this->readFile($f);
        }
        $f=VIEWS_DIR.$this->file.'.html';
        if(file_exists($f) and is_file($f) and is_readable($f)){
            $this->readFile($f);
        }
        $f=VIEWS_DIR.str_replace(".","/",$this->file).'.html';
        if(file_exists($f) and is_file($f) and is_readable($f)){
            $this->readFile($f);
        }
        if($this->content===false){
            echo 'Ei suutnud faili lugeda - '.$this->file.'<br/>';
        }


    }
}