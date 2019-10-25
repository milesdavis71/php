<?php

$host = "localhost";
$dbUser  = "root";
$dbPwd  = "";
$dbName  = "torpetarna";

$kapcsolat = new mysqli($host, $dbUser, $dbPwd, $dbName);

$kiolvas = "SELECT * FROM torpek";
$kiolvasottadatok = $kapcsolat -> query($kiolvas);
if (!$kiolvasottadatok) {
    echo("hiba");
} else {
    while ($row = $kiolvasottadatok -> fetch_assoc()) {
    //id    nev     klan    nem     suly    magassag
        echo $row['id'].", ";
        echo $row['nev'].", ";
        echo $row['klan'].", ";
        echo $row['nem'].", ";
        echo $row['suly'].", ";
        echo $row['magassag'].", ";
    }
}