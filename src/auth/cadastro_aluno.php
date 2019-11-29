<?php
session_start();

include('./../banco/db.class.php');


$db = new conexao();

$conn =  $db->conecta_mysql();

$nome = $_POST['nome'];
$turma = $_POST['turma'];

// Query para verificar se já exite um curso ou turma já cadastrado

echo "Turma = ". $turma  . "  Aluno = ". $nome;
echo "<br>";

if($turma == "Escolha..."){
    $_SESSION['erro'] = "Você não selecionou uma tuma para essa aluno";
    echo "Escolha uma turma";
    header('Location: ./../pages/cadastro_aluno.php');
}else{


    $queryVerifica = " SELECT * FROM  aluno WHERE nome = '" .  $nome."'  and id_turma = '" . $turma . "' ";

    echo $queryVerifica;

    $resultVerifica = mysqli_query($conn, $queryVerifica);
    
    echo "A consulta esta vazia? ";
    var_dump(empty($resultVerifica->fetch_object()));


    if (empty($resultVerifica->fetch_object())) {
    
        $queryInsert = "INSERT INTO aluno (nome, id_turma) VALUES ('" . $nome . "' , '" . $turma .  "' )";
    
    
        $resultInsert = mysqli_query($conn, $queryInsert);
        $_SESSION['msg'] = "Aluno Cadastrado com sucesso!";
        header('Location: ./../pages/cadastro_aluno.php');
    } else {
        $_SESSION['erro'] = "Aluno já foi cadastrado";
        header('Location: ./../pages/cadastro_aluno.php');
    }


}


