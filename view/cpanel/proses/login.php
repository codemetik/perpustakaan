<?php
include "../../../config.php";
session_start();

if(isset($_POST['login'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $query = mysqli_query($config, "select * from tb_user where username ='".$user."' and password = '".$pass."'");
    $sql = mysqli_num_rows($query);
    $name = mysqli_fetch_array($query);

    if($sql > 0){

        $_SESSION['login'] = "login";
        $_SESSION['user'] = $name['username'];
        $_SESSION['id'] = $name['id'];
       echo "<script>
       document.location.href = '../../../index.php';
       </script>";
    }else{
        echo "data tidak ada di database";
    }

}

if(isset($_GET['log']) == 'logout'){
    session_destroy();
    header("location:../../../index.php");
}
?>