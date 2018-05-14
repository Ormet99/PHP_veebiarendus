<?php

class tabel{
    var $tabelisisu = array();
    var $pealkirjad = array();
    var $veergudarv;

    public function __construct(array $pealkirjad){
        $this->pealkirjad = $pealkirjad;
        $this->veergudearv = count($pealkirjad);
    }
}