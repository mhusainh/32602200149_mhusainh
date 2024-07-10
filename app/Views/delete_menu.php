<?php
    include "koneksi.php";

    if(isset($_GET["idMenu"])){
        $id = $_GET["idMenu"];

        //Delete data
        $sql = "DELETE FROM data_makanan WHERE idMenu = '$id'";
        $connection->query($sql);

        header("location: index.php");
        exit;

    }
?>