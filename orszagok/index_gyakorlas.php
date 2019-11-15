<?php
require_once('connect.php');
$sql = 'SELECT * FROM foldreszek';
$result = $connect($sql);
if (!$result) {
    die ('hiba');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<select name="continent" id="">
<?php
?>
</select>

<table>
<?php
$sql = "SELECT * FROM orszagok";
if (isset($_GET['continent'])) {
    $sql .= "WHERE foldreszkod=". $_GET['continent'];
}
?>

</table>    
</body>
</html>