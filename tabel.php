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
Class htmltabel extends tabel{
    var $taustavarv = '';

    public function __construct(array $pealkirjad, $taustavarv){
        parent::__consturct($pealkirjad);
        $this->settaustavarv($taustavarv);
    }

    public function settaustavar($taustavarv){
        $this->taustavarv = $taustavarv;
    }

    function prinditabel(){
        echo '<tabel border="1">';
        echo '<tr>';
        foreach ($this->pealkirjad as $pealkiri){
            echo '<th bgcolor="'.$this->taustavarv.'">'.$pealkiri.'</th>';
        }
        echo '</th>';
        foreach ($this->tabelisisu as $realNumber=>$reaAndmed){
            echo '<tr>';
            foreach ($reaAndmed as $reaElement){
                echo '<td bgcolor="'.$this->taustavarv.'">'.$reaElement.'</td>';
            }
            echo '</tr>';
        }
        echo '</tabel>';
    }
}