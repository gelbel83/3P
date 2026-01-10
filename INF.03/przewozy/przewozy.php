<?php
	// Baza danych przewozy2 ponieważ mysql się zepsuł i nie dawał ani dostępu do bazy przewozy ani jej usunąć
	$id = mysqli_connect("localhost", "root", "", "przewozy2");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Firma Przewozowa</title>
		<link rel="stylesheet" href="styles.css" type="text/css" />
	</head>

	<body>
		<header class="naglowek">
			<h1>Firma przewozowa Półdarmo</h1>
		</header>

		<nav class="nawigacja">
			<a href="kw1.png">kwerenda1</a>
			<a href="kw2.png">kwerenda2</a>
			<a href="kw3.png">kwerenda3</a>
			<a href="kw4.png">kwerenda4</a>
		</nav>

		<main class="glowny">
			<section class="lewy">
				<h2>Zadania do wykonania</h2>
				<table>
					<tr>
						<th>Zadanie do wykonania</th> <th>Data realizacji</th> <th>Akcja</th>
					</tr>
					<!--Skrypt 1-->
					<?php
						$zadania = mysqli_query($id, "SELECT id_zadania, zadanie, data FROM zadania;");

						while($zadanie = mysqli_fetch_array($zadania)) {
							echo "<tr>";
							echo '<td>' . $zadanie['zadanie'] . '</td><td>' . $zadanie['data'] . "</td><td><a href=przewozy.php?id_zadania={$zadanie['id_zadania']}>Usuń</a></td>";
							echo "</tr>";
						}
					?>
				</table>

				<form action="" method="post">
					<label>Zadanie do wykonania:</label>
					<input name="zadanie" type="text"/> <br />

					<label>Data realizacji:</label>
					<input name="data" type="date"/>

					<button type="submit" name="dodaj">Dodaj</button>
				</form>

				<?php
					if ($_GET['id_zadania']) {
						$id_zadania = $_GET['id_zadania'];
						mysqli_query($id, "DELETE FROM zadania WHERE id_zadania = $id_zadania");
						header("location: przewozy.php");
					}

					if (isset($_POST['dodaj'])) {
						$zadanie = $_POST['zadanie'];
						$data = $_POST['data'];
						mysqli_query($id, "INSERT INTO zadania (zadanie, data, osoba_id) values ('$zadanie', '$data', '1')");
						header("location: przewozy.php");
					}
				?>
			</section>

			<section class="prawy">
				<img src="auto.png" alt="auto firmowe" />
				<h3>Nasza specjalność</h3>
				<ul>
					<li>Przeprowadzki</li>
					<li>Przewóz mebli</li>
					<li>Przesyłki gabarytowe</li>
					<li>Wynajem pojazdów</li>
					<li>Zakupy towarów</li>
				</ul>
			</section>
		</main>

		<footer class="stopka">
			<p>Stronę wykonał: Konrad Goliński</p>
		</footer>
	</body>	
</html>

<?php
	mysqli_close($id);
?>