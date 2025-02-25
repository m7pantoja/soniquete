<?php
include 'includes/config.php';

$query = "SELECT * FROM articles ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles | Soniquete</title>
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/articles.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="assets/icons/favicon.ico">
</head>
<body>

    <header>
        <h1>Soniquete</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="articles.php">Articles</a></li>
                <li><a href="artists.php">Artists</a></li>
                <li><a href="aboutus.html">About Us</a></li>
            </ul>
        </nav>
    </header>

    <div class="articles-container">
        <h1>Articles</h1>
        <div class="articles-grid">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='article'>";
                echo "<img src='" . $row['img'] . "' alt='" . $row['title'] . "'>";
                echo "<div class='article-content'>";
                echo "<h2><a href='article.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h2>";
                echo "<p>" . substr($row['content'], 0, 120) . "...</p>";
                echo "<a href='article.php?id=" . $row['id'] . "' class='read-more'>Read more</a>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Soniquete Digital Magazine. All Rights Reserved.</p>
    </footer>

</body>
</html>
