<?php 






$row_id = $_GET['row_id'];
$table = $_GET['table'];


$servername = "localhost";
$username = "root";
$password = "";
$database = "plan";


$sql_table = "SHOW KEYS FROM $table WHERE Key_name = 'PRIMARY'";






$conn = new mysqli($servername, $username, $password,$database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset('utf8');

$pk_name = $conn->query($sql_table);

$pk_table =  $pk_name->fetch_assoc();

$Column_name = $pk_table['Column_name'];

echo $Column_name;
echo "<br>";
echo $table;
echo "<br>";

echo $row_id;
echo "<br>";


$sql = "DELETE FROM $table WHERE $Column_name = $row_id  ";


$conn->query($sql);





?>