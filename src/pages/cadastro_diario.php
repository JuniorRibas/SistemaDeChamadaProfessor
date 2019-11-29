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
            <a class="p-2 text-dark" href="./cadastro_turma.php">Cadastrar Turma</a>
            <a class="p-2 text-dark " href="./cadastro_aluno.php">Cadastrar Alunos</a>
            <a class="p-2 text-dark ativo" href="./cadastro_diario.php">Cadastrar Diario</a>
            <a class="p-2 text-dark" href="./pesquisa_diario.php">Pesquisar Diario</a>
        </nav>
        <a class="btn btn-outline-primary" href="./../auth/sair.php">Sair</a>
    </div>


    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <?php
            if (isset($_SESSION['msg'])) {
                echo '<div class="alert alert-success" >  ' . $_SESSION['msg'] . '</div>';
                unset($_SESSION['msg']);
            }

            ?>
            <?php
            if (isset($_SESSION['erro'])) {
                echo '<div class="alert alert-danger" >  ' . $_SESSION['erro'] . '</div>';
                unset($_SESSION['erro']);
            }

            ?>
            <form class="needs-validation" method="POST" action="./../auth/cadastro_diario.php">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="validationTooltip03">Turma</label>

                        <select class="custom-select" id="inputGroupSelect01" name="turma">
                        <option selected>Escolha...</option>
                            <?php
                            include('./../banco/db.class.php');
                            $db = new conexao();

                            $conn =  $db->conecta_mysql();

                            $query = "SELECT id, turma, curso FROM `turma` WHERE id_professor =  ". $_SESSION['id']." " ;

                            $result = mysqli_query($conn, $query);
                            
                            while($obj = $result->fetch_object()){
                                echo '<option value=" '.$obj->id .' ">'.$obj->turma. ' || '. $obj->curso . '</option>';
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="validationTooltip03">Data do Diario</label>
                        <input class="form-control" type="date" name="data">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="validationTooltip03">Senha</label>
                        <input class="form-control" type="password"  placeholder="Senha do diario.." name="senha">
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