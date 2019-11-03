<?php
$host = "localhost";
$dbUser = "root";
$dbPwd = "";
$dbName = "torpetarna";

$connect = new mysqli($host, $dbUser, $dbPwd, $dbName);
$sql = "SELECT * FROM torpek";
$result = $connect -> query($sql);
while ($row = $result -> fetch_array()) {
//id    nev     klan    nem     suly    magassag
    echo$row['id'].". ";
    echo$row['nev'].". ";
    echo$row['klan'].". ";
    echo$row['nem'].". ";
    echo$row['suly'].". ";
    echo$row['magassag']."<br>";
}