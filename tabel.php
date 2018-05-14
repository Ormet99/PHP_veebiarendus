<?php

class tabel{
    var $tabelisisu = array();
    var $pealkirjad = array();
    var $veergudarv;

    public function __construct(array $pealkirjad){
        $this->pealkirjad = $pealkirjad;
        $this->veergudearv = count($pealkirjad);
    }

    function lisaRida($rida){
        if(count($rida) != $this->veergudearv){
            return false;
        }
        array_push($this->tabelisisu, $rida);
        return true;
    }

    function prinditabel(){
        echo '<pre>';
        foreach ($this->pealkirjad as $pealkiri){
            echo '<b>'.$pealkiri.'</b>'.' ';
        }
        echo "\n";
        foreach ($this->tabelisisu as $rida){
            foreach ($rida as $reaElement){
                echo $reaElement.' ';
            }
            echo "\n";
        }
        echo '</pre>';
    }
}