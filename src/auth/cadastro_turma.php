<?php
session_start();

include('./../banco/db.class.php');


$db = new conexao();

$conn =  $db->conecta_mysql();

$turma = $_POST['turma'];
$curso = $_POST['curso'];

// Query para verificar se já exite um curso ou turma já cadastrado


$queryVerifica = " SELECT * FROM  turma WHERE turma = '" . $turma . "' and curso = '" . $curso . "'";


$resultVerifica = mysqli_query($conn, $queryVerifica);



if (empty($resultVerifica->fetch_object())) {

    $queryInsert = "INSERT INTO turma (turma, curso, id_professor) VALUES ('" . $turma . "' , '" . $curso . "', '". $_SESSION['id'] . "')";


    $resultInsert = mysqli_query($conn, $queryInsert);
    $_SESSION['msg'] = "Turma Cadastrada com sucesso!";
    header('Location: ./../pages/cadastro_turma.php');
} else {
    $_SESSION['erro'] = "Turma já existe!";
    header('Location: ./../pages/cadastro_turma.php');
}
