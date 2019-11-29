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
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal">Seja Bem Vindo Professor</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark ativo" href="./cadastro_turma.php">Cadastrar Turma</a>
            <a class="p-2 text-dark" href="./cadastro_aluno.php">Cadastrar Alunos</a>
            <a class="p-2 text-dark" href="./cadastro_diario.php">Cadastrar Diario</a>
            <a class="p-2 text-dark" href="./pesquisa_diario.php">Pesquisar Diario</a>
        </nav>
        <a class="btn btn-outline-primary" href="./../auth/sair.php">Sair</a>
    </div>


    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            
            <?php
            if (isset($_SESSION['msg'])) {
                echo '<div class="alert alert-success" >  ' . $_SESSION['msg']. '</div>';
                unset($_SESSION['msg']);
            }

            ?>
            <?php
            if (isset($_SESSION['erro'])) {
               echo '<div class="alert alert-danger" >  ' . $_SESSION['erro']. '</div>';
                unset($_SESSION['erro']);
            }

            ?>
        
          
            <form class="needs-validation" method="POST" action="./../auth/cadastro_turma.php">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="validationTooltip01">Turma</label>
                        <input name="turma" type="text" class="form-control" id="validationTooltip01" placeholder="Digite o nome da turma" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="validationTooltip03">Curso</label>
                        <input name="curso" type="text" class="form-control" id="validationTooltip03" placeholder="Digite o curso da turma" required>
                    </div>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Cadastrar</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>





    <script src="./../public/js/jquery-3.3.1.slim.min.js"></script>
    <script src="./../public/js/popper.min.js"></script>
    <script src="./../public/js/bootstrap.min.js"></script>
</body>

</html>