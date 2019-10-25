<?php

$host = "localhost";
$dbUser = "root";
$dbPwd = "";
$dbName = "torpetarna";

$connect = new mysqli($host, $dbUser, $dbPwd, $dbName);

if ($connect -> errno) {
    die("Kuckuc");
}

$connect -> set_charset('utf8');

$sql = "SELECT * FROM torpek";
$result = $connect -> query($sql);

if(!$result){
    echo("Hiba a lekérdezésben");
}else {
    while ($row = $result -> fetch_assoc()) {
        echo $row['id'].", ";
        echo $row['nev'].", ";
        echo $row['klan'].", ";
        echo $row['nem'].", ";
        echo $row['magassag']."<br>";
    }
}