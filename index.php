<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Projekt Pwa</title>
</head>

<body>
    <div class="wrapper">
        <header class="hedic">
            <nav class="navbar">
                <img src="images/Screenshot 2023-06-18 210642.png" class="slika" alt="">
                <ul>
                    <li class="prvili"><a href="#home">HOME</a></li>
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
                <h2>SPORT</h2>
                <hr>
            </div><br>
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

                $sql = "SELECT * FROM vijesti WHERE arhiva = 0 AND kategorija = 'SPORT'";
                $result = mysqli_query($conn, $sql);



                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<article class='art1'>
                        <img src='images/" . $row['slika'] . "' alt=''>
                        <p>" . $row['sadrzaj'] . "</p>
                        </article>";
                    }
                } else {
                    echo "Nema dostupnih vijesti.";
                }





                mysqli_close($conn);
                ?>
            </section>
            <div class="naslov">
                <h2>KULTURA</h2>
                <hr>
            </div><br>
            <section class=drugisec>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "projekt";


                $conn = mysqli_connect($servername, $username, $password, $dbname);
                if (!$conn) {
                    die("Neuspjelo povezivanje s bazom podataka: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM vijesti WHERE arhiva = 0 AND kategorija = 'KULTURA'";
                $result = mysqli_query($conn, $sql);



                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<article class='art1' >
                        <img src='images/" . $row['slika'] . "' alt=''>
                        <p>" . $row['sadrzaj'] . "</p>
                        </article>";
                    }
                } else {
                    echo "Nema dostupnih vijesti.";
                }


                ?>
            </section>
        </div>
        <footer class="fotic">
            <p>Copyright 2019 Morgenpost verlag GmBH</p>
        </footer>
    </div>
</body>

</html>