<?php
require_once('../../../config.php');

if(isset($_GET['id'])){

    $sql = mysqli_query($config, "delete from tb_trash where no_database = '".$_GET['id']."'");

    if ($sql) {
        echo "<script>
        alert('Data berhasil dihapus permanen');
        document.location.href = '../../../?page=trash';
        </script>";
    }else{
        echo "<script>
        alert('Data gagal dihapus permanen');
        document.location.href = '../../../?page=trash';
        </script>";
    }
}
?>