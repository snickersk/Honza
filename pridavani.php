<?php
$servername = "localhost";
$username = "Honza";
$password = "1234";
$dbname = "škola";
$pripojeni = mysqli_connect($servername, $username, $password, $dbname);
    if (!$pripojeni) {
        die("Nepodařilo se připojit k databázi: " . mysqli_connect_error());
    }
    $knizka = $_POST["jmeno"];
    $autor = $_POST["autor"];
    $cena =$_POST["cena"];
    $isbn = $_POST["isbn"];
    $stranky = $_POST["stranky"];


    $sql = "INSERT INTO knihy (Jméno, Autor, Cena, ISBN, Počet_stran) VALUES($knizka, $autor, $cena, $isbn, $stranky)";


    if (mysqli_query($pripojeni, $sql) === TRUE) {
        echo "Vložení provedeno";
    } else {
        echo "Vložení neprovedeno";
    }
mysqli_close($pripojeni);
?>
