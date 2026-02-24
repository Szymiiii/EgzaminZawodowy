<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firma Przewozowa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Firma przewozowa Półdarmo</h1>
    </header>
    <nav>
        <a href="kwerendy.txt">kwerenda1</a>
        <a href="kwerendy.txt">kwerenda2</a>
        <a href="kwerendy.txt">kwerenda3</a>
        <a href="kwerendy.txt">kwerenda4</a>
    </nav>
    <section id="main">
        <section id="lewy">
            <h2>Zadania do wykonania</h2>
            <table>
                <tr>
                    <th>Zadanie do wykonania</th>
                    <th>Data realizacji</th>
                    <th>Akcja</th>
                </tr>
            <?php
                $connect=mysqli_connect('localhost','root','','przewozy');
                $query = "SELECT `id_zadania`, `zadanie`, `data` FROM `zadania`;";
                $result = mysqli_query($connect,$query);
                if ($result) {
                    while ($row = mysqli_fetch_row($result))
                    {
                        echo "<tr>";
                        echo "<td>".$row[1]."</td>";
                        echo "<td>".$row[2]."</td>";
                        echo '<td><a href="usun.php?id='.$row[0].'">Usuń</a></td>';
                        echo "</tr>";
                    }
                }
            ?>
            </table>
            <form method="post">
                <label for="text">Zadanie do wykoniania:</label>
                <input type="text" name="text" id="text"><br>
                <label for="date">Data realizacji:</label>
                <input type="date" name="date" id="date">
                <input type="submit" value="Dodaj">
            </form>
        </section>
        <section id="prawy">
            <img src="auto1.png" alt="auto firmowe">
            <h3>Nasza specjalność</h3>
            <ol>
                <li>Przeprowadzki</li>
                <li>Przewóz mebli</li>
                <li>Przesyłki gabarytowe</li>
                <li>Wynajem pojazdów</li>
                <li>Zakupy towaró</li>
            </ol>
        </section>
    </section>
    <footer>
        <p>Stronę wykonał: Szymon Hofman</p>
    </footer>
</body>
</html>