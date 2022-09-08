<div class="card">
    <div class="card-header">
        <h5>Guru Pinjam</h5>
    </div>
    <div class="card-body">
    <table id="table_now" class="table table-sm table-bordered table-striped display">
            <thead>
                <tr>
                    <th>No Db</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Peminjam</th>
                    <th>Nama Peminjam</th>
                    <th>Tgl Pinjam</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysqli_query($config, "select * from tb_buku x
                    inner join tb_pinjam_buku y ON y.no_database = x.no_database
                    inner join tb_catg_buku z ON z.id_catg = x.catg_buku where peminjam = 'guru'");
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <tr>
                            <td><?= $data['no_database']; ?></td>
                            <td><?= $data['no_buku']; ?></td>
                            <td><?= $data['judul']; ?></td>
                            <td><?= $data['pengarang']; ?></td>
                            <td><?= $data['tahun']; ?></td>
                            <td><?= $data['peminjam']; ?></td>
                            <td><?= $data['nama_peminjam']; ?></td>
                            <td><?= $data['tanggal_pinjam']; ?></td>
                            <td><?= $data['jumlah_pinjam']; ?></td>
                            <td><a href="view/cpanel/proses/kembalikan_buku.php?id=<?= $data['no_database']; ?>" class="btn-sm bg-success" onclick="return confirm('Buku dengan ID : <?= $data['no_database']; ?> akan dikembalikan! Anda yakin?')"><i class="fas fa-edit"></i></a></td>
                        </tr>
                    <?php }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No Db</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Peminjam</th>
                    <th>Nama Peminjam</th>
                    <th>Tgl Pinjam</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>