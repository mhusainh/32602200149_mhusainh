<?php
    include "koneksi.php";

    if(isset($_GET["idTransaksi"])){
        $id = $_GET["idTransaksi"];

        //Delete data
        $sql = "DELETE FROM data_transaksi WHERE idTransaksi = $id";
        $connection->query($sql);

        header("location: index.php");
        exit;

    }
?>