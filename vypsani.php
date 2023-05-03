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
        $sql = "SELECT Jméno, Cena FROM knihy WHERE Cena <= $serazeni";
        break;
    case 2:
        $sql = "SELECT Jméno, Cena FROM knihy WHERE Cena >= $serazeni";
}

$vysledek = mysqli_query($pripojeni, $sql);

    if (!$vysledek) {
        die("Chyba při vykonávání dotazu: " . mysqli_connect_error($pripojeni));
    }
echo "<table>";
?>
<html>
    <tr>
        <th>Název knížky</th>
        <th>Cena</th>
    </tr>
</html>
<?php
    while ($radek = mysqli_fetch_assoc($vysledek)) {
        echo "<tr>";
        foreach ($radek as $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
mysqli_close($pripojeni);
?>
<head>
    <link href="databaze.css" rel="stylesheet">
</head>
