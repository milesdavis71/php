<?php
// kétdimenziós tömb, 
$users = array(
    array('Peter','Robert','','','vasvari'),
    array('jelszo','Balint','','','iskola')
);
// Üres inputú submitnál visszavisz az index.html-re
if (empty($_POST)){
    header("Location: index.html");
}
if (isset($_POST['user'])){
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    if (strlen($user) < 5 || strlen($pwd) < 5){
        die("Rövid");
    }
    $place = array_search($user, $users[0]);
    if ($users[0][$place] == $user && $users[1][$place] == $pwd){
        echo "<h1>Sikeresen beléptél!</h1>";
    } else {
        echo "<h1>Helytelen belépési adatok!</h1>";
    }
}