<?php
session_start();
require_once('../../../config.php');

if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $id = $_POST['id'];

    $query = mysqli_query($config, "update tb_user set username = '".$username."', password = '".$password."', nama_lengkap = '".$nama_lengkap."'
    where id = '".$id."'");

    if ($query) {
        $_SESSION['user'] = $username;
        echo "<script>
        alert('Update Data berhasil');
        document.location.href = '../../../?page=default';
        </script>";
    }else{
        echo "<script>
        alert('Update Data gagal');
        document.location.href = '../../../?page=default';
        </script>";
    }
}
?>