<?php

/**
 * Description of Logs
 *
 * @author samirboulassel
 */
class Logs {

    private $file = '';

    public function __construct() {
        $this->file = fopen('logs.txt', 'a+');
    }

    public function ecrire_une_ligne($text) {
        $date = date("d-m-Y");
        $heure = date("H:i:s");
        fputs($this->file, $text . '[' . $date . ' ' . $heure . ']' . chr(10) . chr(13));
    }

    public static function creatlog($text) {
        $log = new Logs();
        $log->ecrire_une_ligne($text);
    }

    public function __destruct() {
        fclose($this->file);
    }

}
