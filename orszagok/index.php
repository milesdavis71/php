<?php
    // a connect php-hez csatlakozási lehetőségek:
    // inculde, include_omce. require, require_once
// 1. adatbázishoz való csatlakozás
    // az utolsó a jó, mert szükséges, de csak egyszer
    // A -> jelentése: objetkum operátor, az adatbázis objektum területén 
    // az adatbázis eléréséhez a query metódust használja   
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
    <div class="container">
    <br>
    <h5 class="text-center"> Országok szűrése kontinens alapján</h5>
    <hr>
        <div class="form-group">
            <form action="#">
            <!-- select => formban dropdown lista, option (value) -> a listaelem értéke -->
                <div class="row">
                    <div class="col3">
                        <select class="form-control" name="continent" id="">
                            <?php
                            // 2. A kontinensek nevének beinjektálása a select listába
                            // a while-ban a result->fetch_array() megtölt egy eredménysort (visszaad egy tömböt) asszociatív (kulcs-érték pár) vagy numerikus tömbként, vagy mindkét módon.
                            // fetch -> utasításkód kiolvasás 
                            // $row -> ez egy tömb, ami a $row = $result -> fetch_array() metódusból
                            // jön. A $row „id adatbázis sorként” azonosítja a tömb értékét,
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
                    </div>
                    
                    <!-- a submit-ra történik meg a kontinens szűrés. -->
                    <div class="col-lg-auto">
                        <button type="submit" class="btn btn-primary">Szűrés</button>
                    </div>
                    <div class="col4">
                    <?php
                            echo "<p>".$result->num_rows." ország felel meg a keresésnek</p>";
                            ?>
                    </div>
                </div>
            </form>
        
        </div>
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
// 3. Az országok kiolvasása az adatbázisból és átadása a result-nak
    $sql = "SELECT * FROM orszagok";
    // az isset azt nézi, hogy a GET-tel jön-e be valami.
    // 
    // 
    if (isset($_GET['continent'])) {
        $sql .= " WHERE foldreszkod=".$_GET['continent'];
    }
    

    // kiovasott adatok átadása a result változónak
    $result = $connect -> query($sql);
    // Ha a result (boolean) üres, akkor false értéket ad vissza, az if-be viszont
    // csak akkor lehet belemenni, ha a feltétele true, ezért a false result értéket
    // meg kell fordítani. 
    //  
    if (!$result){
        die("Eredménytelen a lekérdezés!");
    }
    // var_dump($result);
    // Egy SQL táblának ez a szintaxisa: egyed/kapcsolat/tulajdonságok

// 4. Az adatbázisból kinyert adatok kiíratása a weboldalra egy
//booststrap ccs táblázatba.
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
</div>
</body>
</html>