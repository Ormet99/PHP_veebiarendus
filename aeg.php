<?php

require_once 'DBconnect.php';

if(isset($_POST['reg'])){
    $eesnimi = $_POST['nimi'];
    $perenimi = $_POST['perenimi'];
    $kuu = $_POST['kuu'];
    $paev = $_POST['paev'];
    $aasta = $_POST['aasta'];
    $aeg = "$kuu/$paev/$aasta";
    $date = date('Y-m-d', strtotime($aeg));
    if($eesnimi != "" || $perenimi != ""){
        //CHECK IF USER EXISTS
        $query = $conn->prepare("SELECT * FROM users WHERE userNAME = :eesnimi AND userLASTNAME = :perenimi AND userAGE = :vanus");
        $query->execute(array(
            "eesnimi" =>  $eesnimi,
            "perenimi" => $perenimi,
            "vanus" => $date
        ));
        if ($query->rowCount() > 0){
            echo "Selline kasutaja on juba olemas";
        }else{
            //IF USER DOSEN'T EXIST, ADD NEW USER
            $adduser = $conn->prepare("INSERT INTO users(userNAME, userLASTNAME, userAGE)
            VALUES(:eesnimi, :perenimi, :vanus)");
            $adduser->execute(array(
                "eesnimi" =>  $eesnimi,
                "perenimi" => $perenimi,
                "vanus" => $date
            ));
            echo "Kasutaja on lisatud andmebaasi";
        }
    }else{
        echo "Kõik lahtrid peavad olema täidetud";
    }

}

function year(){
    for($i = 1920; $i < date('Y'); $i++){
        echo "<option value=$i>$i</option>";
    }
}
function kuu(){
    $months = array( 1 => 'Jaanuar', 'Veebruar', 'Märts', 'Aprill', 'Mai', 'Juuni', 'Juuli', 'August', 'September', 'Oktroober', 'November', 'Detsember' ); 
    foreach($months as $key => $month ){
        $i++;
        if ($key == date('m') )
            echo "<option value='$i' selected='selected'>$month</option>";
        else
            echo "<option value='$i'>$month</option>";
    }
}
function day(){
    $days = range(1,31);
    foreach($days as $day){
        if ($day == date('d') )
            echo "<option value='$day' selected='selected'>$day</option>";
        else
            echo "<option value='$day'>$day</option>";
    }
}
?>
<html>
<head>
    <title>Registreerimis Vorm</title>
    <style>
        .date {
            display: inline-block;
        }
    </style>
</head>
<body>
    <form action="?" method="post">
    Eesnimi <input type="text" name="nimi"><br>
    Perenimi <input type="text" name="perenimi"><br>
    <div class="date">
    <label for="aasta">Aasta</label><br>
    <select name="aasta">
        <?php
            year();
        ?>
    </select>
    </div>
    <div class="date">
    <label for="kuu">Kuu</label><br>
    <select name="kuu">
        <?php
            kuu();
        ?>
    </select>
    </div>
    <div class="date">
    <label for="paev">Päev</label><br>
    <select name="paev">
        <?php
            day();
        ?>
    </select>
    </div><br>
    <input type="submit" name="reg" value="Registreeri">
    </form>
</body>
</html>