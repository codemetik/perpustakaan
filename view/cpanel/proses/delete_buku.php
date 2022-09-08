<?php
require_once('../../../config.php');

if(isset($_GET['id'])){
    $sql = mysqli_query($config, "delete from tb_buku where no_database = '".$_GET['id']."'");
    if ($sql) {
        echo "<script>
        alert('Data berhasil di pindahkan ke sampah');
        document.location.href = '../../../?page=trash';
        </script>";
    }else{
        echo "<script>
        alert('Data gagal di pindahkan ke sampah');
        document.location.href = '../../../?page=databooks';
        </script>";
    }
}
?>