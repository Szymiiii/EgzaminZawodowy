<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma szkoleniowa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id="kontener">
        <header>
            <img src="baner.jpg" alt="Szkolenia">
        </header>
        <section id="glowny">
            <menu>
                <ul>
                    <li><a href="index.html">Strona główna</a></li>
                    <li><a href="szkolenia.php">Szkolenia</a></li>
                </ul>
            </menu>
            <main>
                <?php
                    $connect = mysqli_connect('localhost', 'root', '', 'firma1');

                    $zap = "SELECT `Data`, `Temat` FROM `szkolenia` ORDER BY `szkolenia`.`Data` ASC";

                    $query = mysqli_query($connect, $zap);

                    $plik = fopen("harmonogram.txt","w");
                    while ($row = mysqli_fetch_row($query)) {
                        echo "<p>".$row[0]." ".$row[1]."</p>";
                        fwrite($plik,$row[0]." ".$row[1]. "\n");
                    }
                    mysqli_close($connect);
                ?>
            </main>
        </section>
        <footer>
            <h2>Firma szkoleniowa, ul. Główna 1, 23-456 Warszawa</h2>
            <p>Autor: Szymon Hofman</p>
        </footer>
    </section>
</body>
</html>