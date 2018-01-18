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
    var $vars = array();

    /**
     * template constructor.
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file;
        $this->loadFile();
    } // tulevased väärtused



    //template klassi meetodid
    // Sisu lugemine
    function readFile($file) {
//        $fp = fopen($f, 'r');
//        $this -> content = fread($fp, filesize($f));
//        fclose($fp);
        $this-> content=file_get_contents($file);
    }
    // Funktsioon mis kontrollib faili ning võtab selle kasutusele.
    function loadFile(){
        if(!is_dir(VIEWS_DIR)){
            echo "Kataloogi ".VIEWS_DIR.'ei ole leitud<br/>';
            exit;
        }
        $file = $this->file;
        if(file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }
        $file=VIEWS_DIR.$this->file;
        if(file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }
        $file=VIEWS_DIR.$this->file.'.html';
        if(file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }
        $file=VIEWS_DIR.str_replace(".","/",$this->file).'.html';
        if(file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }
        if($this->content===false){
            echo 'Ei suutnud faili lugeda - '.$this->file.'<br/>';
        }


    }

}