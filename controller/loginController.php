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
    $_SESSION['user_id'] = $useraktif['id_users'];
    $_SESSION['username'] = $useraktif['username'];
    header('Location: ../index.php');
    exit;
} else {
    header('Location: ../view/login.php');
}