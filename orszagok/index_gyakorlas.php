<?php
request_once("connect.php");
$result = $connect -> query($sql);
if (!$result) 
    die ('NEm jött létre a kapcsolat');

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
        <input type="submit">Szűrés</input>
    </form>
    <table>
    <?php
    $sql = "SELECT * FROM orszagok";
    $request = $connect -> query($sql);
    while ($row = $result -> fetch_assoc()) {
        echo "<td>{$row['okod']}</td>";
        echo "<td>{$row['okod']}</td>";
        echo "<td>{$row['okod']}</td>";
        echo "<td>{$row['okod']}</td>";
    } 


    ?>
    
    </table>
 
</body>
</html>