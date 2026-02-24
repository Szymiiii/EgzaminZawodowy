<?php
header('refresh: 10;');
?>
<!DOCTYPE html>
<html lang="PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <section id="header1">
            <h1>Ważenie pojazdów we Wrocławiu</h1>
        </section>
        <section id="header2">
            <img src="obraz1.png" alt="waga">
        </section>
    </header>
    <section id="kontener">
        <section id="lewy">
            <h2>Lokalizacje wag</h2>
            <ol>
                <?php
                    $connect = mysqli_connect('localhost', 'root','', 'wazenietirow');
                    $zap1 = 'SELECT `ulica` FROM `lokalizacje`;';
                    $query1 = mysqli_query($connect, $zap1);
                    while ($row1 = mysqli_fetch_row($query1)) {
                        echo "<li>ulica ". $row1[0] ."</li>";
                    }
                ?>
            </ol>
            <h2>Kontakt</h2>
            <a href="mailto:wazenie@wroclaw.pl">napisz</a>
        </section>
        <section id="srodek">
            <h2>Alerty</h2>
            <table>
                <tr>
                    <th>rejestracja</th>
                    <th>ulica</th>
                    <th>waga</th>
                    <th>dzień</th>
                    <th>czas</th>
                </tr>
                <?php
                    $zap2 = 'SELECT wagi.rejestracja, wagi.waga, wagi.dzien, wagi.czas, lokalizacje.ulica FROM `wagi` INNER JOIN lokalizacje ON lokalizacje.id = wagi.lokalizacje_id WHERE waga>5;';
                    $query2 = mysqli_query($connect, $zap2);
                    while ($row2 = mysqli_fetch_row($query2)) {
                        echo "<tr>";
                        echo "<td>". $row2[0] ."</td>";
                        echo "<td>". $row2[4] ."</td>";
                        echo "<td>". $row2[1] ."</td>";
                        echo "<td>". $row2[2] ."</td>";
                        echo "<td>". $row2[3] ."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <?php
                $zap3 = "INSERT INTO `wagi`(`lokalizacje_id`, `waga`, `rejestracja`, `dzien`, `czas`) VALUES ('5',FLOOR(1 + RAND() * (10 - 1 +1)) ,'DW12345',CURRENT_DATE,CURRENT_TIME)";
                $query3 = mysqli_query($connect, $zap3);
                
            ?>
        </section>
        <section id="prawy">
            <img src="obraz2.jpg" id="obraz2" alt="tir">
        </section>
    </section>
    <footer>
        <p>Stronę wykonał: Szymon Hofman</p>
    </footer>
</body>
</html>