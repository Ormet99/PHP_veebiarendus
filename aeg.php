<?php
function year(){
    for($i = 1920; $i < date('Y'); $i++){
        echo "<option value=$i>$i</option>";
    }
}
function kuu(){
    $months = array( 1 => 'Jaanuar', 'Veebruar', 'Märts', 'Aprill', 'Mai', 'Juuni', 'Juuli', 'August', 'September', 'Oktroober', 'November', 'Detsember' ); 
    foreach($months as $key => $month ){
        if ($key == date('m') )
            echo "<option value='$month' selected='selected'>$month</option>";
        else
            echo "<option value='$month'>$month</option>";
    }
}
function day(){
    $days = range(1,31);
    foreach($days as $day){
        if ($day == date('d') )
            printf('<option value="%d" selected="selected">%d</option>', $day, $day);
        else
            printf('<option value="%d">%d</option>', $day, $day);
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