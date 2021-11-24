<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <header>
      <h1>Uczelani im Jana Pawła 2 w Poznań</h1>
      <h1>Panel Administracyjny</h1>
      <p>Wyiberz tabele:</p>
    </header>
    <nav>
      
      </div>
      <div class="list">
        <p>UJP</p>
        <ol>
          <li><a href="" class="nav-link"> Dodaj użytkownika</a></li>
          <li><a href="show.php" class="nav-link">Wyświetl dane</a></li>
          <li><a href="" class="nav-link">Modifikuj dane</a></li>
          <li><a href="" class="nav-link">Usuwanie rekordów</a></li>
        </ol>
      </div>
    </nav>

    <div class="content">











<?php 
    

$servername = "localhost";
$username = "root";
$password = "";
$database = "plan";


$sql = "Show TABLES FROM $database";

    $conn = new mysqli($servername, $username, $password,$database);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $conn->set_charset('utf8');
    

$result =$conn->query($sql);



while($row = $result->fetch_row()){
    echo "<p><a href='show.php?table=$row[0]' class='nav-table'>$row[0]</a></p>";
}


echo " </div>";

echo "<div class='data'>";



if(isset($_GET['table'])){


$header = strtoupper($_GET['table']);


echo "<table>";

echo "<tr > <td colspan='100%'><b id='table'> $header</b> </td></tr>";

$sql_col_name = "show COLUMNS FROM $_GET[table]";


$col_name = $conn->query($sql_col_name);

$form_names = array();

echo "<tr>";

while($name = $col_name->fetch_assoc()){
$form_names[] = $name['Field'];

  echo "<td> <b> $name[Field] </b> </td>";


}




echo "</tr>";





$sql2 = "SELECT * FROM $_GET[table]";
$table_data = $conn->query($sql2);

if($table_data->num_rows > 0){


while($data = $table_data->fetch_row()){
  
echo "<tr id='$data[0]'>";
for($i=0;$i<count($data);$i++){
    echo "<td>".$data[$i].'</td>';
};

echo "<td> <button onclick='delete_row($data[0])'> X </button> </td>";

echo "</tr>";

}





}



echo "</table>";
}






echo "<form action='update.php?table=$_GET[table]&id='>";

for($x = 0;$x<count($form_names);$x++){
echo "<div>";
echo "$form_names[$x]  <input name='$form_names[$x]'></input>";

echo "</div>";
}

echo "<button>Prześlij</button>";
echo "</form>"


    ?>





   <script src="main.js"></script>
  </body>
</html>
