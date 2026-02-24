<!DOCTYPE html>
<?php
    setcookie("ciasteczko" ,"ciacho" ,time()+7200);
?>       
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <section id="ban1">
            <img src="zad5.png" alt="logo lotnisko">
        </section>
        <section id="ban2">
            <h1>Przyloty</h1>
        </section>
        <section id="ban3">
            <h3>przydatne linki</h3>
            <a href="kwerendy.txt" target="_blank">Pobierz...</a>
        </section>
    </header>
    <main>
        <table>
            <tr>
                <th>czas</th>
                <th>kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
            <?php
                $connect = mysqli_connect('localhost', 'root', '', 'egzamin');

                $zap1 = 'SELECT `czas`, `kierunek`, `nr_rejsu` ,`status_lotu` FROM `przyloty` ORDER BY `przyloty`.`czas` ASC;';

                $query1 = mysqli_query($connect, $zap1);

                while ($row = mysqli_fetch_row($query1)) {
                    echo "<tr>";
                    echo "<td>". $row[0] ."</td>";
                    echo "<td>". $row[1] ."</td>";
                    echo "<td>". $row[2] ."</td>";
                    echo "<td>". $row[3] ."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </main>
    <footer>
        <section id="stopa1">
            <?php
                if(isset($_COOKIE["ciasteczko"])) {
                    echo "<p><i>Witaj ponownie na stronie lotniska</i></p>";
                }
                else{
                    echo "<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>";
                }
                mysqli_close($connect);
            ?>
        </section>
        <section id="stopa2">
            Autor: Szymon Hofman
        </section>
    </footer>
</body>
</html>