<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conn.php";

    // Retrieve data from the form
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $guru = $_POST['guru'];
    $jumlah_soal = $_POST['jumlah_soal'];
    $waktu = $_POST['waktu'];

    // Insert data into the database (excluding the file path, customize as needed)
    $query = mysqli_query($conn, "INSERT INTO siswa(mata_pelajaran, guru, jumlah_soal, waktu) VALUES ('$mata_pelajaran','$guru','$jumlah_soal','$waktu')");

    if ($query) {
        echo "Data added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
