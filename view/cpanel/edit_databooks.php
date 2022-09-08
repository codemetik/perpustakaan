<?php
if ($_GET['books']) {
$row = mysqli_query($config, "select * from tb_buku where no_database = '".$_GET['books']."'");
$books = mysqli_fetch_array($row);
$durl = mysqli_num_rows($row);
if ($durl > 0) {
?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-info">
                <h5>Update Data (Databooks)</h5>
                <a href="#" class="float-right"><i class="fas fa-file-export"></i> Export Excel</a>
            </div>
            <div class="card-body">
                <form action="view/cpanel/edit/proses_edit_databooks.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6 card-body bg-light">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>No Database</th>
                                    <td>
                                        <input type="text" name="no_database" class="form-control" value="<?= $books['no_database']; ?>" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <th>No Buku</th>
                                    <td><input type="text" name="no_buku" class="form-control" value="<?= $books['no_buku']; ?>" autofocus></td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td><input type="date" name="tanggal" class="form-control" value="<?= $books['tanggal']; ?>"></td>
                                </tr>
                                <tr>
                                    <th>Judul</th>
                                    <td><input type="text" name="judul" class="form-control" value="<?= $books['judul']; ?>"></td>
                                </tr>
                                <tr>
                                    <th>Pengarang</th>
                                    <td><input type="text" name="pengarang" class="form-control" value="<?= $books['pengarang']; ?>"></td>
                                </tr>
                                <tr>
                                    <th>Penerbit</th>
                                    <td><input type="text" name="penerbit" class="form-control" value="<?= $books['penerbit']; ?>"></td>
                                </tr>
                                <tr>
                                    <th>Tahun</th>
                                    <td><input type="text" name="tahun" class="form-control" value="<?= $books['tahun']; ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        <div class="col-sm-6 card-body bg-light">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Jumlah</th>
                                    <td><input type="text" name="jumlah" class="form-control" value="<?= $books['jumlah']; ?>"></td>
                                </tr>
                                <tr>
                                    <th>Deskripsi Buku</th>
                                    <td><textarea name="desc_buku" class="form-control" cols="30" rows="3"><?= $books['deskripsi']; ?></textarea></td>
                                </tr>
                                <tr>
                                    <th>Pilih Kategori</th>
                                    <td>
                                    <select class="form-control select2" name="catg_buku" style="width: 100%;">
                                        <?php
                                        $qcatg = mysqli_query($config, "select * from tb_catg_buku");
                                        while ($catg = mysqli_fetch_array($qcatg)) { 
                                            if($books['catg_buku'] == $catg['id_catg']){
                                                $selectd = "selected";
                                            }else{
                                                $selectd = "";
                                            } ?>
                                            <option value="<?= $catg['id_catg']; ?>" <?= $selectd; ?>><?= $catg['nama_catg']; ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Edit img cover</th>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-6">
                                            <?php echo "<img src='dist/cover/".$books['img']."' width='100' height='100'>" ?>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-check">
                                                <input type="checkbox" name="ubah" value="true" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">Check me if update images</label>
                                                </div>
                                            <input type="file" name="gambar">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        <div class="col-sm-12 card-body m-1 bg-light">
                            <button type="submit" class="btn btn-info swalDefaultSuccess" name="update"><i class="fas fa-save"></i> Kirim</button>
                            <a href="?page=databooks" class="btn bg-info">Cencel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
}else{ echo '<meta http-equiv="refresh" content="0; url=?page=databooks">';
}
}else if(isset($_GET['books']) == null){
    echo '<meta http-equiv="refresh" content="0; url=?page=databooks">';
}
?>