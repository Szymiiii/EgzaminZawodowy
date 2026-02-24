<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header>
        <h1>Forum wielbicieli psów</h1>
    </header>
    <section id="glowny">
        <section id="lewy">
            <img src="obraz.jpg" alt="foksterier">
        </section>
        <section id="prawy">
            <section id="Lprawy">
                <h2>Zapisz się</h2>
                <form method="POST">
                    <label for="login">login: </label>
                    <input type="text" name="login" id="login"><br>
                    <label for="haslo">hasło: </label>
                    <input type="password" name="haslo" id="haslo"><br>
                    <label for="haslo">powtórz hasło: </label>
                    <input type="password" name="haslo1" id="haslo1"><br>
                    <input type="submit" value="Zapisz">
                </form>
                    <?php
                        $connect = mysqli_connect('localhost','root','','psy');

                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            $login = $_POST['login'];
                            $haslo = $_POST['haslo'];
                            $haslo1 = $_POST['haslo1'];

                            if ($login == null || $haslo == null || $haslo1 == null) {
                                echo "<p>wypełnij wszystkie pola</p>";
                            }
                            else {
                                $zap = 'SELECT `login` FROM `uzytkownicy` where `login` ="'.$login.'";';
                                $query = mysqli_query($connect,$zap);
                                if (mysqli_num_rows($query) > 0) {
                                    echo "<p>login występuje w bazie danych, konto nie zostało dodane</p>";
                                }
                                elseif ($haslo != $haslo1) {
                                    echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
                                }
                                else {
                                $zaszyfr = sha1($haslo);
                                $zap1 = 'INSERT INTO `uzytkownicy`(`login`, `haslo`) VALUES ("'.$login.'","'.$zaszyfr.'");';
                                mysqli_query($connect,$zap1);
                                    echo "<p>Konto zostało dodane</p>";
                                }
                                
                            }
                        }
                        mysqli_close($connect);
                    ?>
            </section>
            <section id="Pprawy">
                <h2>Zapraszamy wszystkich</h2>
                <ol>
                    <li>właścicieli psów</li>
                    <li>weterynarzy</li>
                    <li>tych, co chcą kupić psa</li>
                    <li>tych, co lubią psy</li>
                </ol>
                <a href="regulamin.html">Przeczytaj regulamin forum</a>
            </section>
        </section>
    </section>
    <footer>
        Stronę wykonał: Szymon Hofman
    </footer>
</body>
</html>