<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Forum miłośników psów</h1>
    </header>
    <section id="glowny">
        <section id="lewy">
            <img src="Avatar.png" alt="Użytkownik forum">
            <?php
                $connect = mysqli_connect('localhost','root','','forumpsy');

                $zap = "SELECT konta.nick,konta.postow,pytania.pytanie FROM konta INNER JOIN pytania ON konta.id = pytania.konta_id WHERE konta.id = 1;";

                $query = mysqli_query($connect,$zap);

                while ($row = mysqli_fetch_row($query)) {
                    echo "<h4>Użytkownik: ".$row[0]."</h4>";
                    echo "<p>".$row[1]." postów na forum</p>";
                    echo "<p>".$row[2]."</p>";
                }
            ?>
            <video src="video.mp4" controls loop></video>
        </section>
        <section id="prawy">
            <form action="index.php" method="POST">
                <textarea name="text" id="text" cols="40" rows="4"></textarea><br>
                <input type="submit" id="submit" value="Dodaj odpowiedź">
            </form>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $odp = $_POST['text'];
                    $zap2 = "INSERT INTO `odpowiedzi`(`Pytania_id`, `konta_id`, `odpowiedz`) VALUES ('1','5','".$odp."');";
                    mysqli_query($connect,$zap2);
                }
            ?>
            <h2>Odpowiedzi na pytanie</h2>
            <ol>            
                <?php
                    $zap3 = "SELECT odpowiedzi.id, odpowiedzi.odpowiedz , konta.nick FROM odpowiedzi INNER JOIN konta ON konta.id = odpowiedzi.konta_id WHERE odpowiedzi.Pytania_id = 1;";

                    $query3 = mysqli_query($connect,$zap3);

                    while ($row3 = mysqli_fetch_row($query3)) {
                        echo "<li>".$row3[1]." <i>". $row3[2]."</i></li>";
                        echo "<hr>";
                    }
                    mysqli_close($connect);
                ?>
            </ol>
        </section>
    </section>
    <footer>
        Autor: Szymon Hofman <a href="http://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a>
    </footer>
</body>
</html>