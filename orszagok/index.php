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
    <!-- action="#" jelentése: default action, a default mindig a GET -->
    <form action="#">
    <!-- select => formban dropdown lista -->
        <select name="continent" id="">
            <?php
            // a while-ban a result->fetch_array() megtölt egy eredménysort (visszaad egy tömböt) asszociatív (kulcs-érték pár) vagy numerikus tömbként, vagy mindkét módon.
            // fetch -> utasításkód kiolvasás 
            // $row -> ez egy tömb, ami a $row = $result -> fetch_array() metódusból
            // jön. A $row id adatbázis sorként azonosítja a tömb értékét,
            // ezért „$row” a neve. Éppen ezért az adott „row”-ra kétféleképpen
            // lehet hivatkozni: vagy megadod a kapcsos zárójelen belül idézőjellel
            // a sor nevét, vagy megadod a sorszámát (1, 2, 3)
            // ez a while feltölti a select dropdown list-et a "continent" táblából
            // kiolvasott értékekkel. 
            while ($row = $result -> fetch_array()){
                echo '<option value="'.$row[0].'">'.$row[1].'</option>';
            }
            ?>
        </select>
        <!-- a submit-ra történik meg a kontinens szűrés. -->
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
    // az isset azt nézi, hogy a GET-tel jön-e be valami.
    // 
    // 
    if (isset($GET['continent'])) {
        $sql .= " WHERE folrdeszkod=".$GET['continent'];
    }
    

    $connect ->query($sql);
    // kiovasott adatok átadása a result változónak
    $result = $connect -> query($sql);
    // Ha a result (boolean) üres, akkor false értéket ad vissza, az if-be viszont
    // csak akkor lehet belemenni, ha a feltétele true, ezért a false result értéket
    // meg kell fordítani. 
    //  
    if (!$result){
        die("Eredménytelen a lekérdezés!");
    }
    echo $result->num_rows." ország felel meg a keresésnek";
    // var_dump($result);
    // Egy SQL táblának ez a szintaxisa: egyed/kapcsolat/tulajdonságok

    // Egy while ciklus kiszedi az "orszagok" táblából az adatokat a fetch_assoc-al.
     
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