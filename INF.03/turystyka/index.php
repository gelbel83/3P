<?php
    $mysqli = mysqli_connect("localhost", "root", "", "wyprawy");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta lang="pl" />
        <title>Biuro turystyczne</title>
        <link rel="stylesheet" href="styl.css" type="text/css" />
    </head>

    <body>
        <nav class="nawigacyjny">
            <ul>
                <li><a href="wczasy.html">Wczasy</a></li>
                <li><a href="wycieczki.html">Wycieczki</a></li>
                <li><a href="allinclusive.html">All inclusive</a></li>
            </ul>
        </nav>

        <main class="glowny">
            <aside class="boczny">
                <h3>Twój cel wyprawy</h3>
                <form action="" method="post">
                    <label for="miejsce_wycieczki">Miejsce wycieczki</label> <br />
                    <select name="miejsce_wycieczki">
                        <!--Skrypt 1-->
                        <?php
                            $zapytanie = "SELECT nazwa FROM miejsca ORDER BY nazwa ASC";
                            $wynik = mysqli_query($mysqli, $zapytanie);

                            while($rekord = mysqli_fetch_array($wynik)) 
                            {
                                echo "<option>" . $rekord['nazwa'] . "</option>";
                            }
                        ?>
                    </select>
                    <br />

                    <label for="ile_doroslych">Ile dorosłych?</label> <br /> 
                    <input type="number" name="ile_doroslych" /> <br />

                    <label for="ile_dzieci">Ile dzieci?</label> <br />
                    <input type="number" name="ile_dzieci" /> <br />

                    <label for="termin">Termin</label> <br />
                    <input type="date" name="termin" /> <br />

                    <button type="submit" name="symulacja_ceny">Symulacja ceny</button>
                </form>

                <h4>Koszt wycieczki</h4>
                <!--Skrypt 2-->
                <?php
                    if (isset($_POST['symulacja_ceny'])) 
                    {
                        $zapytanie = "SELECT cena FROM miejsca WHERE nazwa = '" . $_POST['miejsce_wycieczki'] . "';";
                        $wynik = mysqli_query($mysqli, $zapytanie);

                        while($rekord = mysqli_fetch_array($wynik)) 
                        {
                            $ile_doroslych = floatval($_POST['ile_doroslych']) ?? 0;
                            $ile_dzieci = floatval($_POST['ile_dzieci']) ?? 0;
                            $cena = floatval($rekord['cena']);
                            
                            $do_zaplaty = $cena * $ile_doroslych + ($cena / 2) * $ile_dzieci;
                            $termin = $_POST['termin'];

                            echo "<p>W dniu: " . $termin . "</p>";
                            echo "<p>" . $do_zaplaty . " złotych</p>";
                        }
                    }
                ?>
            </aside>

            <section class="sekcja">
                <h3>Wycieczki</h3>
                <!--Skrypt 3-->
                <?php
                    $zapytanie = "SELECT nazwa, cena, link_obraz FROM miejsca WHERE link_obraz LIKE '0%'";
                    $wynik = mysqli_query($mysqli, $zapytanie);

                    while($rekord = mysqli_fetch_array($wynik)) 
                    {
                        echo '<div class="wycieczka">';
                        echo '<img src="'. $rekord['link_obraz'] . '" alt="zdjęcie z wycieczki" />';
                        echo '<h2>' . $rekord['nazwa'] . '</h2>';
                        echo '<p>' . $rekord['cena'] . '</p>';
                        echo '</div>';
                    }

                    
                ?>
            </section>
        </main>

        <footer class="stopka">
            <p>Autor: Konrad Goliński</p>
        </footer>
    </body>
</html>

<?php
    mysqli_close($mysqli);
?>