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
                    <label for="miejsce_wycieczki">Miejsce wycieczk</label>
                    <select name="miejsce_wycieczki">
                        <!--Skrypt 1-->
                        <?php
                            $sql = "SELECT nazwa FROM miejsca ORDER BY nazwa ASC";
                        ?>
                    </select>

                    <label for="ile_doroslych">Ile dorosłych?</label> <br /> 
                    <input type="number" name="ile_doroslych" /> <br />

                    <label for="ile_dzieci">Ile dzieci?</label> <br />
                    <input type="number" name="ile_dzieci" /> <br />

                    <label for="termin">Termin</label> <br />
                    <input type="date" name="termin" /> <br />

                    <button type="submit">Symulacja ceny</button>
                </form>

                <h4>Koszt wycieczki</h4>
                <!--Skrypt 2-->
            </aside>

            <section class="sekcja">
                <h3>Wycieczki</h3>
                <!--Skrypt 3-->
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