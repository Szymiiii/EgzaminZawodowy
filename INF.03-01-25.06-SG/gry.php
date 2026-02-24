<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>
    <section id="kontener">
        <section id="lewy">
            <h3>Top 5 gier w tym miesiącu</h3>
            <ul>
                <?php
                    $connect = mysqli_connect('localhost', 'root', '', 'gry');
                    $zap1 = "SELECT `nazwa`,`punkty` FROM `gry` ORDER BY `gry`.`punkty` DESC limit 5;";
                    $query1 = mysqli_query($connect,$zap1);
                    while ($row1 = mysqli_fetch_row($query1)) {
                        echo "<li>". $row1[0]." <span class='punkty'> ".$row1[1]."</span></li>";
                    }
                ?>
            </ul>
            <h3>Nasz sklep</h3>
            <a href="http://sklep.gry.pl">Tu kupisz gry</a>
            <h3>Stronę wykonał</h3>
            <p>Szymon Hofman</p>
        </section>
        <section id="srodkowy">
                <?php
                    $zap2 = "SELECT `id`, `nazwa`, `zdjecie` FROM `gry`;";
                    $query2 = mysqli_query($connect,$zap2);
                    while ($row2 = mysqli_fetch_row($query2)) {
                        echo "<section class='postacie'>";
                        echo '<img src="'. $row2[2] .'" alt="'. $row2[1] .'" title="'. $row2[0] .'">';
                        echo "<p>".$row2[1]."</p>";
                        echo "</section>";
                    }
                ?>
        </section>
        <section id="prawy">
            <h3>Dodaj nową grę</h3>
            <form action="gry.php" method="POST">
                <label for="nazwa">nazwa</label>
                <input type="text" name="nazwa" id="nazwa"><br>
                <label for="opis">opis</label>
                <input type="text" name="opis" id="opis"><br>
                <label for="cena">cena</label>
                <input type="text" name="cena" id="cena"><br>
                <label for="zdjecie">zdjęcie</label>
                <input type="text" name="zdjecie" id="zdjecie"><br>
                <input type="submit" name="form2" value="DODAJ">
            </form>
            <?php
                if (isset($_POST['form2'])) {
                    $nazwa = $_POST['nazwa'];
                    $opis = $_POST['opis'];
                    $cena = $_POST['cena'];
                    $zdjecie = $_POST['zdjecie'];

                    $zap4 = "INSERT INTO `gry`(`nazwa`, `opis`, `punkty`, `cena`, `zdjecie`) VALUES ('".$nazwa."','".$opis."','0','".$cena."','".$zdjecie."')";
                    mysqli_query($connect,$zap4);
                    header("location: gry.php");
                }
            ?>
        </section>
    </section>
    <footer>
        <form action="gry.php" method="POST">
            <input type="text" name="pokazopis" id="pokazopis">
            <input type="submit" name="form1" value="Pokaż opis">
        </form>
        <?php
            if (isset($_POST['form1'])) {
                $id = $_POST['pokazopis'];
                $zap3 = "SELECT `nazwa`, substring(`opis`,1,100), `punkty`, `cena`FROM `gry` WHERE id = ".$id.";";
                $query3 = mysqli_query($connect,$zap3);
                while ($row3 = mysqli_fetch_row($query3)) {
                    echo "<h2>".$row3[0]." ".$row3[2]."punktów ".$row3[3]."zł</h2>";
                    echo "<p>".$row3[1]."</p>";
                }
            }
            mysqli_close($connect);
        ?>
    </footer>
</body>
</html>