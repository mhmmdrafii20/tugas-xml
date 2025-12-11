<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Table Data Mahasiswa</title>
</head>
<body>
<!-- Navigasi -->
<?php include './navigation.php'; ?>
<!-- Footer -->
<?php include './footer.php'; ?> 

<h2 class="main-heading">Data Barang</h2>
<a href="form-tambah.php" class="btnTambah">Tambah Barang</a>

<?php
// =============== MESSAGE BOX ===============
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];

    $messageText = "";
    $messageClass = "";

    if ($msg === "created") {
        $messageText = "Data berhasil ditambahkan!";
        $messageClass = "alert-success";
    } 
    else if ($msg === "updated") {
        $messageText = "Data berhasil diperbarui!";
        $messageClass = "alert-info";
    }
    else if ($msg === "deleted") {
        $messageText = "Data berhasil dihapus!";
        $messageClass = "alert-danger";
    }

    echo "
    <div class='alert $messageClass' id='alertBox'>
        <span>$messageText</span>
        <button class='alert-close' id='alertClose'>&times;</button>
    </div>";
}
// ===========================================
?>


<!-- Search Bar -->
<?php include './search-bar.php'; ?> 

<div class="table-wrapper">
    <table id="table">

    </table>
</div>

<script src="./main.js" type="module"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const alertBox = document.getElementById("alertBox");
        const alertClose = document.getElementById("alertClose");

        if (alertClose) {
            alertClose.addEventListener("click", () => {
                alertBox.classList.add("fade-out");
                setTimeout(() => {
                    alertBox.style.display = "none";
                }, 400);
            });
        }
    });
</script>
</body>
</html>