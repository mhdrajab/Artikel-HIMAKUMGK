<?php
include 'koneksi.php';
$id_artikel = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id_artikel == 0) {
    die("Artikel tidak valid.");
}
$sql = "SELECT * FROM artikel WHERE id = $id_artikel";
$result = mysqli_query($koneksi, $sql);
$artikel = mysqli_fetch_assoc($result);
if (!$artikel) {
    die("Artikel tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($artikel['judul']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1><a href="index.php">Website Artikel Kampus</a></h1></header>
    <main class="artikel-penuh">
        <h2><?php echo htmlspecialchars($artikel['judul']); ?></h2>
        <small>Oleh: <?php echo htmlspecialchars($artikel['penulis']); ?></small>
        <div class="isi-artikel">
            <?php echo nl2br(htmlspecialchars($artikel['konten'])); ?>
        </div>
    </main>
</body>
</html>