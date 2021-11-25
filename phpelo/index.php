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
  
    <div class="content">











<?php 
    

$servername = "localhost";
$username = "lepki";
$password = "MlodyDebil55";
$database = "plan";



$sql = "Show TABLES FROM $database";

    $conn = new mysqli($servername, $username, $password,$database);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $conn->set_charset('utf8');
    

$result =$conn->query($sql);



while($row = $result->fetch_row()){
    echo "<p><a href='index.php?table=$row[0]' class='nav-table'>$row[0]</a></p>";
}


echo " </div>";

echo "<div class='data'>";



if(isset($_GET['table'])){


$header = strtoupper($_GET['table']);


echo "<table>";

echo "<tr > <td colspan='100%'><b id='table'> $header</b> <button style='float:right' onclick='add()' >ADD</button> </td></tr>";

$sql_col_name = "show COLUMNS FROM $_GET[table]";


$col_name = $conn->query($sql_col_name);

$form_names = array();

echo "<tr>";

while($name = $col_name->fetch_assoc()){
$form_names[] = $name['Field'];

  echo "<td> <b> $name[Field] </b>  </td>";


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

    
echo "<td> <button> <a href='delete.php?table=$_GET[table]&id=$data[0]'>X</a></button> </td>";
echo "<td><button onclick='update($data[0])'>UPDATE</button></td>";
echo "</tr>";

}





}



echo "</table>";
}




if(isset($_GET['table'])){

echo "<form action='update.php' id='form_1'>";

echo "<span style='margin-left:95%; cursor:pointer' onclick='close_form(1)'>X</span>";
echo "<p id='row_id' >ELO</p>";
echo "<input name='table' value=$_GET[table] type='hidden'></input>";

for($x = 1;$x<count($form_names);$x++){
echo "<div>";
echo "$form_names[$x]  <input name='$form_names[$x]' ></input>";

echo "</div>";
}

echo "<button >Prześlij</button>";
echo "</form>";






echo "<form action='insert.php' id='form_2'>";

echo "<span style='margin-left:95%; cursor:pointer' onclick='close_form(2)'>X</span>";

echo "<input name='table' value=$_GET[table] type='hidden'></input>";

for($x = 0;$x<count($form_names);$x++){
echo "<div>";
echo "$form_names[$x]  <input name='$form_names[$x]' ></input>";

echo "</div>";
}

echo "<button >Prześlij</button>";
echo "</form>";



}








    ?>



<script src="main4.js"></script>

   
  </body>
</html>
