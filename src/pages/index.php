<?php
session_start();

if (!$_SESSION['logado']) {
    header('Location: ./../../index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Bem vindo</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./../public/css/bootstrap.min.css'>
</head>

<body>
    <div class="navbar  d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal">Seja Bem Vindo Professor</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark " href="./cadastro_turma.php">Cadastrar Turma</a>
            <a class="p-2 text-dark " href="./cadastro_aluno.php">Cadastrar Alunos</a>
            <a class="p-2 text-dark" href="./cadastro_diario.php">Cadastrar Diario</a>
            <a class="p-2 text-dark" href="./pesquisa_diario.php">Pesquisar Diario</a>
        </nav>
        <a class="btn btn-outline-primary" href="./../auth/sair.php">Sair</a>
    </div>
    <h1>Senha Bem vindo <?php echo $_SESSION['nome']; ?></h1>





    <script src="./../public/js/jquery-3.3.1.slim.min.js"></script>
    <script src="./../public/js/popper.min.js"></script>
    <script src="./../public/js/bootstrap.min.js"></script>
</body>

</html>