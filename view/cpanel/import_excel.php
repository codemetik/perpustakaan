<div class="row">
    <div class="col-sm-12 m-2">
    <h3>Form Import Data</h3>
        <form method="post" action="?page=import_excel" enctype="multipart/form-data">
            <a href="tmp/Format.xlsx">Download Format</a> &nbsp;|&nbsp;
            <a href="?page=buku_masuk">Kembali</a>
            <br><br>

            <input type="file" name="file">
            <button type="submit" name="preview" class="btn btn-info">Preview</button>
        </form>
    </div>
    <div class="col-sm-12 m-2">
        <div class="card bg-info">
            <div class="card-header"><h5>Panduan Import</h5></div>
            <div class="card-body bg-light">
            <p><i class="far fa-circle"></i> Sebelum import disarankan menggunakan <b class="bg-secondary">Format Excel dari Aplikasi</b> (Download Format).
            <br><i class="far fa-circle"></i> Jika ada Data yang sama antara file <b class="bg-secondary">Excel dengan Database maka akan terjadi Duplikat Data</b> di Database. 
            <br><i class="far fa-circle"></i> Isian di kolom Tanggal Harus <u><i>tahun-bulan-tanggal (2022-07-28)</i></u>. 
            <br><i class="far fa-circle"></i> Isian Kategori buku di isi pada kolom ID_Kategori_buku dengan ID sbg: 
            <br>&nbsp;&nbsp;&nbsp; ID 1 = Buku Produktif.
            <br>&nbsp;&nbsp;&nbsp; ID 2 = Buku Non Produktif.
            <br>&nbsp;&nbsp;&nbsp; ID 3 = Buku Umum.</p></div>
        </div>
    </div>
</div>
<hr>

