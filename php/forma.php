<?php
    
    if(isset($_POST['submit']))
    {

        include_once 'funkcije.php';
        //--Zastita i smestanje podataka u promenjivu--//
        $jmbg=mysqli_real_escape_string($conn, $_POST['jmbg']);
        $ime=mysqli_real_escape_string($conn, $_POST['ime']);
        $prezime=mysqli_real_escape_string($conn, $_POST['prezime']);
        $email=mysqli_real_escape_string($conn, $_POST['email']);
        $sifra =mysqli_real_escape_string($conn,$_POST['sifra']);
        $ip=$_SERVER['REMOTE_ADDR'];
        $mac = exec('getmac');
        $mac = strtok($mac, ' ');

            //--Unos radio dugmeta i njihova provera--//
            if(isset($_POST["radio"]))
            {
                $iskustvo=$_POST["radio"];
            }
            //--Unos checkbox dugmeta i njegova provera--//
            if(isset($_POST["saglasan"]))
            {
                $saglasnost="Jeste";
            }
            else
            {
                $saglasnost="Nije";
            }
            //--Provera za unos podataka--//
            if(empty($jmbg) or empty($ime) or empty($prezime) or empty($email))
            {
                header("Location: index.php?submit=empty");
                exit();
            }
            else
            {
                //--Provera duzine JMBG-a--//
                if(strlen($jmbg)!=13)
                {
                    header("Location: index.php?submit=jmbgNotNumber&ime=$ime&prezime=$prezime&email=$email");
                    exit();
                }
                else
                {
                    //--Provera formata JMBG-a--//
                    if(!ctype_digit($jmbg))
                    {
                        header("Location: index.php?submit=jmbgNotNumber&ime=$ime&prezime=$prezime&email=$email");
                        exit();
                    }
                    else
                    {
                        //--Provera formata imena--//
                    if(!preg_match("/^[A-ZŽČĐĆŠ][a-zžčđšć]*$/u",$ime))
                        {
                            header("Location: index.php?submit=notName&jmbg=$jmbg&prezime=$prezime&email=$email");
                            exit();
                        }
                        else
                        {
                            //--Provera formata prezimena--//
                            if(!preg_match("/^[A-ZŽČĐĆŠ][a-zžčđšć]*$/u",$prezime))
                            {
                                header("Location: index.php?submit=notSurname&jmbg=$jmbg&ime=$ime&email=$email");
                                exit();
                            }
                            else
                            {
                                //--Provera formata Email-a--//
                                if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                                {
                                    header("Location: index.php?submit=invalidEmail&jmbg=$jmbg&ime=$ime&prezime=$prezime");
                                    exit();
                                }
                                //--Provera duzine sifre--//
                                else
                                {
                                    if(strlen($sifra)!=3)
                                    {
                                        header("Location: index.php?submit=invalidSifra&jmbg=$jmbg&ime=$ime&prezime=$prezime&email=$email");
                                        exit();
                                    }
                                    //--Provera formata sifre--//
                                    else
                                    {
                                        if(!ctype_digit($sifra))
                                        {
                                            header("Location: index.php?submit=invalidSifra&jmbg=$jmbg&ime=$ime&prezime=$prezime&email=$email");
                                            exit();
                                        }
                                        else
                                        {
                                            //--Validacija sifre--//
                                            $checkSifra ="SELECT * FROM permisija WHERE sifra='$sifra'";
                                            $rezult1= mysqli_query($conn,$checkSifra);
                                            $count1= mysqli_num_rows($rezult1);
                                            if($count1>0)
                                            {
                                                //--Validacija vec unetog korisnika po:jmbg-u i/ili emailu--//
                                                $checkJMBG = "SELECT * FROM korisnici WHERE jmbg='$jmbg' XOR email='$email'";
                                                $result = mysqli_query($conn, $checkJMBG);
                                                $count = mysqli_num_rows($result);
                                                if($count>0)
                                                {
                                                    header("Location: index.php?submit=failed");
                                                    if(mysqli_error($conn))
                                                    {
                                                        echo"<br><hr>Nije Uspelo";
                                                    }
                                                }
                                                else
                                                {
                                                    //--Unos podataka u bazu--//
                                                    $sql = "INSERT INTO korisnici (jmbg, ime, prezime, email, saglasnost, iskustvo, ip, mac) 
                                                    VALUES ('$jmbg','$ime','$prezime','$email','$saglasnost','$iskustvo', '$ip', '$mac')";
                                                    $result=mysqli_query($conn, $sql);
                                                    header("Location: index.php?submit=success");
                                                }
                                                //--Provera konekcije baze prilikom unosa--//
                                                if(mysqli_error($conn))
                                                {
                                                    echo"<br><hr>Nije uspelo povezivanje sa bazom";
                                                }
                                            }
                                            else
                                            {
                                                header("Location: index.php?submit=PogresnaSifra");
                                                
                                            }
                                        }
                                
                                    }
                                
                                }
                        
                            }
                        }
                    
                    }
                
                }
            }
    }
    else
    {
        header("Location: index.php?submit=failed");
    }
?>