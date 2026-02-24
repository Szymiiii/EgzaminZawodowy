<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka miejska</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <?php
            $connect = mysqli_connect('localhost','root','','biblioteka');
            $i = 1;
            while ($i <=20) {
                echo '<img src="obraz.png" alt="ksiazki">';
                $i++;
            }
        ?>
    </header>
    <section id="glowny">
        <section id="s1">
            <h2>Liryka</h2>
            <form method="post">
                <select>
                        <?php
                            $query = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'Liryka';";
                            $result = mysqli_query($connect,$query);
                            if ($result) {
                                while ($row = mysqli_fetch_row($result))
                                {
                                    echo"<option value=".$row[0].">".$row[1]."</option>";
                                }
                            }
                        ?>                
                </select>
                <button name="rezerwujLiryka">Rezerwuj</button>
            </form>
        </section>
        <section id="s2">
            <h2>Epika</h2>
            <form method="post">
                <select>
                        <?php
                            $query = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'Epika';";
                            $result = mysqli_query($connect,$query);
                            if ($result) {
                                while ($row = mysqli_fetch_row($result))
                                {
                                    echo"<option value=".$row[0].">".$row[1]."</option>";
                                }
                            }
                        ?>
                </select>
                <button name="rezerwujEpika">Rezerwuj</button>
            </form>
        </section>
        <section id="s3">
            <h2>Dramat</h2>
            <form method="post">
                <select>
                    <?php
                        $query = "SELECT id, tytul FROM ksiazka WHERE gatunek = 'Dramat';";
                        $result = mysqli_query($connect,$query);
                        if ($result) {
                           while ($row = mysqli_fetch_row($result))
                            {
                                echo"<option value=".$row[0].">".$row[1]."</option>";
                            }
                        }
                    ?>                
                </select>
                <button name="rezerwujDramat">Rezerwuj</button>
            </form>
        </section>
        <section id="s4">
            <h2>Zaległe książki</h2>
            <ul>
            <?php
                $query = "SELECT ksiazka.tytul, wypozyczenia.id_cz ,wypozyczenia.data_odd FROM ksiazka INNER JOIN wypozyczenia ON ksiazka.id = wypozyczenia.id_ks LIMIT 15;";
                $result = mysqli_query($connect,$query);
                if ($result) {
                    while ($row = mysqli_fetch_row($result))
                    {
                        echo"<li>".$row[0]." ".$row[1]." ".$row[2]."</li>";
                    }
                }
                mysqli_close($connect);
            ?>
            </ul>
        </section>
    </section>
    <footer>
        <p><strong>Autor: Szymon Hofman</strong></p>
    </footer>
</body>
</html>