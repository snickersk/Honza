<?php 
$servername = "localhost";
$username = "Honza";
$password = "1234";
$dbname = "škola";
$pripojeni = mysqli_connect($servername, $username, $password, $dbname);
    if (!$pripojeni) {
        die("Nepodařilo se připojit k databázi: " . mysqli_connect_error());
    }
    $submit = $_POST["vyhledat"];
    $porovnani = $_POST["porovnani"];
    $serazeni = $_POST["serazeni"];
    

switch($porovnani) {
    case 1:
        $sql = "SELECT Cena FROM knihy WHERE Cena <= $serazeni";
        break;
    case 2:
        $sql = "SELECT Cena FROM knihy WHERE Cena >= $serazeni";
}

$vysledek = mysqli_query($pripojeni, $sql);

    if (!$vysledek) {
        die("Chyba při vykonávání dotazu: " . mysqli_connect_error($pripojeni));
    }
    
    while ($row = mysqli_fetch_assoc($vysledek)) {
        echo $row["Cena"] . " Kč<br>";
    }
mysqli_close($pripojeni);
?>