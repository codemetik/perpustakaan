<?php
require_once("../../../config.php");

if(isset($_POST['pinjam'])){
    $no_database = $_POST['no_database'];
    $peminjam = $_POST['peminjam'];
    $nama_peminjam = $_POST['nama_peminjam'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $jumlah_pinjam = $_POST['jumlah_pinjam'];
    $stok = $_POST['stok'];

    if ($jumlah_pinjam > $stok) {
        echo "<script>
        alert('Jumlah pinjam lebih besar dari stok!');
        document.location.href = '../../../?page=default';
        </script>";
    }else{
        $query = mysqli_query($config, "insert into tb_pinjam_buku(no_database, peminjam, nama_peminjam, tanggal_pinjam, jumlah_pinjam)
        values('".$no_database."','".$peminjam."','".$nama_peminjam."','".$tanggal_pinjam."','".$jumlah_pinjam."')");

        if ($query) {
            echo "<script>
            alert('Berhasil Pinjam Buku');
            document.location.href = '../../../?page=default';
            </script>";
        }else{
            echo "<script>
            alert('Gagal Pinjam Buku');
            document.location.href = '../../../?page=default';
            </script>";
        }
    }
}
?>