<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "plan";

$conn = new mysqli($servername, $username, $password,$database);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset('utf8');

$sql_table = "SHOW KEYS FROM ".$_GET[$key[0]]." WHERE Key_name = 'PRIMARY'";

$pk_name = $conn->query($sql_table);

$pk_table =  $pk_name->fetch_assoc();

$Column_name = $pk_table['Column_name'];




$key = array_keys($_GET);

$sql2 = "";
$sql = "UPDATE ".$_GET[$key[0]]." SET ";
for($i=1;$i<count($key);$i++){

$sql2 = $sql2.$key[$i]."=".$_GET[$key[$i]]." ";



}

$sql_fin =$sql.$sql2."WHERE $Column_name=".$_GET[$key[1]];

$conn->query($sql);

?>