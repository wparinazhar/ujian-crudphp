<?php
include "conn.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM siswa WHERE id_ujian='$id'");
echo "<script>window.location.href='table.php';</script>'";
exit;
