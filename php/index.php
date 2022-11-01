<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Forma za unos</title>
    <!--JS vezan za ikonice-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="center">
        <h1>Unos zaposlenih</h1>
        <form autocomplete= "off" action="forma.php" method="post">
            <div class="txt_field">
                <p>Forma</p>
                <?php
                //--Upis ostalih podataka prilikom greske/input polja--//
                if(isset($_GET['jmbg']))
                {
                    $jmbg = $_GET['jmbg'];
                    echo'<br><input type="text" name="jmbg" id="jmbg" placeholder="Unesite JMBG" value="'.$jmbg.'"><br>';
                }
                else
                {
                    echo '<input type="text" name="jmbg" id="jmbg" placeholder="Unesite JMBG"><br>';
                }

                if(isset($_GET['ime']))
                {
                    $ime = $_GET['ime'];
                    echo'<br><input type="text" name="ime" id="ime" placeholder="Unesite ime" value="'.$ime.'"><br>';
                }
                else
                {
                    echo' <br><input type="text" name="ime" id="ime" placeholder="Unesite ime"><br>';
                }
                if(isset($_GET['prezime']))
                {
                    $prezime = $_GET['prezime'];
                    echo'<br><input type="text" name="prezime" id="prezime" placeholder="Unesite prezime" value="'.$prezime.'"><br>';
                }
                else
                {
                    echo' <br><input type="text" name="prezime" id="prezime" placeholder="Unesite prezime"><br>';
                }
                if(isset($_GET['email']))
                {
                    $email = $_GET['email'];
                    echo'<br><input type="text" name="email" id="email" placeholder="Unesite email" value="'.$email.'"><br>';
                }
                else
                {
                    echo' <br><input type="email" name="email" id="email" placeholder="Unesite email"><br>';
                }
                if(isset($_GET['sifra']))
                {
                    $sifra = $_GET['sifra'];
                    echo'<br><input type="text" name="sifra" id="sifra" placeholder="Unesite identifikacionu sifru" value="'.$sifra.'"><br>';
                }
                else
                {
                    echo' <br><input type="text" name="sifra" id="sifra" placeholder="Unesite identifikacionu sifru"><br>';
                }
                
            ?>
            <br>
            <p>Iskustvo</p>
            <!--Radio dugmadi-->
            <div class="container">
                <div class="radio-tile-group">
                    <div class="input-container">
                            <input type="radio" name="radio" value='Junior'>
                        <div class="radio-tile">
                            <!--https://ionic.io/ionicons-->
                            <!--Slicica za Junior -->
                            <ion-icon name="person-outline"></ion-icon>
                            <label for="junior">Junior</label>
                        </div>
                    </div>
                    <div class="input-container">
                            <input type="radio" name="radio" value='Senior'>
                        <div class="radio-tile">
                            <!--https://ionic.io/ionicons-->
                            <!--Slicica za Senior -->
                            <ion-icon name="person-add-outline"></ion-icon>
                            <label for="senior">Senior</label>
                        </div>
                    </div>
                </div>
            </div>
            <p>Saglasnost</p>
            <!--Checkbox dugme-->
            <div class="saglasnost">
                <input type="checkbox" name="saglasan">
                <label>Saglasan sam sa uslovima </label>
            </div>
            <br>
            <!--Dugme za unos-->
            <button type="submit" name='submit'>Snimi podatke</button>
                <?php
                if(!isset($_GET['submit']))
                {
                    exit();
                }
                else
                {
                    $submitcheck = $_GET['submit'];
                }
                    //--Validacione poruke u slucaju greske--//
                    if($submitcheck == "empty")
                    {
                        echo"<br><p>Sva polja moraju biti uneta</p>";
                        exit();
                    }
                    //--Provera formata Email-a--//
                    elseif($submitcheck == "invalidEmail")
                    {
                        echo"<br><p>Email forma nije validna</p>";
                        exit();
                    }
                    //--Provera formata JMBG-a--//
                    elseif($submitcheck == "jmbgNotNumber")
                    {
                        echo"<br><p>Losa forma JMBG-a</p>";
                        exit();
                    }
                    //--Provera formata imena--//
                    elseif($submitcheck == "notName")
                    {
                        echo"<br><p>Unesite ispravno napisano ime</p>";
                        exit();
                    }
                    //--Provera formata prezimena--//
                    elseif($submitcheck == "notSurname")
                    {
                        echo"<br><p>Unesite ispravno napisano prezime</p>";
                        exit();
                    }
                    //--Provera formata sifre--//
                    elseif($submitcheck == "invalidSifra")
                    {
                        echo"<br><p>Losa forma sifre</p>";
                        exit();
                    }
                    //--Provera same sifre--//
                    elseif($submitcheck == "PogresnaSifra")
                    {
                        echo"<br><p>Pogresna sifra</p>";
                        exit();
                    }
                    //--Provera unosa u bazu--//
                    elseif($submitcheck == "success")
                    {
                        echo"<br><p>Podaci su uneti u bazu</p>";
                        exit();
                    }
                    elseif($submitcheck == "failed")
                    {
                        echo"<br><p>Unesite novog korisnika</p>";
                        exit();
                    }
                ?>
            </div>
        </form>
    </div>
</body>
</html>