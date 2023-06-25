<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Projekt Pwa</title>


</head>

<body>
    <?php
    if (isset($_POST["spremi"])) {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "projekt";


        $dbc = mysqli_connect($servername, $username, $password, $dbname);
        if (!$dbc) {
            die("Connection failed: " . mysqli_connect_error());
        } else
            echo "Connected successfully";

        $autor = $_POST["autor"];
        $datum = $_POST["datum"];
        $naslov = $_POST["naslov"];
        $ksadrzaj = $_POST["kratki_sadrzaj"];
        $sadrzaj = $_POST["sadrzaj"];
        $slika = $_POST["slika"];
        $kategorija = $_POST["kategorija"];
        if (isset($_POST["arhiva"])) {
            $arhiva = 1;
        } else {
            $arhiva = 0;
        }


        $sql = "INSERT INTO vijesti (datum, naslov, kratki_sadrzaj, sadrzaj, slika, kategorija, arhiva) 
            VALUES ('$datum','$naslov', '$ksadrzaj', '$sadrzaj', '$slika', '$kategorija', $arhiva)";

        if (mysqli_query($dbc, $sql)) {
            echo "Vijest je uspješno pohranjena.";
        } else {
            echo "Greška pri pohrani vijesti: " . mysqli_error($dbc);
        }

        mysqli_close($dbc);


    }

    ?>




    <div class="obgrli">
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

            <section class="prvisec-skripta">


                <article id="art-skripta">
                    <h2 class="h2-skripta">
                        <?php echo $naslov ?>
                    </h2>
                    <p class="p1-skripta">
                        <?php echo $datum ?>
                    </p>
                    <?php echo "<img class='slika-skripta' src='images/$slika'" ?><br>

                    <p class="p2-skripta">
                        <?php echo $sadrzaj ?>
                    </p>
                </article>

            </section>

        </div>
        <footer class="fotic">
            <p>Copyright 2019 Morgenpost verlag GmBH</p>
        </footer>
    </div>
</body>

</html>