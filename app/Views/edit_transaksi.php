<?php
include "koneksi.php";

$id = $_GET["idTransaksi"];
$tanggal = $_GET["tanggal"];
$no = $_GET["noMeja"];
$nama = $_GET["nama"];
$menu = $_GET["menu"];
$jml = $_GET["jumlahMenu"];
$harga = $_GET["harga"];
$bayar = $_GET["metodeBayar"];
$status = $_GET["status"];
$errorMessage = "";
$successMessage = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $no = $_POST['no'];
    $nama = $_POST['nama'];
    $menu = $_POST['menu'];
    $jml = $_POST['jml'];
    $harga = $_POST['harga'];
    $bayar = $_POST['bayar'];
    $status = $_POST['status'];

    do {
        if (empty($id) || empty($no) || empty($tanggal)  || empty($nama) || empty($menu) || empty($jml) || empty($harga) || empty($bayar) || empty($status)) {
            $errorMessage = "Semua di isi lah, ehehe";
            break;
        }
        $total = $harga * $jml;
        //Tambah data ke database
        $sql = "UPDATE data_transaksi SET idTransaksi='$id', tanggal='$tanggal ', noMeja='$no', nama='$nama', menu='$menu', jumlahMenu='$jml', harga='$harga', totalHarga='$total',metodeBayar='$bayar', status='$status' WHERE idTransaksi='$id'";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Salah query" . $connection->connect_error;
            break;
        }

        $id = "";
        $tanggal = "";
        $no = "";
        $nama = "";
        $menu = "";
        $jml = "";
        $harga = "";
        $total = "";
        $bayar = "";
        $status = "";

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
    <title>Edit Data</title>
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
        <div class="card mb-5 p-5 shadow" style="height:51rem;width: 43rem; margin-top: 4rem;">
            <form method="post" action="">
                <h2 class="pt-3 py-2"><b>Form Transaksi Pesanan</b></h2>
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
                <div class="row g-2">
                    <div class="col-md">
                        <label for="exampleInputTanggalLahir" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="Tanggal" name="tanggal" value="<?php echo $tanggal; ?>">
                    </div>
                    <div class="col-md">
                        <label for="exampleInputNim" class="form-label">No Meja</label>
                        <div class="mb-3">
                            <input type="number" class="form-control" id="no" name="no" value="<?php echo $no; ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputNama" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="Nama" name="nama" value="<?php echo $nama; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputKotaAsal" class="form-label">Menu</label>
                    <input type="text" class="form-control" id="menu" name="menu" value="<?php echo $menu; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputNamaOrtu" class="form-label">Jumlah Pesanan</label>
                    <input type="number" class="form-control" id="Jumlah" name="jml" value="<?php echo $jml; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputAlamat" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $harga; ?>">
                </div>
                <label for="exampleInputAlamat" class="form-label">Metode Pembayaran</label>
                <div class="row g-2">
                    <div class="col-md">
                        <input class="form-check-input" type="radio" name="bayar" id="flexRadio1" <?php if ($bayar == 'Cash') echo 'checked'; ?> value="Cash">
                        <label class="form-check-label" for="flexRadio1">Cash</label>
                    </div>
                    <div class="col-md">
                        <input class="form-check-input" type="radio" name="bayar" id="flexRadio2" <?php if ($bayar == 'Debit') echo 'checked'; ?> value="Debit">
                        <label class="form-check-label" for="flexRadio2">Debit</label>
                    </div>
                </div>
                <div class="mt-3 mb-3">
                    <label for="exampleInputStatus" class="form-label">Status</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option disabled="disabled" selected="selected">Status Pembayaran</option>
                        <option class="form-control" id="statusLunas" <?php if ($status == 'Lunas') echo 'selected'; ?>>Lunas</option>
                        <option class="form-control" id="statusBelumLunas" <?php if ($status == 'Belum Lunas') echo 'selected'; ?>>Belum Lunas</option>
                    </select>
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