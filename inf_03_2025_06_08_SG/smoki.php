<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smoki</title>
    <link rel="stylesheet" href="styl.css">
    <script src=""></script>
</head>
<body>
    <header>
        <h2>Poznaj smoki!</h2>
    </header>
    <section id="blok">
        <nav>
            <section onclick="blok1()" id="blok1">
                Baza
            </section>
            <section onclick="blok2()" id="blok2">
                Opisy
            </section>
            <section onclick="blok3()" id="blok3">
                Galeria
            </section>
        </nav>
        <main>
            <section id="sekcja1">
                <h3>Baza Smoków</h3>
                <form method="POST">
                    <select name="select" id="select">
                        <?php
                            $connect = mysqli_connect('localhost', 'root', '', 'smoki');

                            $zap1 = 'SELECT DISTINCT(pochodzenie) FROM `smok` ORDER BY `smok`.`pochodzenie` ASC';

                            $query1 = mysqli_query($connect,$zap1);
                            
                            while ($row = mysqli_fetch_row($query1)) {
                                echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
                            }
                        ?>
                    </select>
                    <input type="submit" value="Szukaj">
                </form>
                <table>
                    <tr>
                        <th>Nazwa</th>
                        <th>Długość</th>
                        <th>Szerokość</th>
                    </tr>
                    <tr>
                        <?php
                            if ($_SERVER["REQUEST_METHOD"]=="POST") {
                                $kraj = $_POST['select'];
                                
                                $zap2 = 'SELECT `nazwa`, `dlugosc`, `szerokosc` FROM `smok` WHERE pochodzenie = "'. $kraj .'";';

                                $query2 = mysqli_query($connect,$zap2);
                                    
                                while ($row = mysqli_fetch_row($query2)) {
                                    echo '<tr>';
                                    echo '<td>'. $row[0].'</td>';
                                    echo '<td>'. $row[1].'</td>';
                                    echo '<td>'. $row[2].'</td>';
                                    echo '</td>';
                                }
                            }
                            mysqli_close($connect);
                        ?>
                    </tr>
                </table>
            </section>
            <section id="sekcja2">
                <h3>Opisy smoków</h3>
                <dl>
                    <dt>Smok czerwony</dt>
                    <dd>Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami. Posiada łuski cenne na rynkach wschodnich do wyrabiania lekarstw. Jest dziki i groźny.</dd>
                    <dt>Smok zielony</dt>
                    <dd>Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.</dd>
                    <dt>Smok niebieski</dt>
                    <dd>Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest natchnieniem dla najlepszych malarzy. Często im pozuje. Smok ten jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i nie lubi się przepracowywać.</dd>
                </dl>
            </section>
            <section id="sekcja3">
                <h3>Galeria</h3>
                <img src="smok1.JPG" alt="Smok czerwony">
                <img src="smok2.JPG" alt="Smok wielk">
                <img src="smok3.JPG" alt="Smok łaciaty">
            </section>
        </main>
    </section>
    <footer>
        <p>Stronę opracował: Szymon Hofman</p>
    </footer>
    <script>
        var sl1 = document.getElementById('sekcja1')
        var sl2 = document.getElementById('sekcja2')
        var sl3 = document.getElementById('sekcja3')

        var bl1 = document.getElementById('blok1')
        var bl2 = document.getElementById('blok2')
        var bl3 = document.getElementById('blok3')

        function blok1(){
            sl1.style.display = "block"
            bl1.style.backgroundColor = "MistyRose"

            sl2.style.display = "none"
            bl2.style.backgroundColor = "#FFAEA5"

            sl3.style.display = "none"
            bl3.style.backgroundColor = "#FFAEA5"
            console.log("b1");

        }
        function blok2(){
            sl1.style.display = "none"
            bl1.style.backgroundColor = "#FFAEA5"

            sl2.style.display = "block"
            bl2.style.backgroundColor = "MistyRose"

            sl3.style.display = "none"
            bl3.style.backgroundColor = "#FFAEA5"
            console.log("b2");
            
        }
        function blok3(){
            sl1.style.display = "none"
            bl1.style.backgroundColor = "#FFAEA5"

            sl2.style.display = "none"
            bl2.style.backgroundColor = "#FFAEA5"

            sl3.style.display = "block"
            bl3.style.backgroundColor = "MistyRose"
        }
    </script>
</body>
</html>