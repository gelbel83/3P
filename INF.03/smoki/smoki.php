<?php
    $mysql = mysqli_connect("localhost", "root", "", "smoki");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta lang="pl" />
        <meta charset="UTF-8" />
        <title>Smoki</title>

        <link rel="stylesheet" href="styl.css" type="text/css" />
    </head>

    <body>
        <header class="naglowkowy">
            <h2>Poznaj smoki!</h2>
        </header>

        <nav class="nawigacyjny">
            <div class="blok1" id="blok1">Baza</div>
            <div class="blok2" id="blok2">Opisy</div>
            <div class="blok3" id="blok3">Galeria</div>
        </nav>

        <main class="glowny">
            <section class="sekcja1" id="sekcja1">
                <h3>Baza Smoków</h3>
                <form action="" method="post">
                    <select name="pochodzenie">
                        <!--Skrypt 1-->
                        <?php
                            $zapytanie  = "SELECT DISTINCT pochodzenie FROM smok ORDER BY pochodzenie ASC;";
                            $wynik = mysqli_query($mysql, $zapytanie);

                            while($wiersz = mysqli_fetch_array($wynik)) {
                                echo "<option>". $wiersz['pochodzenie'] . "</option>";
                            }
                        ?>
                    </select>
                    <button type="submit" name="szukaj">Szukaj</button>
                </form>

                <table>
                    <tr><th>Nazwa</th> <th>Długość</th> <th>Szerokość</th></tr>
                    <!--Skrypt 2-->
                    <?php
                        if(isset($_POST['szukaj']) && isset($_POST['pochodzenie'])) {
                            $zapytanie = "SELECT nazwa, dlugosc, szerokosc FROM smok WHERE pochodzenie = '" . $_POST['pochodzenie'] . "'";
                            $wynik = mysqli_query($mysql, $zapytanie); 

                            while($wiersz = mysqli_fetch_array($wynik)) {
                                echo "<tr><td>" . $wiersz['nazwa'] . "</td><td>" . $wiersz['dlugosc'] . "</td><td>" . $wiersz['szerokosc'] . "</td></tr>";
                            }
                        }
                    ?>
                </table>
            </section>

            <section class="sekcja2" id="sekcja2">
                <h3>Opisy smoków</h3>
                <dl>
                    <dt>Smok czerwony</dt>
                    <dd>Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami. Posiada łuski cenne na rynkach wschodnich do wyrabiania lekarstw. Jest dziki i groźny.</dd>

                    <dt>Smok zielony</dt>
                    <dd>Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.</dd>

                    <dt>Smok niebieski </dt>
                    <dd>Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest natchnieniem dla najlepszych malarzy. Często im pozuje. Smok ten jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i nie lubi się przepracowywać.</dd>
                </dl>
            </section>

            <section class="sekcja3" id="sekcja3">
                <h3>Galeria</h3>
                <img src="smok1.jpg" alt="Smok czerwony" />
                <img src="smok2.jpg" alt="Smok wielki" />
                <img src="smok3.jpg" alt="Skrzydlaty łaciaty" />
            </section>
        </main>

        <footer class="stopki">
            <p>Stronę opracował: Konrad Goliński</p>
        </footer>
    </body>

    <script>
        const bloki = [];
        const sekcje = [];

        for(let i = 0; i < 3;i++) {
            sekcje[i] = document.getElementById("sekcja" + (i + 1));
        }

        for(let i = 0; i < 3;i++) {
            bloki[i] = document.getElementById("blok" + (i + 1));
            bloki[i].addEventListener("click", (e) => {
                for(let i = 0;i < 3;i++){
                    if(bloki[i] == e.target){
                        bloki[i].style.backgroundColor = "mistyrose";
                        sekcje[i].style.display = "block";
                    }
                    else {
                        bloki[i].style.backgroundColor = "#FFAEA5";
                        sekcje[i].style.display = "none";
                    }
                }
            });
        }
    </script>
</html>

<?php
    mysqli_close($mysql);
?>