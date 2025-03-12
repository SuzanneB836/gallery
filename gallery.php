<?php include 'db_connect.php'; 

// Pagination settings
$limit = 6; // Items per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Sorting options
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'newest';
$order_by = "id DESC"; // Default sorting (newest first)
if ($sort === "oldest") {
    $order_by = "id ASC";
} elseif ($sort === "a_z") {
    $order_by = "name ASC";
} elseif ($sort === "z_a") {
    $order_by = "name DESC";
}

// Fetch items from database
$sql = "SELECT name, descr, img, owner FROM item ORDER BY $order_by LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $offset, $limit);
$stmt->execute();
$result = $stmt->get_result();

// Fetch total items count for pagination
$total_sql = "SELECT COUNT(*) FROM item";
$total_result = $conn->query($total_sql);
$total_items = $total_result->fetch_row()[0];
$total_pages = ceil($total_items / $limit);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallerij
    </title>

    <link rel="icon" href="media/logo.png" type="image/png">
    <link rel="stylesheet" href="stylesheets/global.css">
    <link rel="stylesheet" href="stylesheets/gallery.css">
    <script src="script.js"></script>
</head>

<body>

    <div class="navigation-container">
        <div class="nav-bar">
            <div class="logo">
                <a href="main.php">
                    <img src="media/logo.png" alt="Logo" class="logo-img">
                    <img src="media/web-name.png" alt="KnuffelGallerij" class="web-name">
                </a>
            </div>
            <div class="nav-items">
                <div class="nav-item">
                    <a href="gallery.php">Gallerij</a>
                </div>
                <div class="nav-item">
                    <a href="upload.php">Uploaden</a>
                </div>
            </div>
        </div>
    </div>

    <div class="title">
        <h2 class="title-text">Gallerij</h2>
    </div>


    <div class="filter">
        <form method="GET">
            <select name="sort" onchange="this.form.submit()">
                <option value="newest" <?= ($sort == 'newest') ? 'selected' : ''; ?>>Nieuwste eerst</option>
                <option value="oldest" <?= ($sort == 'oldest') ? 'selected' : ''; ?>>Oudste eerst</option>
                <option value="a_z" <?= ($sort == 'a_z') ? 'selected' : ''; ?>>A-Z</option>
                <option value="z_a" <?= ($sort == 'z_a') ? 'selected' : ''; ?>>Z-A</option>
            </select>
        </form>
    </div>
    
    <div class="items-container">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="item-card">
                <div class="item-card-img">
                    <img src="<?= htmlspecialchars($row['img']); ?>" alt="<?= htmlspecialchars($row['name']); ?>" class="item-img" onclick="openModal(this.src)">
                </div>
                <div class="item-card-text-cont">
                    <div class="text-cont-name">
                        <h2 class="name"> <?= htmlspecialchars($row['name']); ?></h2>
                    </div>
                    <div class="text-cont-owner">
                        <h3 class="owner">Eigenaar: <?= htmlspecialchars($row['owner']); ?></h3>
                    </div>
                    <div class="text-cont-desc">
                        <p class="desc"> <?= htmlspecialchars($row['descr']); ?></p>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    
    <!-- Pagination -->
    <div class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?page=<?= $i; ?>&sort=<?= $sort; ?>" class="<?= ($i == $page) ? 'active' : ''; ?>"> <?= $i; ?> </a>
        <?php endfor; ?>
    </div>

    <!-- Modal for image preview -->
    <div id="imgModal" class="modal" onclick="closeModal()">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImg">
    </div>

</body>

</html>