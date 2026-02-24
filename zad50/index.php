<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szkolenia i kursy</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>SZKOLENIA</h1>
    </header>
    
    <section id="main">
        <section id="lewy">
            <table>
                <tr>
                    <th>Kurs</th>
                    <th>Nazwa</th>
                    <th>Cena</th>
                </tr>
                <?php
                    $connect = mysqli_connect('localhost','root','','szkolenia');

                    $query1 = 'SELECT `kod`, `nazwa`, `cena` FROM `kursy` ORDER BY cena ASC;';

                    $result = mysqli_query($connect, $query1);
                    
                    while ($row = mysqli_fetch_row($result)) {
                        echo "<tr>";
                        echo "<td><img src='". $row[0] .".jpg' alt='kurs'> </td>";
                        echo "<td>". "$row[1]" ."</td>";
                        echo "<td>". "$row[2]" ."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </section>
        <section id="prawy">
            <h2>Zapisy na kursy</h2>

            <form action="POST" action="">
                <label for="imie">Imię</label><br>
                <input type="text" name="imie" id="imie"><br>
                <label for="nazw">Nazwisko</label><br>
                <input type="text" name="nazw" id="nazw"><br>
                <label for="wiek">Wiek</label><br>
                <input type="number" name="wiek" id="wiek"><br>
                <label for="selection">Rodzaj kursu</label><br>
                <select id="selection"><br>
                <?php
                    $query2 = 'SELECT `nazwa`  FROM `kursy`;';

                    $result = mysqli_query($connect, $query2);

                    while ($row = mysqli_fetch_row($result)) {
                        echo "<option value='". $row[0] ."'>". $row[0] ."</option>";
                    }
                ?>
                </select><br>
                <input type="submit" value="Dodaj dane">
            </form>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $imie = $_POST['imie'];
                    $nazw = $_POST['nazw'];
                    $wiek = $_POST['wiek'];
                    if ($imie != '' && $nazw != '' && $wiek != '') {

                        echo "<p>Dane uczestnika ". $imie,$nazw ." zostały dodane</p>";
                    } else {
                        echo "<p>Wprowadź wszystkie dane</p>";
                    }
                }
                mysqli_close($connect);
            ?>

        </section>
    </section>

    <footer>
        <p>Stronę wykonał: Szymon Hofman</p>
    </footer>
</body>
</html>