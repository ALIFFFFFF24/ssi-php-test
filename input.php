<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menghitung IPK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <form method="POST" action="tambah.php">
                    <div class="mb-3">
                        <label for="nm_mk" class="form-label">Nama Mata Kuliah</label>
                        <input type="text" class="form-control" id="nm_mk" name="nm_mk">
                    </div>
                    <div class="mb-3">
                        <label for="sks" class="form-label">SKS</label>
                        <input type="number" class="form-control" id="sks" name="sks">
                    </div>
                    <div class="mb-3">
                        <label for="na" class="form-label">Grade </label>
                        <select class="form-select" name="na">
                            <option selected>Masukkan Grade</option>
                            <option value="4">A</option>
                            <option value="3">B</option>
                            <option value="2">C</option>
                            <option value="1">D</option>
                            <option value="0">E</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-5">
            <table border="2" class="table">
                <tr class="text-center">
                    <th>No.</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Nilai Akhir</th>

                </tr>
                <?php
                require 'koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi, "select * from ipk");
                while ($d = mysqli_fetch_array($data)) {

                ?>
                    <tr class="text-center">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nm_mk']; ?></td>
                        <td><?php echo $d['sks']; ?></td>
                        <?php if ($d['na'] == 4) {
                            $grade = 'A';
                        } else if ($d['na'] == 3) {
                            $grade = 'B';
                        } else if ($d['na'] == 2) {
                            $grade = 'C';
                        } else if ($d['na'] == 1) {
                            $grade = 'D';
                        } else {
                            $grade = 'E';
                        }
                        ?>
                        <td><?php echo $grade; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <div class="row">
                <div class="col">
                    <h1>IPK : <?php
                                $ipk = 0;
                                require 'koneksi.php';
                                $data = mysqli_query($koneksi, "select round(sum(sks * na)/ sum(sks), 2) AS ipk from ipk");
                                while ($d = mysqli_fetch_array($data)) {
                                    echo  $d['ipk'];
                                }
                                ?></h1>
                </div>
            </div>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>