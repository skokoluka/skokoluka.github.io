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

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                
                <label for="korisnickoIme">Korisničko ime:</label>
                <input type="text" id="korisnickoIme" name="korisnickoIme" required>

                <label for="lozinka">Lozinka:</label>
                <input type="password" id="lozinka" name="lozinka" required>

                <button type="submit">Prijavi se</button>

                <div id="error-message"></div>

                <a href="registracija.php">Ako nemate račun kliknite ovdje</a>
            </form>

          
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "projekt";

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die("Neuspjelo povezivanje s bazom podataka: " . mysqli_connect_error());
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                $korisnickoIme = $_POST["korisnickoIme"];
                $lozinka = $_POST["lozinka"];


                $sql = "SELECT * FROM korisnik WHERE korisnicko_ime = '$korisnickoIme'";
                $rezultat = mysqli_query($conn, $sql);

                if ($rezultat) {
                    if (mysqli_num_rows($rezultat) == 1) {
                        $red = mysqli_fetch_assoc($rezultat);
                        $razina = $red["razina"];
                        $korisnickoIme = $red["korisnicko_ime"];
                        if($razina == 1)
                        {
                            $hashLozinka = $red["lozinka"];

                            if (password_verify($lozinka, $hashLozinka)) {
                                session_start();
                                $_SESSION["korisnik"] = $red["korisnicko_ime"];
                                $_SESSION["razina"] = $red["razina"];
    
                                header("Location: administrator2.php");
                                exit();
                            } else {
                                $greskaPoruka = "Neispravno korisničko ime ili lozinka.";
                            }
                        }
                        else{
                            echo  "$korisnickoIme nemate pristup administracijskoj stranici"; 
                        }
                        
                    } else {
                        $greskaPoruka = "Neispravno korisničko ime ili lozinka.";
                    }
                } else {
                    $greskaPoruka = "Greška prilikom provjere korisničkih podataka.";
                }
            }

            ?>



        </div>
        <footer class="fotic">
            <p>&copy; 2019 Morgenpost Verlag GmbH</p>
        </footer>

        <script>
                <?php if (isset($greskaPoruka)): ?>
                    var errorMessage = document.getElementById('error-message');
                    errorMessage.textContent = "<?php echo $greskaPoruka; ?>";
                <?php endif; ?>
        </script>

    </div>
</body>

</html>
