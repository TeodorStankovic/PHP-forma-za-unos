<?php
include_once 'funkcije.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
    <title>Prikaz Baze</title>
</head>
<body style="margin: 50px;">
    <h1>Zaposleni</h1>
    <br>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>JMBG</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>E-mail</th>
                <th>Iskustvo</th>
                <th>Saglasan</th>
                <th>Ip adresa</th>
                <th>Mac adresa</th>
                <th>
                    <a href="update"></a><br>
                    <a href="delete"></a>
                </td>
            </tr>
        </thead>
        <tbody>
            <?php
            $prikaz="SELECT * FROM korisnici" ;
            $rez=mysqli_query($conn, $prikaz);
            if(mysqli_error($conn))
            {
                echo"greska<br>".mysqli_error($conn);
            }
            while($row = mysqli_fetch_array($rez, MYSQLI_ASSOC))
            {
                echo"<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['jmbg']."</td>
                    <td>".$row['ime']."</td>
                    <td>".$row['prezime']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['iskustvo']."</td>
                    <td>".$row['saglasnost']."</td>
                    <td>".$row['ip']."</td>
                    <td>".$row['mac']."</td>
                    <td>
                        <a class='btn btn-primary btn-sm'>Update</a>
                        <a href='prikaz.php?id=".$row['id']."' class='btn btn-danger btn-sm'>Delete</a>
                    </td>
                </tr>";
            }
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
                $delete =mysqli_query( $conn,"DELETE FROM korisnici WHERE id='$id'");
                header("Location: prikaz.php");
                exit();
            }
            ?>
        </tbody>
    </table>
</body>
</html>