<?php
// a munkamenet változót a szervertől kapod.
// az unsettel csak bizonyos sessiont lehet törölni. Nézz utána!
session_start();
var_dump($_SESSION);
// a "REQUEST_METHOD" visszaadja, hogy a fomról való adatgyűjtéshez GET vagy POST van a klines oldalon.
// az isset($_GET['q'] => azt mondja meg, hogy a get-tel bejön-e bármilyen érték. 
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['q'])) {
    // A session destroy egy frissítés hatására törli a gettel bevitt összes adatot.
    session_destroy();
    // Ezt Geri írta, majd nézd meg.
    // header('Location: session.php');
}
if (isset($_SESSION['szam'])){
 
    $_SESSION['szam']++;

}else{
    $_SESSION['szam'] = 1;

}
echo "<br>";

var_dump($_SESSION);
echo "<a href=\"session.php?q=1\">Törlés</a>";
