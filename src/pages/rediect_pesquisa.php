<?php
session_start();

include('./../banco/db.class.php');
$db = new conexao();

unset($_SESSION['diario']);

$data = $_GET['senha'];

$_SESSION['diario'] = $data;

header('Location: ./view_diario.php');

 ?>