<?php

session_start();

require_once '../model/Database.php';
require_once '../model/Users.php';

$db = new Database();
$koneksi = $db->getConnection();

$username = $_POST['username'];
$password = $_POST['password'];

$user = new Users($koneksi);
$useraktif = $user->login($username, $password);

if($useraktif){
    $_SESSION['username'] = $useraktif['id_user'];
    $_SESSION['password'] = $useraktif['password'];
    header('Location: ../index.php');
    exit;
} else {
    header('Location: ../view/login.php');
}