<?php
if ($_GET['id_user']) {
$row = mysqli_query($config, "select * from tb_user where id = '".$_GET['id_user']."'");
$id_user = mysqli_fetch_array($row);
$durl = mysqli_num_rows($row);
if ($durl > 0) {
?>
<div class="card">
    <div class="card-header bg-info">
        <h5>Setelan User</h5>
    </div>
    <div class="card-body">
    <form action="view/cpanel/edit/proses_edit_user.php" method="post">
        <div class="row">
            <div class="col-sm-6">
                <table class="table table-sm display">
                    <tr>
                        <th>ID User</th>
                        <td><input type="text" name="id" class="form-control" value="<?= $id_user['id'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td><input type="text" name="username" class="form-control" value="<?= $id_user['username'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input type="text" name="password" class="form-control" value="<?= $id_user['password'] ?>"></td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap User</th>
                        <td><input type="text" name="nama_lengkap" class="form-control" value="<?= $id_user['nama_lengkap'] ?>"></td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-12">
                <button type="submit" name="save" class="btn bg-info"><i class="fas fa-save"></i> Save</button>
            </div>
        </div>
    </form>
    </div>
</div>
<?php
}else{ echo '<meta http-equiv="refresh" content="0; url=?page=databooks">';
}
}else if(isset($_GET['books']) == null){
    echo '<meta http-equiv="refresh" content="0; url=?page=databooks">';
}
?>