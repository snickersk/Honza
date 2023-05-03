<?php
$servername = "localhost";
$username = "Honza";
$password = "1234";
$dbname = "škola";
$pripojeni = mysqli_connect($servername, $username, $password, $dbname);

switch($_POST["seradit_tbl"]) {
    case "pcena":
        $sql = "SELECT * from knihy order by Cena desc";
        break;
    case "pautor":
        $sql = "SELECT * FROM knihy order by Autor asc";
        break;
    case "pjmena":
        $sql = "SELECT * from knihy order by Jméno asc";
        break;
    case "pisbn":
        $sql = "SELECT *FROM knihy order by ISBN desc";
        break;
    case "pstran":
        $sql = "SELECT * from knihy order by Počet_stran desc";
}
$vysledek = mysqli_query($pripojeni, $sql);
?>
<head>
    <link href="databaze.css" rel="stylesheet">
</head>
<html>
    <table>
        <tr>
            <th>Název knížky</th>
            <th>Spisovatel</th>
            <th>Cena</th>
            <th>ISBN</th>
            <th>Počet stránek</th>
        </tr>
    <?php
while ($tabulka = mysqli_fetch_assoc($vysledek)) {
    echo "<tr>";
    foreach ($tabulka as $value) {
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
mysqli_close($pripojeni);
?>
