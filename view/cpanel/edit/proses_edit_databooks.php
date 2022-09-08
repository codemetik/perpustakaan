<?php
require_once('../../../config.php');

if (isset($_POST['ubah'])) {
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

    $gbr = $_FILES['gambar']['name'];
	$tmp = $_FILES['gambar']['tmp_name'];
	$fotobaru = date('dmYHis').$gbr;

	$path = "../../../dist/cover/".$fotobaru;

	if (move_uploaded_file($tmp, $path)) {
		$query = "SELECT * FROM tb_buku WHERE no_database ='".$no_database."'";
		$sql = mysqli_query($config, $query);

		$data = mysqli_fetch_array($sql);

		if (is_file("../../../dist/cover/".$data['img']))
			unlink("../../../dist/cover/".$data['img']);

        $query = mysqli_query($config, "update tb_buku set no_buku = '".$no_buku."', tanggal ='".$tanggal."',
        judul = '".$judul."', pengarang = '".$pengarang."', penerbit = '".$penerbit."', tahun = '".$tahun."', jumlah = '".$jumlah."',
        deskripsi = '".$desc."', catg_buku = '".$catg."', img = '".$fotobaru."' where no_database = '".$no_database."' ");
        
		// $query = "UPDATE produk SET nama='".$nama."', gambar='".$fotobaru."' WHERE id_produk='".$id."'";

		// $sql = mysqli_query($koneksi, $query);

		if ($query) {
            echo "<script>
            alert('Update Data berhasil');
            document.location.href = '../../../?page=databooks';
            </script>";
        }else{
            echo "<script>
            alert('Update Data gagal');
            document.location.href = '../../../?page=edit_databooks&books=".$no_database."';
            </script>";
        }
	}else{
		echo "maaf, gambar gagal untuk di upload";
		echo "<br><a href='dasboard.php?page=home'>kembali ke from</a></br>";
	}
}else{
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

    $query = mysqli_query($config, "update tb_buku set no_buku = '".$no_buku."', tanggal ='".$tanggal."',
    judul = '".$judul."', pengarang = '".$pengarang."', penerbit = '".$penerbit."', tahun = '".$tahun."', jumlah = '".$jumlah."',
    deskripsi = '".$desc."', catg_buku = '".$catg."' where no_database = '".$no_database."' ");

    if ($query) {
        echo "<script>
        alert('Update Data berhasil');
        document.location.href = '../../../?page=databooks';
        </script>";
    }else{
        echo "<script>
        alert('Update Data gagal');
        document.location.href = '../../../?page=edit_databooks&books=".$no_database."';
        </script>";
    }
}
?>