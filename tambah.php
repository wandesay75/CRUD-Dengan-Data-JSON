<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Project Besar - VSGA</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>

<?php
// Periksa apakah ada data yang dikirim melalui metode POST
if(isset($_POST['save'])){
    // Baca data dari inputan form
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $matakuliah = $_POST['matakuliah'];
    $tugas = $_POST['tugas'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];

    // Menghitung nilai rata-rata
    $nilai = round(($tugas + $uts + $uas) / 3);

    // Menentukan grade berdasarkan nilai
    if ($nilai >= 90){
        $grade = "A";
    } else if ($nilai >= 75 ) {
        $grade = "B";
    } else if ($nilai >= 62) {
        $grade = "C";
    } else if ($nilai >= 45) {
        $grade = "D";
    } else if ($nilai >= 0) {
        $grade = "E";
    } else {
        echo "nilai belum di input";
    }
    // Membuat array data
    $data = [
        'nama' => $nama,
        'kelas' => $kelas,
        'matakuliah' => $matakuliah,
        'tugas' => $tugas,
        'uts' => $uts,
        'uas' => $uas,
        'nilai' => $nilai,
        'grade' => $grade
    ];

    // Membaca data JSON yang sudah ada
    $jsonData = file_get_contents('data.json');
    $dataJson = json_decode($jsonData, true);

    // Menambahkan data baru ke array data JSON
    $dataJson[] = $data;

    // Mengubah data menjadi format JSON
    $newJsonData = json_encode($dataJson, JSON_PRETTY_PRINT);

    // Menyimpan data ke file JSON
    file_put_contents('data.json', $newJsonData);

    // Mengarahkan pengguna kembali ke halaman utama
    header('location: index.php');
}
    
?>

<!-- Container tambah data -->
<div class="container">
    <h1 class="page-header text-center">Tambah Data Nilai Mahasiswa</h1>
    <hr>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-8">

        <form method="POST">
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Mahasiswa" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Kelas</label>
                <div class="col-sm-10">

                <input class="form-check-input" type="radio" name="kelas" id="kelas" value="4A" required>
                <label class="form-check-label" for="flexRadioDefault1">
                4A
                </label>

                <input class="form-check-input" type="radio" name="kelas" id="kelas" value="4B" required>
                <label class="form-check-label" for="flexRadioDefault1">
                4B
                </label>

                <input class="form-check-input" type="radio" name="kelas" id="kelas" value="4C" required>
                <label class="form-check-label" for="flexRadioDefault1">
                4C
                </label>

                <input class="form-check-input" type="radio" name="kelas" id="kelas" value="4D" required>
                <label class="form-check-label" for="flexRadioDefault1">
                4D
                </label>

                <input class="form-check-input" type="radio" name="kelas" id="kelas" value="4E" required>
                <label class="form-check-label" for="flexRadioDefault1">
                4E
                </label>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Matakuliah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="matakuliah" name="matakuliah" placeholder="Masukkan Nama Matakuliah" required>
                </div>
            </div>    
 

            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Nilai Tugas</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="tugas" name="tugas" placeholder="Masukkan Nilai Tugas" required>
                </div>
            </div>    
 
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Nilai UTS</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="uts" name="uts" placeholder="Masukkan Nilai UTS" required>
                </div>
            </div>    
 
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Nilai UAS</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="uas" name="uas" placeholder="Masukkan Nilai UAS" required>
                </div>
            </div>

            <input type="hidden" id="nilai" name="nilai" value="<?php echo $nilai; ?>">
            <input type="hidden" id="grade" name="grade" value="<?php echo $grade; ?>">

            <a href="index.php" class="btn bg-warning text-white">Kembali</a>
            <input type="submit" name="save" value="Simpan" class="btn btn-primary">
        </form>
        </div>
        <div class="col-5"></div>
    </div>
</div>    
<!--  End container tambah data -->


</body>
</html>