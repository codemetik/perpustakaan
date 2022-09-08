<?php
require_once('../../../config.php');

if (isset($_POST['kirim'])) {
    $no_database = $_POST['no_database'];
    $no_buku = $_POST['no_buku'];
    $tanggal = $_POST['tanggal'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $jumlah = $_POST['jumlah'];
    $desc = $_POST['desc_buku'];
    $catg = $_POST['catg_buku'];
    $pemilik_buku = $_POST['pemilik_buku'];

    $gbr = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    $query = mysqli_query($config, "insert into tb_buku(no_database, no_buku, tanggal, judul, pengarang,
    penerbit, tahun, jumlah, deskripsi, catg_buku, pemilik_buku, img)
    values('".$no_database."','".$no_buku."','".$tanggal."','".$judul."','".$pengarang."','".$penerbit."','".$tahun."','".$jumlah."','".$desc."','".$catg."','".$pemilik_buku."','".$gbr."')");
    move_uploaded_file($tmp,'../../../dist/cover/'.$gbr);
    if ($query) {
        echo "<script>
        alert('Data berhasil masuk');
        document.location.href = '../../../?page=buku_masuk';
        </script>";
    }else{
        echo "<script>
        alert('Data gagal masuk');
        document.location.href = '../../../?page=buku_masuk';
        </script>";
    }
}
?>