<?php
session_start();

include('./../banco/db.class.php');
$db = new conexao();

$conn =  $db->conecta_mysql();


$query = "SELECT a.nome, t.turma, t.curso, d.data, p.presenca FROM aluno_presenca p join aluno a on a.id = p.id_aluno join diario d on d.id = p.id_diario join turma t on t.id = d.id_turma WHERE p.senha ='".$_SESSION['diario'] ."'";

$result = mysqli_query($conn, $query);

while($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $myArray[] = $row;
}
header('Content-Type: application/json');
echo json_encode($myArray);

 ?>