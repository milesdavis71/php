<?php
if (!($_SERVER['REQUEST_METHOD']== "POST")) {
    die("Töltsd ki mindkét mezőt");
}
if (empty($_POST["firstname"]) || empty($_POST["age"])) {
    echo("Mindkét mezőt ki kell tölteni");
}
else {
    echo("Keresztneved: ".$_POST["firstname"]."<br>");
    echo("Életkorod: ".$_POST["age"]);
}