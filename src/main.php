<?php
session_start();

if($_SESSION['logado']){
  header('Location: ./pages/index.php');
}else{

}
echo $_SESSION['logado'];

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Sistema de Chamada</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='./public/css/bootstrap.min.css'>

<style>
:root {
  --input-padding-x: .75rem;
  --input-padding-y: .75rem;
}

html,
body {
  height: 100%;
}

body {
  
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 420px;
  padding: 15px;
  margin: 0 auto;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group > input,
.form-label-group > label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group > label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0; /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown) ~ label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}
</style>
</head>

<body>
  <header>
    <div class="bg-dark collapse" id="navbarHeader" style="">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">Sobre</h4>
            <p class="text-muted">Sistema de chamada.</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Contato</h4>
            <ul class="list-unstyled">
              <li><a href="https://www.facebook.com/junior.ribeiro.14811" class="text-white">Facebook</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark box-shadow">
      <div class="container d-flex justify-content-between">
        <a href="#" class="navbar-brand d-flex align-items-center">
          <strong>Chamada</strong>
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header>
  <div class="center ">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
      
        <form class="form-signin" action="./auth/login.php" method="POST">
          <div class="text-center mb-4">
            <img class="mb-4" src="./assets/calendar-clock-icon_34472.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Faça seu login</h1>

          </div>
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
          <div class="form-label-group">
            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
            <label for="inputEmail">Usuario</label>
          </div>

          <div class="form-label-group">
            <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
            <label for="inputPassword">Senha</label>
          </div>

          <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
          <p class="mt-5 mb-3 text-muted text-center">© 2019</p>
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>









  <script src="./public/js/jquery-3.3.1.slim.min.js"></script>
  <script src="./public/js/popper.min.js"></script>
  <script src="./public/js/bootstrap.min.js"></script>
</body>

</html>