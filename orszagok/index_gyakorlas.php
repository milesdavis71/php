<?php
reqest_omce("connect.php");
$sql = $result -> query($sql);
if (!$result) {
    die ("rossz");
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
<form action="#">
<select name="continent">
<?php
$sql = "SELECT * from orszagok";
if (isset($_GET[continent])) {
    $sql .= "WHERE foldreszkod=".$_GET['continent'];
}

$result = $connect -> query($sql);
while ($row = $connect -> fetch_assoc()) {
    echo "<td>{$row[okod]}</td>";
}

?>

</table>

</select>
</form>
    
</body>
</html>