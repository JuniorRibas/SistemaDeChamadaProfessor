<?php
session_start();

include('./../banco/db.class.php');


$db = new conexao();

$conn =  $db->conecta_mysql();

$user = $_POST['email'];
$senha = $_POST['senha'];


if ($user && $senha) {
    $query = "SELECT * FROM professor where email = '" . $user . "' and  senha = '" . $senha . "'";


    $result = mysqli_query($conn, $query);
    $obj =  $result->fetch_array(MYSQLI_NUM);
    
    if(!$obj){
        $_SESSION['erro'] = "Email/Senha incorretos";
        $_SESSION['logado'] = false;
       header('Location: ./../main.php');
    }else{
        $_SESSION['email'] = $user;
        $_SESSION['senha'] = $senha;
        $_SESSION['nome'] = $obj[1];
        $_SESSION['id'] = $obj[0];
       $_SESSION['logado'] = true;
       header('Location: ./../pages/index.php');
    }

   
} else {
    $_SESSION['logado'] = false;
    header('Location: ./../main.php');
 }
