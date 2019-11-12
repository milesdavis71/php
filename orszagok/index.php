<?php
    // a connect php-hez csatlakozási lehetőségek:
    // inculde, include_omce. require, require_once
    // az utolsó a jó, mert szükséges, de csak egyszer
    require_once('connect.php');
    $sql = "SELECT * FROM foldreszek";
    $result = $connect -> query($sql);
    if (!$result){
        die("Hiba a lekérdezésben!");

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Országok</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <form action="#">
    <!-- select => formban dropdown lista -->
        <select name="continent" id="">
            <?php
            while ($row = $result -> fetch_array()){
                echo '<option value="'.$row[0].'">'.$row[1].'</option>';
            }
            ?>
        </select>
        <input type ="submit" value="Szűrés">
    </form>
    <table class = "table table-striped">
        <thead class="table-dark"> 
        <tr>
            <th scope="col">Sorszám</th>
            <th scope="col">Ország</th>
            <th scope="col">Főváros</th>
            <th scope="col"> Népesség</th>

        </tr>
        </thead>
    <?php
    $sql = "SELECT * FROM orszagok";
    if (isset($GET['continent'])) {
        $sql .= " WHERE folrdeszkod=".$GET['continent'];
    }
    

    $connect ->query($sql);
    $result = $connect -> query($sql);
    if (!$result){
        die("Eredménytelen a lekérdezés!");
    }
    echo $result->num_rows." ország felel meg a keresésnek";
    // var_dump($result);
    // egyed/kapcsolat/tulajdonságok

    while ($row = $result -> fetch_assoc()) {
        // echo "".$row['okod']." ".$row['onev']." ".$row["fovaros"]." ".$row['nepesseg']."<br>";
        echo "<tr>";
        echo "<td> {$row['okod']} </td>";
        echo "<td> {$row['onev']} </td>";
        echo "<td> {$row['fovaros']} </td>";
        echo "<td> {$row['nepesseg']} </td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>