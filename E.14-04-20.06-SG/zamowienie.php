<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Ozdoby – sklep</h1>
    </header>
    <section id="blok">
        <section id="lewy">
            <h2>OZDOBY</h2>
            <a href="galeria.html">Galeria</a><br>
            <a href="zamowienie.php">Zamówienie</a>
        </section>
        <section id="srodek">
            <p>Dodaj użytkownika</p>
            <form method="POST">
                <label for="imie">Imię: </label>
                <input type="text" name="imie" id="imie"><br>
                <label for="nazwisko">Nazwisko: </label>
                <input type="text" name="nazwisko" id="nazwisko"><br>
                <label for="email">e-mail: </label>
                <input type="email" name="email" id="email"><br>
                <input type="submit" value="WYŚLIJ">
            </form>
            <?php
                $connect = mysqli_connect('localhost','root','','sklep1');
                
                if ($_SERVER["REQUEST_METHOD"]=="POST") {

                    $imie = $_POST['imie'];
                    $nazwisko = $_POST['nazwisko'];
                    $email = $_POST['email'];

                    $zap = "INSERT INTO zamowienia(imie, nazwisko, adres_email)VALUES ('".$imie."', '".$nazwisko."', '".$email."')";
                    echo $imie,$nazwisko,$email;
                    $query = mysqli_query($connect,$zap);

                    mysqli_close($connect);
                }

            ?>
        </section>
        <section id="prawy">
            <img src="animacja.gif">
        </section>
    </section>
    <footer>
        <h3>Autor strony: Szymon Hofman</h3>
    </footer>
</body>
</html>