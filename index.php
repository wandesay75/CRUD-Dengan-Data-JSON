<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Project Besar - VSGA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="DataTables/datatables.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/6a685fa3aa.js" crossorigin="anonymous"></script>
</head>
<body>

<!-- Container tabel data -->
<div class="container">
    <h1 class="page-header text-center">Project Mengoperasikan CRUD Dengan Data JSON</h1>
    <hr>
    <div class="row">
        <div class="col-12">
            <a href="tambah.php" class="btn btn-primary">Tambah Data</a>
            <table id="example" class="table table-bordered table-striped table-hover text-center" style="margin-top:20px;" border="1px">
                <thead>
                    <th>No.</th>
                    <th>Nama Mahasiswa</th>
                    <th>Kelas</th>
                    <th>Matakuliah</th>
                    <th>Tugas</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Total Nilai</th>
                    <th>Grade</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php

                        // $file = "data.json";
                        // Mengambil data dari data.json
                        $dataJSON = file_get_contents('data.json');
                        // Decode data json kedalam data array php
                        $data = json_decode($dataJSON, true);

                        $id = 0;
                        $index = 1;
                        foreach($data as $hasil){
                            echo "
                                <tr>
                                    <td>".$index."</td>
                                    <td>".$hasil['nama']."</td>
                                    <td>".$hasil['kelas']."</td>
                                    <td>".$hasil['matakuliah']."</td>
                                    <td>".$hasil['tugas']."</td>
                                    <td>".$hasil['uts']."</td>
                                    <td>".$hasil['uas']."</td>
                                    <td>".$hasil['nilai']."</td>
                                    <td>".$hasil['grade']."</td>
                                    <td>
                                        <a href='ubah.php?index=".$id."' class='btn btn-success btn-sm'>Ubah</a>
                                        <a onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")' 
                                        href='hapus.php?index=".$id."' class='btn btn-danger btn-sm'>Hapus</a>
                                    </td>
                                </tr>
                            ";

                            $id++;
                            $index++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End container tabel data -->

<!-- Footer -->
<footer>
    <div class="container text-center" style="margin-top:50px;">
        <hr>
        <h4>DEVELOPER :</h4>
        <img src="img/alvin.jpg" class="rounded-circle shadow-sm" alt="AkuGanteng" draggable="false" width="128" height="129">
        <h5>Alvin Austin</h5>
        <p>Graphic Designer | Junior Programmer</p>
        <a href="https://github.com/wandesay75" target="_blank"><i style="color: black; font-size:20px;"class="fa-brands fa-github"></i></a>
        <a href="https://www.linkedin.com/in/wandesay/" target="_blank"><i style=" font-size:20px;"class="fa-brands fa-linkedin"></i></a>
        <hr>
    </div>
</footer>
<!-- End Footer -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<!-- Script datatable.net -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script>new DataTable('#example');</script>
<!-- End script datatable.net -->
</body>
</html>