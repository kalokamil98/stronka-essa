<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
$servername = "localhost";
$username = "lepki";
$password = "MlodyDebil55";
    $conn = new mysqli($servername, $username, $password);
    
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $sql = "SELECT * FROM `osoba`";
    $result = $conn->query($sql);


    while($row = $result->fetch_assoc()){

        echo "<h1>Id_osoby: $row[Id_osoba] imie:$row[Imie] Nazwisko: $row[Nazwisko] Adres: $row[Adres] Telefon : $row[Telefon] E-mail : $row[E_mail]   </h1>";


    }




    ?>








</body>
</html>