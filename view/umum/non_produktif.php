<div class="card">
    <div class="card-header">
        <h5>Buku Non Produktif</h5>
    </div>
    <div class="card-body">
            <table id="table_now" class="table table-sm table-bordered table-striped display">
            <thead>
                <tr>
                <th>No Db</th>
                <th>No buku</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Tahun</th>
                <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($config, "select * from tb_buku where catg_buku = '2'");
                while($sql = mysqli_fetch_array($query)) {?>
                <tr>
                    <td><?= $sql['no_database']; ?></td>
                    <td><?= $sql['no_buku']; ?></td>
                    <td><a href="?page=pinjam_buku&id=<?= $sql['no_database']; ?>" class="btn bg-light"><?= $sql['judul']; ?></a></td>
                    <td><?= $sql['pengarang']; ?></td>
                    <td><?= $sql['tahun']; ?></td>
                    <td><?= $sql['jumlah']; ?></td>
                </tr>
                <?php }
                ?>
            </tbody>
            <tfoot>
                <tr>
                <th>No Db</th>
                <th>No buku</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Tahun</th>
                <th>Jumlah</th>
                </tr>
            </tfoot>
            </table>
    </div>
</div>