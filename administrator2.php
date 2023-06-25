<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Administrator</title>
</head>

<body>
    <div class="wrapper">
        <header class="hedic">
            <nav class="navbar">
                <img src="images/Screenshot 2023-06-18 210642.png" class="slika" alt="">
                <ul>
                    <li class="prvili"><a href="index.php">HOME</a></li>
                    <li><a href="unos.html">UNOS VIJESTI</a></li>
                    <li><a href="kategorija.php?kategorija=sport">SPORT</a></li>
                    <li><a href="kategorija.php?kategorija=kultura">KULTURA</a></li>
                    <li><a href="index.php">NEWS</a></li>
                    <li><a href="administrator.php">ADMINISTRATOR</a></li>
                </ul>
            </nav>
        </header>
        <div class="glavnidio">
            <h2>Administracijska stranica</h2>
            <hr>
            <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "projekt";

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die("Neuspjelo povezivanje s bazom podataka: " . mysqli_connect_error());
            }


            if (isset($_GET['obrisi'])) {
                $clanak_id = $_GET['obrisi'];


                $sql = "DELETE FROM vijesti WHERE id = $clanak_id";
                if (mysqli_query($conn, $sql)) {
                    echo "Članak uspješno obrisan.";
                } else {
                    echo "Greška prilikom brisanja članka: " . mysqli_error($conn);
                }
            }


            $sql = "SELECT * FROM vijesti";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='clanak'>";
                    echo "<h3>" . $row['naslov'] . "</h3>";
                    echo "<p>" . $row['sadrzaj'] . "</p>";
                    echo "<a href='administrator.php?obrisi=" . $row['id'] . "'>Obriši</a>";
                    echo "</div>";
                }
            } else {
                echo "Nema dostupnih vijesti.";
            }


            mysqli_close($conn);
            ?>

        </div>
        <footer class="fotic">
            <p>&copy; 2019 Morgenpost Verlag GmbH</p>
        </footer>
    </div>
</body>

</html>