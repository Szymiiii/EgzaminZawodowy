<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <section id="naglowek">
        <header id="h1">
            <h2>Nasze osiedle</h2>
        </header>
        <header id="h2">
            <?php
                $connect = mysqli_connect('localhost','root','','portal');
                $query = 'SELECT COUNT(id) FROM dane;';

                $wynik = mysqli_query($connect,$query);

                while ($row = mysqli_fetch_row($wynik)){
                    echo"<p>Liczba użytkowników portalu: " . $row[0]. "</p>";
                }
            ?>
        </header>
    </section>
    <section id="glowny">
        <section id="lewy">
            <h3>Logowanie</h3>
            <form method="post">
                <label for="login">login</label><br>
                <input type="text" name="login" id="login"><br>
                <label for="pass">hasło</label><br>
                <input type="password" name="pass" id="pass"><br>
                <input type="submit" value="Zaloguj">
            </form>
        </section>
        <section id="prawy">
            <h3>Wizytówka</h3>
            <section id="wizytowka">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $login = $_POST['login'];
                    $haslo = $_POST['pass'];
                    if ($login != NULL and $haslo != NULL) {
                        $query = 'SELECT `login` FROM `uzytkownicy` WHERE login = "' . $login . '";';
                        $wynik = mysqli_query($connect,$query);
                        $row = mysqli_fetch_row($wynik);
                        if ($row[0] == $login){
                            $query1 = 'SELECT `haslo` FROM `uzytkownicy` WHERE login = "' . $login . '";';
                            $wynik1 = mysqli_query($connect,$query1);
                            $row1 = mysqli_fetch_row($wynik1);
                            if ($row1[0] == sha1($haslo)) {
                                $query2 = 'SELECT uzytkownicy.login, dane.rok_urodz, dane.przyjaciol, dane.hobby, dane.zdjecie FROM `uzytkownicy` INNER JOIN dane ON uzytkownicy.id = dane.id WHERE uzytkownicy.login="'. $login .'";';
                                $wynik2 = mysqli_query($connect,$query2);
                                while ($row2 = mysqli_fetch_row($wynik2)){
                                    echo "<img src='". $row2[4]. "' alt='osoba'>";
                                    $wiek = 2025 - $row2[1];
                                    echo "<h4>".$login."(".$wiek.")</h4>";
                                    echo "<p>".$row2[3]."</p>";
                                    echo "<p>hobby: ".$row2[3]."</p>";
                                    echo "<h1><img src='icon-on.png' alt='serce'>".$row2[2]."</h1>";
                                }
                            }
                            else
                                echo "hasło nieprawidłowe";
                        }
                        else
                            echo "login nie istnieje";
                    }
                }
                mysqli_close($connect);
            ?>
                <a href="dane.html">
                    <button id="info">Więcej informacji</button>
                </a>
            </section>
        </section>
    </section>
    <footer>
        <p id="pfoot">Stronę wykonał: Szymon Hofman</p>
    </footer>
</body>
</html>