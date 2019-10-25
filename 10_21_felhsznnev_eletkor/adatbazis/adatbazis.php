<?php
    // Az adatbázis eléréséhez használt változók.
    
    $host = "localhost";
    $dbUser = "root";
    $dbPwd = "";
    $dbName = "torpetarna";
    $dbPort = "3306";

    // Kapcsolódás az adatbázishoz
    $connect = new mysqli($host, $dbUser, $dbPwd, $dbName, $dbPort);

    // -> = „objektum operátor” a bal oldali metódussal elérni a jobb oldali objektumot.
    if($connect -> errno) {
        die("Hiba a csatlakozás során!");
    }

    // karakterkódolás beállítása
    $connect -> set_charset('utf8');

    // SQL parancs az adatbázisban lévő „torpek” tárna kiolvasására.
    $sql = "SELECT * FROM torpek";
    // kiovasott adatok átadása a result változónak
    $result = $connect -> query($sql);
    
    //var_dump($result);

    if(!$result){
        echo("Hiba a lekérdezés során!");
    } else {
        // a fetch_assoc egy asszociatív tömbbel tért vissza addig, amíg  => asszociatív => kulcs érték párok.
        while($row = $result -> fetch_assoc()){
            //id    nev     klan    nem     suly    magassag
            echo $row['id'].", ";
            echo $row['nev'].", ";
            echo $row['klan'].", ";
            echo $row['nem'].", ";
            echo $row['suly'].", ";
            echo $row['magassag']."<br>";
        }
    }

    $connect->close();
?>