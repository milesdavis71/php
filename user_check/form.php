<?php
// Az állítás akkor igaz, hogy ha a POST kérés-ben NINCS POST adat, vagyis üres a tömb.
// (Nincs semmi az input mezőkben.)
if (!($_SERVER['REQUEST_METHOD'] == "POST")) {
    die("Előbb az űrlapot töltsd ki!");
}

// Külön vizsgálja az üres mezőket.
if (empty($_POST['firstname']) || empty($_POST['age'])){
    echo "Mindkét mezőt töltsd ki!";
// Ha mindkét mezőben van infó, akkor POST-tal kiíratja a bevittt adatokat.
} else {
    echo "Keresztneved: ".$_POST['firstname']."<br>";
    echo $_POST['age']." éves vagy.<br>";
}