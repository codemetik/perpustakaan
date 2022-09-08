<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Pinjam Buku</h5>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      
      <!-- /.card-header -->
      <div class="card-footer">
        <div class="row">
          <div class="col-sm-4 col-6">
            <div class="description-block border-right">
              <span class="description-percentage text-success"><i class="fas fa-book"></i></span>
              <h5 class="description-header">BUKU PRODUKTIF</h5>
              <a href="#" data-toggle="modal" data-target="#modal-produktif"><p>Show <i class="fas fa-arrow-right"></i></p></a>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 col-6">
            <div class="description-block border-right">
              <span class="description-percentage text-warning"><i class="fas fa-book"></i></span>
              <h5 class="description-header">BUKU NON PRODUKTIF</h5>
              <a href="#" data-toggle="modal" data-target="#modal-non-produktif"><p>Show <i class="fas fa-arrow-right"></i></p></a>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 col-6">
            <div class="description-block">
              <span class="description-percentage text-success"><i class="fas fa-book"></i></span>
              <h5 class="description-header">BUKU UMUM</h5>
              <a href="#" data-toggle="modal" data-target="#modal-umum"><p>Show <i class="fas fa-arrow-right"></i></p></a>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
  <!-- /.row -->

<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
      <input type="text" class="form-control" id="search" name="search" placeholder="Cari disini..." autofocus>
      </div>
      <div class="card-body">
      <div id="hasil"></div>
      </div>
    </div>
  </div>
</div>


  <div class="modal fade" id="modal-produktif">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">BUKU PRODUKTIF</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
                $query = mysqli_query($config, "select * from tb_buku where catg_buku = '1'");
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
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-non-produktif">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">BUKU NON PRODUKTIF</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <table id="table_nonproduktif" class="table table-sm table-bordered table-striped display">
                  <thead>
                  <tr>
                    <th>No Db</th>
                    <th>Kode buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $query = mysqli_query($config, "select * from tb_buku where catg_buku = '2'");
                  while($sql = mysqli_fetch_array($query)) { ?>
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
                    <th>Kode buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                  </tr>
                  </tfoot>
                </table>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-umum">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">BUKU UMUM</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <table id="table_umum" class="table table-sm table-bordered table-striped display">
                  <thead>
                  <tr>
                    <th>No Db</th>
                    <th>Kode buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $query = mysqli_query($config, "select * from tb_buku where catg_buku = '3'");
                  while($sql = mysqli_fetch_array($query)) { ?>
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
                    <th>Kode buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                  </tr>
                  </tfoot>
                </table>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->