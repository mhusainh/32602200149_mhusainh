<?php
include "koneksi.php";

$id = $_GET["idMenu"];
$nama = $_GET["namaMenu"];
$jenisMenu = $_GET["jenisMenu"];
$harga = $_GET["hargaMenu"];
$stok = $_GET["stokMenu"];

$errorMessage = "";
$successMessage = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    do {
        if (empty($id) || empty($nama) || empty($harga)  || empty($stok)) {
            $errorMessage = "Semua di isi lah, ehehe";
            break;
        }
        //Tambah data ke database
        $sql = "UPDATE data_makanan SET idMenu='$id', namaMenu='$nama ', hargaMenu='$harga', stokMenu='$stok' WHERE idMenu='$id'";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Salah query" . $connection->connect_error;
            break;
        }

        $id = "";
        $nama = "";
        $harga = "";
        $stok = "";

        $successMessage = "Berhasil mengedit data";
        header("location: index.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Poppins&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    /* Style untuk layar yang lebih kecil dari 768px (misalnya smartphone) */
    @media only screen and (max-width: 768px) {
        body {
            width: 100%;
            height: auto;
        }
    }

    /* Style untuk layar yang lebih besar dari 768px (misalnya desktop) */
    @media only screen and (min-width: 768px) {
        body {
            width: 100%;
            height: 100vh;
        }
    }
</style>

<body style="background :linear-gradient(to right, #fbf8cc, #fde4cf) ;">
    <div class="container" style="display:flex; justify-content: center; align-items: center;font-family: 'Poppins', sans-serif;">
        <div class="card mb-5 p-5 shadow" style="height:34rem;width: 43rem; margin-top: 4rem;">
            <form method="post" action="">
                <h2 class="pt-3 py-2"><b>Form Menu</b></h2>
                <?php
                if (!empty($errorMessage)) {
                    echo "
                    <div class ='alert alert-warning alert-dismissible fade-show' roles='alert'>
                        <strong>$errorMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                    ";
                }
                ?>
                <div class="mt-3 mb-3">
                    <label for="exampleInputStatus" class="form-label">Jenis Menu</label>
                    <select class="form-select" aria-label="Default select example" name="jenisMakanan" value="<?php echo $jenisMenu; ?>">
                        <option disabled="disabled" selected="selected">Jenis Makanan</option>
                        <option class="form-control" id="statusMakanan" <?php if ($jenisMenu == 'Makanan') echo 'selected'; ?>>Makanan</option>
                        <option class="form-control" id="statusMinuman" <?php if ($jenisMenu == 'Minuman') echo 'selected'; ?>>Minuman</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputNama" class="form-label">Nama Menu</label>
                    <input type="text" class="form-control" id="Nama" name="nama" value="<?php echo $nama; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputNamaOrtu" class="form-label">Harga Menu</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $harga; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputAlamat" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="<?php echo $stok; ?>">
                </div>

                <?php
                if (!empty($successMessage)) {
                    echo "
                    <div class='row' mb-3>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class ='alert alert-warning alert-dismissible fade-show' roles='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                    ";
                }
                ?>
                <button type="submit" class="btn btn-primary mt-3 float-end">Submit</button>
                <a class="btn btn-outline-danger mt-3 me-3 float-end" href="index.php" role="button">Back</a>
            </form>
        </div>
    </div>
</body>

</html>