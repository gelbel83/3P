<?php
   $id = mysqli_connect('localhost', 'root', '', 'gry') or die("Błąd połączenia");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta lang="pl" />
        <meta charset="UTF-8" />
        <title>Gry komputerowe</title>
        <link rel="stylesheet" href="styl.css" type="text/css" />
    </head>

    <body>
        <section class="naglowek">
            <h1>Ranking gier komputerowych</h1>
        </section>

        <section class="lewy">
            <h3>Top 5 gier w tym miesiącu</h3>
            <ul>
                <!--Skrypt 1-->
                <?php
                    $result = mysqli_query($id, 'SELECT nazwa, punkty FROM gry ORDER BY punkty DESC LIMIT 5');

                    while($gra = mysqli_fetch_array($result)) {
                        echo '<li>' . $gra['nazwa'] . ' <span class="punkty">' . $gra['punkty'] . '</span></li>';
                    }
                ?>
            </ul>

            <h3>Nasz sklep</h3>
            <a href="http://sklep.gry.pl">Tu kupisz gry</a>
            <h3>Stronę wykonał</h3>
            <p>Konrad Goliński</p>
        </section>

        <section class="srodkowy">
            <!--Skrypt 2-->
            <?php
                $result = mysqli_query($id, 'SELECT id, nazwa, zdjecie FROM gry;');
                
                while($gra = mysqli_fetch_array($result)) {
                    echo '<figure>';
                    echo '<img src="' . $gra['zdjecie'] . '" alt="' . $gra['nazwa'] . '" title="' . $gra['id'] . '"/>';
                    echo '<figcaption>' . $gra['nazwa'] . '</figcaption>';
                    echo '</figure>';
                }
                echo '';
            ?>
        </section>

        <section class="prawy">
            <h3>Dodaj nową grę</h3>
            <form action="" method="post">
                <label for="nazwa">nazwa</label> <br />
                <input name="nazwa" />

                <br />

                <label for="opis">opis</label> <br />
                <input name="opis" />

                <br />

                <label for="cena">cena</label> <br />
                <input name="cena"/>

                <br />

                <label name="zdjecie">zdjęcie</label> <br />
                <input name="zdjecie" />

                <br />

                <input type="submit" value="DODAJ" />
            </form>

            <?php
                if (!empty($_POST['nazwa'])) {
                    $nazwa = $_POST['nazwa'];
                    $opis = !empty($_POST['opis']) ? $_POST['opis'] : 'brak opisu';
                    $cena = !empty($_POST['cena']) ? $_POST['cena'] : 0;
                    $zdjecie = !empty($_POST['zdjecie']) ? $_POST['zdjecie'] : 'brak.jpg';
                    $punkty = 0;
                }

                mysqli_query($id, 'INSERT INTO gry(nazwa, opis, punkty, cena, zdjecie) VALUES ("' . $nazwa . '", "' . $opis . '", ' . $punkty . ', ' . $cena . ', "' . $zdjecie . '")');
            ?>
        </section>

        <section class="stopka">
            <form action="" method="post">
                <input name="id" /> 
                <input type="submit" value="Pokaż opis" />                
            </form>
            
            <!--Skrypt 3-->
            <?php
                if (isset($_POST['id'])) {
                    $result = mysqli_query($id, 'SELECT nazwa, left(opis, 100) as opis, punkty, cena FROM gry WHERE id = ' . $_POST['id']);

                    while ($gra = mysqli_fetch_array($result)) {
                        echo '<h2>' . $gra['nazwa'] . ', ' . $gra['punkty'] . ' punktów, ' . $gra['cena'] . 'zł</h2>';
                        echo '<p>' . $gra['opis'] . '</p>';
                    }
                }
            ?>
        </section>
    </body>
</html>

<?php
    mysqli_close($id);
?>