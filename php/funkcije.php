<?php
$dbServername="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="dss";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
/*function mac()
{
    ob_start();
    system('ipconfig/all');
    $mycom=ob_get_contents();
    ob_clean();

    $findme="Physical";
    $pmac=strpos($mycom,$findme);
    $mac=substr($mycom,($pmac+36),17);
}*/
function prikazKorisnika($conn)
    {
        $upit="SELECT * FROM korisnici" ;
            $odg=mysqli_query($conn, $upit);
            if(mysqli_error($conn))
            {
                echo"greska<br>".mysqli_error($conn);
            }
            else
            {
                echo"<br>Broj zapisa: ".mysqli_num_rows($odg)."<br><br>";
                while($red=mysqli_fetch_array($odg, MYSQLI_ASSOC))
                {
                    echo "JMBG:".$red['jmbg']."<br>Ime:".$red['ime']."<br>Prezime:".$red['prezime']."<br>E-mail:".$red['email']."<br>Saglasnost:".$red['saglasnost']."<br>Iskustvo:".$red['iskustvo']."<br><br>";
                }
                
            }
    }
?>