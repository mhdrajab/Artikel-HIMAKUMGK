<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Website Artikel HIMAKUM Graha Kirana</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Website Artikel HIMAKUM</h1></header>
    <main>
        <h2>Artikel Terbaru Segera Hadir</h2>
        <?php
        $sql = "SELECT id, judul, LEFT(konten, 150) AS ringkasan FROM artikel ORDER BY id DESC";
        $result = mysqli_query($koneksi, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='artikel-preview'>";
                echo "<h3><a href='artikel.php?id=" . $row["id"] . "'>" . $row["judul"] . "</a></h3>";
                echo "<p>" . htmlspecialchars($row['ringkasan']) . "...</p>";
                echo "<a href='artikel.php?id=" . $row["id"] . "' class='btn-baca'>Baca Selengkapnya</a>";
                echo "</div>";
            }
        } else {
            echo "<p>Belum ada artikel untuk ditampilkan.</p>";
        }
        ?>
    </main>
</body>
</html>