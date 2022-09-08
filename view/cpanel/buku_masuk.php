<?php
$row = mysqli_query($config, "select max(no_database) as no from tb_buku");
// $nomor_buku = mysqli_num_rows($row);
$nomor_buku = mysqli_fetch_array($row);
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-info">
                <h5>Input Data (Buku Masuk)</h5>
                <a href="?page=import_excel" class="float-right"><i class="fas fa-file-export"></i> Import Excel</a>
            </div>
            <div class="card-body">
                <form action="view/cpanel/proses/proses_bukumasuk.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6 card-body bg-light">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>No Database</th>
                                    <td>
                                        <input type="text" name="no_database" class="form-control" value="<?= $nomor_buku['no']+1; ?>" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>No Buku</th>
                                    <td><input type="text" name="no_buku" class="form-control" autofocus></td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td><input type="date" name="tanggal" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>Judul</th>
                                    <td><input type="text" name="judul" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>Pengarang</th>
                                    <td><input type="text" name="pengarang" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>Penerbit</th>
                                    <td><input type="text" name="penerbit" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>Tahun</th>
                                    <td><input type="text" name="tahun" class="form-control"></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        <div class="col-sm-6 card-body bg-light">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Jumlah</th>
                                    <td><input type="text" name="jumlah" class="form-control"></td>
                                </tr>
                                <tr>
                                    <th>Deskripsi Buku</th>
                                    <td><textarea name="desc_buku" class="form-control" cols="30" rows="3"></textarea></td>
                                </tr>
                                <tr>
                                    <th>Pilih Kategori</th>
                                    <td>
                                    <select class="form-control select2" name="catg_buku" style="width: 100%;">
                                        <?php
                                        $qcatg = mysqli_query($config, "select * from tb_catg_buku");
                                        while ($catg = mysqli_fetch_array($qcatg)) {
                                            echo "<option value='".$catg['id_catg']."'>".$catg['nama_catg']."</option>";
                                        }
                                        ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Upload Img Cover</th>
                                    <td>
                                    <img id="output" height="100" width="150">
				<input type="file" accept="images/*" onchange="loadFile(event)" name="gambar" id="gambar" required>
                                    </td>
                                </tr>
                                <tr hidden>
                                    <td><input type="text" name="pemilik_buku" value="SMK Satya Praja 2 Petarukan"></td>
                                </tr>
                                <!-- <tr>
                                    <td>Upload img cover</td>
                                    <td><input type="file" name="file_cover" class="form-control"></td>
                                </tr> -->
                            </tbody>
                        </table>
                        </div>
                        <div class="col-sm-12 card-body m-1 bg-light">
                            <button type="submit" class="btn btn-info swalDefaultSuccess" name="kirim"><i class="fas fa-save"></i> Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>