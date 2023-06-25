<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Kategorija</title>
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
            <div class="naslov">
                <?php

                if (isset($_GET['kategorija'])) {
                    $kategorija = $_GET['kategorija'];
                    echo "<h2>" . strtoupper($kategorija) . "</h2>";
                } else {
                    echo "<h2>Kategorija nije odabrana.</h2>";
                }
                ?>
                <hr>
            </div>
            <section class="prvisec">
                <?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "projekt";

                $conn = mysqli_connect($servername, $username, $password, $dbname);
                if (!$conn) {
                    die("Neuspjelo povezivanje s bazom podataka: " . mysqli_connect_error());
                }

                if (isset($kategorija)) {
                    $sql = "SELECT * FROM vijesti WHERE arhiva = 0 AND kategorija = '$kategorija'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<article class='art1'>";
                            echo "<img src='images/" . $row['slika'] . "' alt=''>";
                            echo "<p>" . $row['sadrzaj'] . "</p>";
                            echo "</article>";
                        }
                    } else {
                        echo "Nema dostupnih vijesti.";
                    }
                } else {
                    echo "Kategorija nije odabrana.";
                }

                mysqli_close($conn);
                ?>
            </section>
        </div>
        <footer class="fotic">
            <p>&copy; 2019 Morgenpost Verlag GmbH</p>
        </footer>
    </div>
</body>

</html>