<?php
require_once("connect.php");
$sql = "SELECT * FROM foldreszek";
$_result = $connect -> query($sql);
if (!$result) {
    die ("Hiba a lekérdezésben");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Országok</title>
</head>
<body>
    <form action="#">
    <select name="continent">
    <?php
    while ($row = $result -> fetch_array()) {
        echo '<option value="'.$row[0].'">'.$row[1].'</option>';
    }
    ?>
    </select>
    </form>
    <?php
    $sql = "SELECT * FROM orszagok";
    if (isset($_GET["continent"]))
    $sql .= "WHERE foldreszkod=".$_GET['continent'];
    

    ?>
</body>
</html>