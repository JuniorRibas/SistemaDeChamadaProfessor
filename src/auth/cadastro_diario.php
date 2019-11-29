<?php
session_start();

include('./../banco/db.class.php');


$db = new conexao();

$conn =  $db->conecta_mysql();

$turma = $_POST['turma'];
$data = $_POST['data'];
$senha = $_POST['senha'];

// Query para verificar se já exite um curso ou turma já cadastrado

echo "Turma = ". $turma  . "    Data  = ". $data . " Senha = " . $senha;
echo "<br>";

if($turma == "Escolha..." && $data && $senha){
    $_SESSION['erro'] = "Você deixou algum campo em branco";
    echo "Escolha uma turma";
 //   header('Location: ./../pages/cadastro_aluno.php');
}else{


    $queryVerifica = "SELECT * FROM aluno WHERE id_turma = '". $turma ."'";

    echo $queryVerifica;

    $resultVerifica = mysqli_query($conn, $queryVerifica);
    
    echo '<br>';
    echo "A consulta esta vazia? ";
    var_dump(empty($resultVerifica->fetch_object()));



    if (!empty($resultVerifica->fetch_object())) {
    
        $queryInsert = "INSERT INTO diario (id_turma, id_professor, data, senha) VALUES  ( '". $turma ."' ,'". $_SESSION['id'] ."', '" . $data . "', '" .$senha. "'  ) ";
    
        
        $resultInsert = mysqli_query($conn, $queryInsert);

        if($resultInsert){
            $diario = mysqli_query($conn, "SELECT * FROM diario WHERE senha = '". $senha . "'");
            $diarioObj = $diario->fetch_object();
            $queryAluno =  "SELECT * FROM aluno WHERE id_turma = '". $turma ."'";
            $resultAluno = mysqli_query($conn, $queryAluno);
            while($obj = $resultAluno->fetch_object()){
                $queryInsertAluno = "INSERT INTO aluno_presenca (id_aluno, id_diario, presenca, senha) values ( '". $obj->id ."', '". $diarioObj->id ."' , 'F', '". $senha ."' )";
                mysqli_query($conn, $queryInsertAluno);
            }
            $_SESSION['diario'] = $senha;
            $_SESSION['msg'] = "Diario Cadastrado com sucesso!";
           header('Location: ./../pages/view_diario.php');
        }else{
            $_SESSION['erro'] = "Essa senha já foi cadastrada para um diario, Coloque mais caracteres...";
            header('Location: ./../pages/cadastro_diario.php');
        }
        mysqli_close($conn);
    } else {
        $_SESSION['erro'] = "Essa turma não possue alunos cadastrados";
        header('Location: ./../pages/cadastro_diario.php');
    }


}


