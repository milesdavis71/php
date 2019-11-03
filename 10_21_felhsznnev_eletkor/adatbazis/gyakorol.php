<?php
$host = "localhost";
$dbUser = "root";
$dbPwd = "";
$dbName = "torpetarna";

$connect = new mysqli($host, $dbUser, $dbPwd, $dbName);

if ($connect-> errno) {
    die("Hiba a csatlakozás során");
}

$connect -> set_charset('utf8');

$sql = "SELECT * FROM torpek";
$result = $connect -> query($sql);
if (!$result) {
    echo("hiba a lekérdezés során");
} else{
    //id    nev     klan    nem     suly    magassag
    echo $row['id'].", ";
    echo $row['nev'].", ";
    echo $row['klan'].", ";
    echo $row['nem'].", ";
    echo $row['suly'].", ";
    echo $row['magassag']."<br>";
    
}

