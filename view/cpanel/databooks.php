<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-info">
                <h5>DATABOOKS</h5>
                <a href="?page=import_excel" class="float-right"><i class="fas fa-file-export"></i> Import Excel</a>
            </div>
            <div class="card-body">
            <table id="example1" class="table table-sm table-bordered table-striped display">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Img</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no = 1;
                  $books = mysqli_query($config, "select * from tb_buku");
                  while ($sqlbooks = mysqli_fetch_array($books)) { ?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td><?php echo "<img src='dist/cover/".$sqlbooks['img']."' width='100' height='100'>" ?></td>
                        <td><?= $sqlbooks['no_buku'];?></td>
                        <td><?= $sqlbooks['judul'];?></td>
                        <td><?= $sqlbooks['pengarang'];?></td>
                        <td><?= $sqlbooks['tahun'];?></td>
                        <td><?php 
                            $qcatg = mysqli_query($config, "select * from tb_catg_buku where id_catg = '".$sqlbooks['catg_buku']."'");
                            $catg = mysqli_fetch_array($qcatg);
                            echo $catg['nama_catg'];
                        ?></td>
                        <td><?= $sqlbooks['jumlah'];?> buku</td>
                        <td><a href="?page=edit_databooks&books=<?= $sqlbooks['no_database']; ?>"><i class="fas fa-edit"></i></a>
                        || <a href="view/cpanel/proses/delete_buku.php?id=<?= $sqlbooks['no_database']; ?>" onclick="return confirm('Data dengan Id : <?= $sqlbooks['no_database']; ?> akan dipindahkan ke sampah! Anda yakin?')"><i class="fas fa-trash-alt"></i></a>  
                      </td>
                    </tr>
                  <?php }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>No</th>
                  <th>Img</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>