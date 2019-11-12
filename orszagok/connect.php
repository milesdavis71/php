<?php
$host = "localhost";

$connect = new mysqli($host, "root", "", "orszagok", "3306");
// ellenőrizni, hogy csatlakoztunk-e
// errno: hibaüzenet száma
if ($connect -> errno){
    die("NEm sikerült csatlakozni az adatbázishoz!");
}

// Azt mondta, ezt vizsgán mindig megkérdezi!
// Sikeres beállításnál a set_charset true-val tér vissza
if (!$connect -> set_charset("utf8")) {
    echo "Nem sikerült beállítani a karakterkódolást";
}