<?php

// $host = "localhost";
// $user = "smkg6671";
// $pass = "smksapra2123";
// $db = "smkg6671_perpustakaan";

$host = "localhost";
$user = "root";
$pass = "";
$db = "smkg6671_perpustakaan";

$config = mysqli_connect($host, $user, $pass, $db) or die ('Could not connect : '. mysqli_connect_error());

date_default_timezone_set('Asia/Jakarta');
?>