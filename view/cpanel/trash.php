<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-danger">
                <h5>Trash</h5>
            </div>
            <div class="card-body">
            <table id="table_now" class="table table-sm table-bordered table-striped display">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $trash = mysqli_query($config, "select * from tb_trash");
                  while ($sqltrash = mysqli_fetch_array($trash)) { ?>
                    <tr>
                        <td><?= $sqltrash['no_database'];?></td>
                        <td><?= $sqltrash['no_buku'];?></td>
                        <td><?= $sqltrash['judul'];?></td>
                        <td><?= $sqltrash['pengarang'];?></td>
                        <td><?= $sqltrash['tahun'];?></td>
                        <td><a href="view/cpanel/proses/delete_trash.php?id=<?= $sqltrash['no_database']; ?>"
                        onclick="return confirm('Buku dengan ID : <?= $sqltrash['no_database']; ?> akan dikembalikan ke Databooks! Anda yakin?')">Pulihkan ke: <i class="fas fa-database"></i></a>
                        || <a href="view/cpanel/proses/delete_trash_permanen.php?id=<?= $sqltrash['no_database']; ?>" onclick="return confirm('Buku dengan ID : <?= $sqltrash['no_database']; ?> akan dihapus permanen! Anda yakin?')"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                  <?php }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>