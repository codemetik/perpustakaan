<?php 
require_once('../../config.php');
?>
<table id='table_now' class="table table-sm table-striped table-bordered display">
    <thead>
        <tr>
            <th width="1%">No</th>
            <th>Img</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $keyword="";
        if (isset($_POST['search'])) {
            $keyword = $_POST['search'];
        }

        $query = mysqli_query($config,"SELECT * FROM tb_buku WHERE judul LIKE '%".$keyword."%' OR pengarang LIKE '%".$keyword."%' OR penerbit LIKE '%".$keyword."%' ORDER BY no_buku DESC");
        $hitung_data = mysqli_num_rows($query);
        if ($hitung_data > 0) {
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td>
                    <?php echo "<img src='dist/cover/".$data['img']."' width='100' height='100'>"; ?>
                    </td>
                    <td><?php echo $data['judul']; ?></td>
                    <td><?php echo $data['pengarang']; ?></td>
                    <td><?php echo $data['penerbit']; ?></td>
                    <td><?php echo $data['tahun']; ?></td>
                </tr>
            <?php } } else { ?> 
                <tr>
                    <td colspan='4' class="text-center">Tidak ada data ditemukan</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>