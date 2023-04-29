<?
$servername = "localhost";
$username = "Honza";
$password = "1234";
$dbname = "škola";
$pripojeni = mysqli_connect($servername, $username, $password, $dbname);
    if (!$pripojeni) {
        die("Nepodařilo se připojit k databázi: " . mysqli_connect_error());
    }

    $jmeno = $_POST["jmeno"];
    $autor = $_POST["autor"];
    $cena = $_POST["cena"];
    $isbn = $_POST["isbn"];
    $stranky = $_POST["isbn"];

    isset($_POST["pridani"]) {
        $sql = "INSERT INTO knihy (Jméno, Autor, Cena, ISBN, Počet_stran)
                value ("$jmeno", "$autor", "$cena", "$isbn", "$stranky")";
    }

if (mysqli_query($pripojeni, $sql)) {
        echo "Data úspěšně uloženy do databáze";
    }

mysqli_close($pripojeni);
?>
