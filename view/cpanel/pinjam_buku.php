<?php
if ($_GET['id']) {
$row = mysqli_query($config, "select * from tb_buku where no_database = '".$_GET['id']."'");
$books = mysqli_fetch_array($row);
$durl = mysqli_num_rows($row);
if ($durl > 0) {
?>
<div class="card">
    <div class="card-header">
        <h5>PINJAM BUKU</h5>
    </div>
    <div class="card-body">
        <form action="view/cpanel/proses/proses_pinjam_buku.php" method="post">
            <div class="row">
                <div class="col-sm-6 card-body bg-light">
                <table class="table table-sm table-striped">
                    <tbody class="bg-info">
                        <tr>
                            <th>No Database</th>
                            <td>
                                <input type="text" name="no_database" class="form-control" value="<?= $books['no_database']; ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <th>No Buku</th>
                            <td><input type="text" name="no_buku" class="form-control" value="<?= $books['no_buku']; ?>" readonly></td>
                        </tr>
                        <tr>
                            <th>Judul Buku</th>
                            <td><input type="text" name="judul" class="form-control" value="<?= $books['judul']; ?>" readonly></td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td><input type="text" name="stok" class="form-control" value="<?= $books['jumlah']; ?>" readonly></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <div class="col-sm-6 card-body bg-light">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Peminjam ? </th>
                            <td>
                            <select class="form-control-sm select2" name="peminjam" style="width: 100%;" required>
                                <option value="siswa">Siswa</option>
                                <option value="guru">Guru</option>
                                <option value="lain-lain" selected>Lain-lain</option>
                                ?>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Peminjam ? </th>
                            <td><textarea name="nama_peminjam" class="form-control bg-secondary" cols="30" rows="3" autofocus required></textarea></td>
                        </tr>
                        <tr>
                            <th>Tanggal Pinjam ?</th>
                            <td><input type="date" name="tanggal_pinjam" class="form-control-sm" required></td>
                        </tr>
                        <tr><th>Jumlah Pinjam ?</th>
                            <td><input type="text" name="jumlah_pinjam" class="form-control" required></td>
                        </tr>
                        <!-- <tr>
                            <td>Upload img cover</td>
                            <td><input type="file" name="file_cover" class="form-control"></td>
                        </tr> -->
                    </tbody>
                </table>
                </div>
                <div class="col-sm-12 card-body m-1 bg-light">
                    <button type="submit" class="btn btn-info swalDefaultSuccess" name="pinjam"><i class="fas fa-save"></i> Kirim</button>
                    <a href="?page=default" class="btn bg-info">Cencel</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
}else{ echo '<meta http-equiv="refresh" content="0; url=?page=default">';
}
}else if(isset($_GET['id']) == null){
    echo '<meta http-equiv="refresh" content="0; url=?page=default">';
}
?>