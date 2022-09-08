<?php
require_once('../../../config.php');

if(isset($_GET['id'])){

    $show_trash = mysqli_query($config, "select * from tb_trash where no_database = '".$_GET['id']."'");
    $sq = mysqli_fetch_array($show_trash);

    $insert_buku = mysqli_query($config, "insert into tb_buku values('','".$sq['no_buku']."','".$sq['tanggal']."','".$sq['judul']."','".$sq['pengarang']."','".$sq['penerbit']."','".$sq['tahun']."','".$sq['jumlah']."','".$sq['deskripsi']."','".$sq['catg_buku']."','".$sq['pemilik_buku']."')");
    $sql = mysqli_query($config, "delete from tb_trash where no_database = '".$_GET['id']."'");

    if ($sql && $insert_buku) {
        echo "<script>
        alert('Data berhasil dikembalikan ke Databooks');
        document.location.href = '../../../?page=databooks';
        </script>";
    }else{
        echo "<script>
        alert('Data gagal dikembalikan ke Databooks');
        document.location.href = '../../../?page=databooks';
        </script>";
    }
}
?>