<?php
    $id = mysqli_connect("localhost", "root", "", "biblioteka");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta lang="pl" />
        <meta charset="UTF-8" />
        <title>Biblioteka miejska</title>
        <link rel="stylesheet" href="styl.css" type="text/css" />
    </head>

    <body>
        <header class="naglowek">
            <!--Skrypt 1-->
            <?php
                for($i = 0;$i < 20;$i++) {
                    echo '<img src="obraz.png" />';
                }
            ?>
        </header>

        <section class="sekcja">
            <h2>Liryka</h2>
            <form method="post" action="">
                <select name="ksiazka_liryka">
                    <!--Skrypt 2-->
                    <?php
                        $ksiazki = mysqli_query($id, "SELECT id, tytul FROM ksiazka WHERE gatunek = 'liryka'");
                        while($ksiazka = mysqli_fetch_array($ksiazki)) {
                            echo '<option value="' . $ksiazka['id'] . '">' . $ksiazka['tytul'] . '</option>';
                        }
                    ?>
                </select>
                <button type="submit" name="rezerwuj_liryka">Rezerwuj</button>
            </form>
            <!--Skrypt 3-->
            <?php
                if(isset($_POST['rezerwuj_liryka']) && isset($_POST['ksiazka_liryka'])) {
                    $rezerwuj_liryka = $_POST['rezerwuj_liryka'];
                    $ksiazka_liryka = $_POST['ksiazka_liryka'];

                    $ksiazki = mysqli_query($id, "SELECT tytul FROM ksiazka WHERE id = $ksiazka_liryka");
                    while($ksiazka = mysqli_fetch_array($ksiazki)) {
                        echo 'Książka ' . $ksiazka['tytul'] . ' została zarezerwowana';
                    }

                    mysqli_query($id, "UPDATE ksiazka SET rezerwacja = rezerwacja + 1 WHERE id = $ksiazka_liryka");
                }
            ?>
        </section>

        <section class="sekcja">
            <h2>Epika</h2>
            <form method="post" action="">
                <select name="ksiazka_epika">
                    <!--Skrypt 2-->
                    <?php
                        $ksiazki = mysqli_query($id, "SELECT id, tytul FROM ksiazka WHERE gatunek = 'epika'");
                        while($ksiazka = mysqli_fetch_array($ksiazki)) {
                            echo '<option value="' . $ksiazka['id'] . '">' . $ksiazka['tytul'] . '</option>';
                        }
                    ?>
                </select>
                <button type="submit" name="rezerwuj_epika">Rezerwuj</button>
            </form>

            <!--Skrypt 3-->
            <?php
                if(isset($_POST['rezerwuj_epika']) && isset($_POST['ksiazka_epika'])) {
                    $rezerwuj_epika = $_POST['rezerwuj_epika'];
                    $ksiazka_epika = $_POST['ksiazka_epika'];

                    $ksiazki = mysqli_query($id, "SELECT tytul FROM ksiazka WHERE id = $ksiazka_epika");
                    while($ksiazka = mysqli_fetch_array($ksiazki)) {
                        echo 'Książka ' . $ksiazka['tytul'] . ' została zarezerwowana';
                    }

                    mysqli_query($id, "UPDATE ksiazka SET rezerwacja = rezerwacja + 1 WHERE id = $ksiazka_epika");
                }
            ?>
        </section>

        <section class="sekcja">
            <h2>Dramat</h2>
            <form method="post" action="">
                <select name="ksiazka_dramat">
                    <!--Skrypt 2-->
                    <?php
                        $ksiazki = mysqli_query($id, "SELECT id, tytul FROM ksiazka WHERE gatunek = 'dramat'");
                        while($ksiazka = mysqli_fetch_array($ksiazki)) {
                            echo '<option value="' . $ksiazka['id'] . '">' . $ksiazka['tytul'] . '</option>';
                        }
                    ?>
                </select>
                <button type="submit" name="rezerwuj_dramat">Rezerwuj</button>
            </form>

            <!--Skrypt 3-->
            <?php
                if(isset($_POST['rezerwuj_dramat']) && isset($_POST['ksiazka_dramat'])) {
                    $rezerwuj_dramat = $_POST['rezerwuj_dramat'];
                    $ksiazka_dramat = $_POST['ksiazka_dramat'];

                    $ksiazki = mysqli_query($id, "SELECT tytul FROM ksiazka WHERE id = $ksiazka_dramat");
                    while($ksiazka = mysqli_fetch_array($ksiazki)) {
                        echo 'Książka ' . $ksiazka['tytul'] . ' została zarezerwowana';
                    }

                    mysqli_query($id, "UPDATE ksiazka SET rezerwacja = rezerwacja + 1 WHERE id = $ksiazka_dramat");
                }
            ?>
        </section>

        <section class="sekcja">
            <h2>Zaległe książki</h2>
            <ul>
                <!--Skrypt 4-->
                <?php
                    $wynik = mysqli_query($id, " SELECT ksiazka.tytul, wypozyczenia.id_cz, wypozyczenia.data_odd FROM ksiazka JOIN wypozyczenia ON ksiazka.id = wypozyczenia.id_ks ORDER BY wypozyczenia.data_odd ASC LIMIT 15");
                    while($rzad = mysqli_fetch_array($wynik)) {
                        echo '<li>' . $rzad['tytul'] . ' ' . $rzad['id_cz'] . ' ' . $rzad['data_odd'] . '</li>';
                    }
                ?>
            </ul>
        </section>

        <footer class="stopka">
            <p>Autor: <strong>Konrad Goliński</strong></p>
        </footer>
    </body>
</html>

<?php
    mysqli_close($id);
?>