<?php
// Jika user telah mengklik tombol Preview
if (isset($_POST['preview'])) {
    $tgl_sekarang = date('YmdHis'); // Ini akan mengambil waktu sekarang dengan format yyyymmddHHiiss
    $nama_file_baru = 'data' . $tgl_sekarang . '.xlsx';

    // Cek apakah terdapat file data.xlsx pada folder tmp
    if (is_file('tmp/' . $nama_file_baru)) // Jika file tersebut ada
        unlink('tmp/' . $nama_file_baru); // Hapus file tersebut

    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
    $tmp_file = $_FILES['file']['tmp_name'];

    // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
    if ($ext == "xlsx") {
        // Upload file yang dipilih ke folder tmp
        // dan rename file tersebut menjadi data{tglsekarang}.xlsx
        // {tglsekarang} diganti jadi tanggal sekarang dengan format yyyymmddHHiiss
        // Contoh nama file setelah di rename : data20210814192500.xlsx
        move_uploaded_file($tmp_file, 'tmp/' . $nama_file_baru);

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load('tmp/' . $nama_file_baru); // Load file yang tadi diupload ke folder tmp
        $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        // Buat sebuah tag form untuk proses import data ke database
        echo "<form method='post' action='view/cpanel/proses/import_buku.php'>";

        // Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
        // ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload)
        echo "<input type='hidden' name='namafile' value='" . $nama_file_baru . "'>";

        // Buat sebuah div untuk alert validasi kosong
        echo "<div id='kosong' style='color: red;margin-bottom: 10px;'>
                Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
            </div>";

        echo "<table id='table_now' class='table table-bordered display' cellpadding='5'>
                <tr>
                    <th colspan='10' class='bg-primary text-center'>Preview Data</th>
                </tr>
                <tr>
                    <th>Kode Buku</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                    <th>Deskripsi</th>
                    <th>Kategori Buku</th>
                    <th>Pemilik Buku</th>
                </tr>";

        $numrow = 1;
        $kosong = 0;
        foreach ($sheet as $row) { // Lakukan perulangan dari data yang ada di excel
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
            if ($kd_buku == "" && $tgl == "" && $judul == "" && $pengarang == "" && $penerbit == "" && $tahun == "" && $jumlah == "" && $deskripsi == "" && $catg_buku == "" && $pemilik_buku == "")
                continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if ($numrow > 1) {
                // Validasi apakah semua data telah diisi
                $kd_buku_td = (!empty($kd_buku)) ? "" : " style='background: #E07171;'"; // Jika kd_buku kosong, beri warna merah
                $tgl_td = (!empty($tgl)) ? "" : " style='background: #E07171;'"; // Jika tanggal kosong, beri warna merah
                $judul_td = (!empty($judul)) ? "" : " style='background: #E07171;'"; // Jika Judul kosong, beri warna merah
                $pengarang_td = (!empty($pengarang)) ? "" : " style='background: #E07171;'"; // Jika pengarang kodong, beri warna merah
                $penerbit_td = (!empty($penerbit)) ? "" : " style='background: #E07171;'"; // Jika penerbit kosong, beri warna merah
                $tahun_td = (!empty($tahun)) ? "" : " style='background: #E07171;'"; // Jika tahun kosong, beri warna merah
                $jumlah_td = (!empty($jumlah)) ? "" : " style='background: #E07171;'"; // Jika jumlah kosong, beri warna merah
                $deskripsi_td = (!empty($deskripsi)) ? "" : " style='background: #E07171;'"; // Jika deskripsi kosong, beri warna merah
                $catg_buku_td = (!empty($catg_buku)) ? "" : " style='background: #E07171;'"; // Jika categori_buku kosong, beri warna merah
                $pemilik_buku_td = (!empty($pemilik_buku)) ? "" : " style='background: #E07171;'"; // Jika pemilik_buku kosong, beri warna merah

                // Jika salah satu data ada yang kosong
                if ($kd_buku == "" or $tgl == "" or $judul == "" or $pengarang == "" or $penerbit == "" or $tahun == "" or $jumlah == "" or $deskripsi == "" or $catg_buku == "" or $pemilik_buku == "") {
                    $kosong++; // Tambah 1 variabel $kosong
                }

                echo "<tr>";
                echo "<td" . $kd_buku_td . ">" . $kd_buku . "</td>";
                echo "<td" . $tgl_td . ">" . $tgl . "</td>";
                echo "<td" . $judul_td . ">" . $judul . "</td>";
                echo "<td" . $pengarang_td . ">" . $pengarang . "</td>";
                echo "<td" . $penerbit_td . ">" . $penerbit . "</td>";
                echo "<td" . $tahun_td . ">" . $tahun . "</td>";
                echo "<td" . $jumlah_td . ">" . $jumlah . "</td>";
                echo "<td" . $deskripsi_td . ">" . $deskripsi . "</td>";
                echo "<td" . $catg_buku_td . ">" . $catg_buku . "</td>";
                echo "<td" . $pemilik_buku_td . ">" . $pemilik_buku . "</td>";
                echo "</tr>";
            }

            $numrow++; // Tambah 1 setiap kali looping
        }

        echo "</table>";

        // Cek apakah variabel kosong lebih dari 0
        // Jika lebih dari 0, berarti ada data yang masih kosong
        if ($kosong > 0) {
?>
            <script>
                $(document).ready(function() {
                    // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                    $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                    $("#kosong").show(); // Munculkan alert validasi kosong
                });
            </script>
<?php
        } else { // Jika semua data sudah diisi
            echo "<hr>";

            // Buat sebuah tombol untuk mengimport data ke database
            echo "<button type='submit' name='import' class='btn btn-info'>Import</button>";
            echo "<a href='?page=buku_masuk' class='btn btn-primary'>Cencel</a>";
        }

        echo "</form>";
    } else { // Jika file yang diupload bukan File Excel 2007 (.xlsx)
        // Munculkan pesan validasi
        echo "<div style='color: red;margin-bottom: 10px;'>
                Hanya File Excel 2007 (.xlsx) yang diperbolehkan
            </div>";
    }
}
?>