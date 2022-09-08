<?php
// Load file koneksi.php
include "../../../config.php";

// Load file autoload.php
require '../../../vendor/autoload.php';

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = $_POST['namafile'];
    $path = '../../../tmp/' . $nama_file_baru; // Set tempat menyimpan file tersebut dimana

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load($path); // Load file yang tadi diupload ke folder tmp
    $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

	$numrow = 1;
	foreach($sheet as $row){
		// Ambil data pada excel sesuai Kolom
        $kd_buku = $row['A']; // Ambil data kode buku
        $tgl = $row['B']; // Ambil data tgl
        $judul = $row['C']; // Ambil data judul
        $pengarang = $row['D']; // Ambil data pengarang
        $penerbit = $row['E']; // Ambil data penerbit
        $tahun = $row['F']; // Ambil data tahun
        $jumlah = $row['G']; // Ambil data jumlah
        $deskripsi = $row['H']; // Ambil data deskripsi
        $catg_buku = $row['I']; // Ambil data kategori buku
        $pemilik_buku = $row['J']; // Ambil data pemilik buku

		// Cek jika semua data tidak diisi
		if($kd_buku == "" && $tgl == "" && $judul == "" && $pengarang == "" && $penerbit == "" && $tahun == "" && $jumlah == "" && $deskripsi == "" && $catg_buku == "" && $pemilik_buku == "")
			continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
			// Buat query Insert
			$query = "INSERT INTO tb_buku VALUES('','" . $kd_buku . "','" . $tgl . "','" . $judul . "','" . $pengarang . "','" . $penerbit . "','" . $tahun . "','" . $jumlah . "','" . $deskripsi . "','" . $catg_buku . "','" . $pemilik_buku . "','')";

			// Eksekusi $query
            mysqli_query($config, $query);
		}

		$numrow++; // Tambah 1 setiap kali looping
	}

    unlink($path); // Hapus file excel yg telah diupload, ini agar tidak terjadi penumpukan file
}

header('location: ../../../?page=databooks'); // Redirect ke halaman awal
