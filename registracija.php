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
            <form  method="post">
                <label for="korisnicko_ime">Korisničko ime:</label>
                <input type="text" id="korisnicko_ime" name="korisnicko_ime" required><br><br>

                <label for="ime">Ime:</label>
                <input type="text" id="ime" name="ime" required><br><br>

                <label for="prezime">Prezime:</label>
                <input type="text" id="prezime" name="prezime" required><br><br>

                <label for="lozinka1">Lozinka:</label>
                <input type="password" id="lozinka1" name="lozinka1" required><br><br>

                <label for="lozinka2">Potvrdi lozinku:</label>
                <input type="password" id="lozinka2" name="lozinka2" required><br><br>

                <input type="submit" name="registriraj" value="Registriraj se">

            </form>
        </div>
        <footer class="fotic">
            <p>Copyright 2019 Morgenpost verlag GmBH</p>
        </footer>
    </div>

    <?php


    if (isset($_POST['registriraj'])) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "projekt";


        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else
            echo "Connected successfully";



        $korisnicko_ime = $_POST['korisnicko_ime'];
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $lozinka1 = $_POST['lozinka1'];
        $lozinka2 = $_POST['lozinka2'];


        if ($lozinka1 === $lozinka2) {

            $hash_lozinke = password_hash($lozinka1, PASSWORD_DEFAULT);


            $query = "INSERT INTO korisnik (korisnicko_ime, ime, prezime, lozinka, razina) VALUES (?, ?, ?, ?, 0)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "ssss", $korisnicko_ime, $ime, $prezime, $hash_lozinke);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            echo "Registracija uspješna!";
        } else {
            echo "Lozinke se ne podudaraju!";
        }

        mysqli_close($conn);
    }
    ?>

</body>

</html>