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

