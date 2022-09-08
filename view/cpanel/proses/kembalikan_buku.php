<?php
require_once('../../../config.php');

if(isset($_GET['id'])){
    $no_database = $_GET['id'];

    $query = mysqli_query($config, "delete from tb_pinjam_buku where no_database");
    if ($query) {
        echo "<script>
        alert('Data berhasil dikembalikan');
        document.location.href = '../../../?page=default';
        </script>";
    }else{
        echo "<script>
        alert('Data gagal di kembalikan');
        document.location.href = '../../../?page=default';
        </script>";
    }
}
?>