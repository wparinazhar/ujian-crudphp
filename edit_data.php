<div class="row">
    <?php
    // Aktifkan laporan kesalahan PHP
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Sambungkan ke database
    include "conn.php";

    // Ambil ID alumni dari parameter URL
    $id_ujian = $_GET['id'];

    // Cek apakah data alumni ada dalam database
    $query_data = mysqli_query($conn, "SELECT * FROM siswa WHERE id_ujian='$id_ujian'");
    $cek_data = mysqli_fetch_array($query_data);

    // Cek apakah formulir telah disubmit
    if (isset($_POST['submit'])) {
        // Sambungkan ke database
        include "conn.php";

        // Retrieve data from the form
        $mata_pelajaran = $_POST['mata_pelajaran'];
        $guru = $_POST['guru'];
        $jumlah_soal = $_POST['jumlah_soal'];
        $waktu = $_POST['waktu'];

        $query = mysqli_query($conn, "SELECT * FROM siswa WHERE id_ujian='$id_ujian'");
        $cek_data = mysqli_fetch_array($query);

        // Query untuk mengupdate data alumni
        $query = "UPDATE siswa SET 
                name='$name', 
                email='$email', 
                phone='$phone', 
                WHERE id_ujian='$id_ujian'";

        // Eksekusi query update
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data anak berhasil diupdate'); window.location.href='table.php&&id=" . $id_ujian . "';</script>";
        } else {
            echo "Gagal memperbarui data: " . mysqli_error($conn);
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@iconbox/iconbox@3.0.0/dist/css/iconbox.min.css">
        <title>Edit Anak</title>
        <style>
            body {
                background-color: #f8f9fa;
            }

            .custom-card {
                border-top: 0;
                border-4: 4px solid #ffc107;
                /* Border color: warning color */
                border-radius: 15px;
            }

            .rounded-box {
                border: 1px solid #dee2e6;
                border-radius: 10px;
                padding: 20px;
                background-color: #ffffff;
            }
        </style>
    </head>

    <body>

        <div class="container mt-5">
            <div class="col-xl-9 mx-auto">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="rounded-box">
                            <form action="table.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <label for="mata_pelajaran" class="col-sm-3 col-form-label">Mata Pelajaran</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="mata_pelajaran" class="form-control" id="mata_pelajaran" value="<?= $cek_data['mata_pelajaran'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="guru" class="col-sm-3 col-form-label">Guru</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="guru" class="form-control" id="guru" value="<?= $cek_data['guru'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="jumlah_soal" class="col-sm-3 col-form-label">Jumlah Soal</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="jumlah_soal" class="form-control" id="jumlah_soal" value="<?= $cek_data['jumlah_soal'] ?>">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="waktu" class="col-sm-3 col-form-label">Waktu</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="waktu" class="form-control" id="waktu" value="<?= $cek_data['waktu'] ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                        <input type="submit" class="btn btn-success" value="Update" name="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>

    </html>