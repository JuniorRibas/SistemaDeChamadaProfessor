<?php
session_start();

$_SESSION['email'] = "";
$_SESSION['senha'] = "";
$_SESSION['logado'] = false;


header('Location: ./../../index.php');