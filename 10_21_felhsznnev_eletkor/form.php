<?php
if (!($_SERVER['REQUEST_METHOD'] == "POST")) {
    die("Előbb az űrlapot töltsd ki!");
}

if (empty($_POST['firstname']) || empty($_POST['age'])){
    echo "Mindkét mezőt töltsd ki!";
} else {
    echo "Keresztneved: ".$_POST['firstname']."<br>";
    echo $_POST['age']." éves vagy.<br>";
}