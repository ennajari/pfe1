<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            text-align: center;
            align-items: center;
            width: 50%;
            height: auto;
            margin-left: 20%;
            background-color: beige;
            background-image: url({{url("image/ad.png")}});;
        }
        body{
            background-color: cornsilk;
        }
        #uu{
            margin-bottom: 1%;
        }
    </style>
</head>
<body>
<h1 style="text-align: center;">Emploi de temps pour SMI S6 :</h1>
</body>
</html>
<?php

// Définition des variables
$jours = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi','Samudi');
$heures = array('t8_10', 't10_12', 't14_16', 't16_18');
$salles = DB::table('salles')->select('nom')->get()->map(function($salle) {
    return $salle->nom;
})->toArray();


// Affichage de l'emploi du temps
echo '<table border="1">';
echo '<tr><th>Time/jour</th>';
foreach ($jours as $jour) {
    echo "<th>$jour</th>";
}
echo '</tr>';
foreach ($heures as $heure) {
    echo '<tr>';
    echo "<th>$heure</th>";
    foreach ($jours as $jour) {
        $find = false;
        foreach ($desponibilites as $dispo) {
            if($dispo->jour == $jour && $dispo->$heure == 1 ){
                $find = true;
                echo "<td> $dispo->module <br> $dispo->semestre <br> $dispo->fillier <br> salle: " .$salles[array_rand($salles)] . " </td>";
            }
        }
        if(!$find)
            echo "<td> <br> <br> </td>";

    }
    echo '</tr>';
}
echo '</table>';
