<?php
require_once('connect.php');
$sql = "SELECT * FROM foldreszek";
// A -> jelentése: objetkum operátor, az adatbázis objektum területén 
// az adatbázis eléréséhez a query metódust használja
$result = $connect -> query($sql);
if (!$result) {
    die("hiba");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orszagok</title>
</head>
<body>
    
    <form action="#">
    <select name="continent" id="">
    <?php
    while ($row = $result -> fetch_array()) {
        echo '<option value="'.><>'
    }
    ?>
    </select>
    </form>
</body>
</html>