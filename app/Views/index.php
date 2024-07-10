<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Makan D'Labor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

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

<body>
    <nav class="navbar bg-info" style="background: linear-gradient(to right, #b8c0ff, #bbd0ff);font-family: 'Poppins', sans-serif;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold fst-italic fs-3 ms-3">RUMAH MAKAN D'LABOR</a>
            <form method="post" class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search Nama Pelanggan" aria-label="Search" name="cari">
                <button type="submit" class="btn btn-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </form>
        </div>
    </nav>
    <?php
    // Koneksi ke database
    include 'koneksi.php';
    //Tabel Makanan
    $sql = "SELECT * FROM data_makanan WHERE jenisMenu='Makanan' ORDER BY idMenu ASC";
    $result_makanan = $connection->query($sql);
    //Tabel Minuman
    $sql = "SELECT * FROM data_makanan WHERE jenisMenu='Minuman' ORDER BY idMenu ASC";
    $result_minuman = $connection->query($sql);

    ?>
    <!-- Tabel List Menu -->
    <div class="row mt-5 ms-5 me-4" style="font-family: 'Poppins', sans-serif;">
    <!-- Tabel Makanan -->
        <div class="col-md-6">
            <h2 class="text-justify mb-4"><b>List Menu Makanan</b></h2>
            <table class="table" style="font-size: 14px; width:600px;">
                <thead style="background: linear-gradient(to right, #b8c0ff, #c8b6ff);">
                    <tr>
                        <th>ID</th>
                        <th>Jenis Menu</th>
                        <th>Nama Menu</th>
                        <th>Harga Menu</th>
                        <th>Stok Menu</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result_makanan) > 0) {
                        while ($row = $result_makanan->fetch_assoc()) {
                            echo "<tr>
                          <td>$row[idMenu]</td>
                          <td>$row[jenisMenu]</td>
                          <td>$row[namaMenu]</td>
                          <td>$row[hargaMenu]</td>
                          <td>$row[stokMenu]</td>
                          <td>
                              <a class='btn btn-info btn-sm' href='edit_menu.php?idMenu=$row[idMenu]&jenisMenu=$row[jenisMenu]&namaMenu=$row[namaMenu]&hargaMenu=$row[hargaMenu]&stokMenu=$row[stokMenu]'>Edit</a>
                              <a class='btn btn-danger btn-sm' href='delete_menu.php?idMenu=$row[idMenu]'>Delete</a>
                          </td>
                          </tr>
                        ";
                        }
                    } else {
                        echo "<tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <h5 id="jumlah-mahasiswa">Jumlah Menu Makanan : <?php $jml_row = mysqli_num_rows($result_makanan);
                                                            echo "" . $jml_row ?></h5>
            <a class="btn btn-success mb-3 py-2 mt-4" href="create_menu.php" role="button">+ Tambah Menu +</a>
        </div>
        <!-- Tabel Minuman -->
        <div class="col-md-6">
            <h2 class="text-justify mb-4"><b>List Menu Minuman</b></h2>
            <table class="table" style="font-size: 14px; width:600px;">
                <thead style="background: linear-gradient(to right, #b8c0ff, #c8b6ff);">
                    <tr>
                        <th>ID</th>
                        <th>Jenis Menu</th>
                        <th>Nama Menu</th>
                        <th>Harga Menu</th>
                        <th>Stok Menu</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result_minuman) > 0) {
                        while ($row = $result_minuman->fetch_assoc()) {
                            echo "<tr>
                          <td>$row[idMenu]</td>
                          <td>$row[jenisMenu]</td>
                          <td>$row[namaMenu]</td>
                          <td>$row[hargaMenu]</td>
                          <td>$row[stokMenu]</td>
                          <td>
                              <a class='btn btn-info btn-sm' href='edit_menu.php?idMenu=$row[idMenu]&jenisMenu=$row[jenisMenu]&namaMenu=$row[namaMenu]&hargaMenu=$row[hargaMenu]&stokMenu=$row[stokMenu]'>Edit</a>
                              <a class='btn btn-danger btn-sm' href='delete_menu.php?idMenu=$row[idMenu]'>Delete</a>
                          </td>
                          </tr>
                        ";
                        }
                    } else {
                        echo "<tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <h5 id="jumlah-mahasiswa">Jumlah Menu Minuman : <?php $jml_row = mysqli_num_rows($result_minuman); echo "" . $jml_row ?></h5>
        </div>
    </div>
    <!-- Tabel Transaksi -->
    <?php
    // Jika tombol "Cari" diklik
    if (isset($_POST['cari'])) {
        $cari = $_POST['cari'];
        $sql1 = "SELECT * FROM data_transaksi WHERE nama LIKE '%$cari%' ORDER BY idTransaksi ASC"; // Query pencarian data
    } else {
        $sql1 = "SELECT * FROM data_transaksi ORDER BY idTransaksi ASC"; // Jika belum mencari, tampilkan semua data
    }
    $result2 = $connection->query($sql1);
    ?>
    <div class="mt-5 ms-5 me-4" style="font-family: 'Poppins', sans-serif;">
        <h2 class="text-justify mb-4"><b>DAFTAR TRANSAKSI</b></h2>
        <table class="table" style="font-size: 14px; width:1200px;">
            <thead style="background: linear-gradient(to right, #b8c0ff, #c8b6ff);">
                <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Meja</th>
                    <th>Nama Pelanggan</th>
                    <th>Menu</th>
                    <th>Jumlah Pesanan</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                    <th>Metode Bayar</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result2) > 0) {
                    while ($row = $result2->fetch_assoc()) {
                        echo "<tr>
                          <td>$row[idTransaksi]</td>
                          <td>$row[tanggal]</td>
                          <td>$row[noMeja]</td>
                          <td>$row[nama]</td>
                          <td>$row[menu]</td>
                          <td>$row[jumlahMenu]</td>
                          <td>$row[harga]</td>
                          <td>$row[totalHarga]</td>
                          <td>$row[metodeBayar]</td>
                          <td>$row[status]</td>
                          <td>
                              <a class='btn btn-info btn-sm' href='edit_transaksi.php?idTransaksi=$row[idTransaksi]&tanggal=$row[tanggal]&noMeja=$row[noMeja]&nama=$row[nama]&menu=$row[menu]&jumlahMenu=$row[jumlahMenu]&harga=$row[harga]&totalHarga=$row[totalHarga]&metodeBayar=$row[metodeBayar]&status=$row[status]'>Edit</a>
                              <a class='btn btn-danger btn-sm' href='delete_transaksi.php?idTransaksi=$row[idTransaksi]'>Delete</a>
                          </td>
                          </tr>
                        ";
                    }
                } else {
                    echo "<tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      </tr>";
                }
                ?>
            </tbody>
        </table>
        <h5 id="jumlah-mahasiswa">Jumlah Transaksi : <?php $jml_row = mysqli_num_rows($result2);
                                                        echo "" . $jml_row ?></h5>
        <a class="btn btn-success mb-3 py-2 mt-4" href="create_transaksi.php" role="button">+ Tambah Transaksi +</a>
    </div>
</body>

</html>