<?php
session_start();

include('./../banco/db.class.php');
$db = new conexao();

$conn =  $db->conecta_mysql();

$data = $_POST['data'];


$query =  "SELECT t.turma, t.curso, d.data, d.senha FROM diario d join turma t on d.id_turma = t.id WHERE  data = '". $data ."'";

$result = mysqli_query($conn, $query);

while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $myArray[] = $row;
}
header('Content-Type: application/json');
echo json_encode($myArray);

 ?>