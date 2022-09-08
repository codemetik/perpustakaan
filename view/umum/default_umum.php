<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-dark">
                <h5>DATABOOKS</h5>
            </div>
            <div class="card-body">
            <table id="table_now" class="table table-sm table-striped display">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $keluar = mysqli_query($config, "select * from tb_buku");
                  while ($sqlkeluar = mysqli_fetch_array($keluar)) { ?>
                    <tr>
                        <td><?= $sqlkeluar['no_database'];?></td>
                        <td><?= $sqlkeluar['no_buku'];?></td>
                        <td><?= $sqlkeluar['judul'];?></td>
                        <td><?= $sqlkeluar['pengarang'];?></td>
                        <td><?= $sqlkeluar['tahun'];?></td>
                        <td><?php 
                            $qcatg = mysqli_query($config, "select * from tb_catg_buku where id_catg = '".$sqlkeluar['catg_buku']."'");
                            $catg = mysqli_fetch_array($qcatg);
                            echo $catg['nama_catg'];
                        ?></td>
                        <td><?= $sqlkeluar['jumlah'];?> buku</td>
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
                    <th>Kategori</th>
                    <th>Jumlah</th>
                  </tr>
                  </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>