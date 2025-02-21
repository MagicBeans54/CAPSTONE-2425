<?php
include '../CAPSTONE 24-25/database/db_connection.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>
<style>
header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background: linear-gradient(135deg, #2e7d32, #66bb6a);
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        header .logo a {
            font-size: 28px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        header nav a {
            margin-left: 30px;
            color: white;
            text-decoration: none;
            font-size: 18px;
            text-transform: uppercase;
        }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <header>
        <div class="logo">
            <a href="#">Precast Products</a>
        </div>
        <nav>
            <a href="home.php">Home</a>
            <a href="products.php">Products Details</a>
            <a href="#">Cart</a>
            <a href="contact.html">Contact Us</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <div class="container mt-4">
        <h2 class="text-center">Products</h2>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="images/<?= $row['image'] ?>" class="card-img-top" alt="<?= $row['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['name'] ?></h5>
                            <p class="card-text"><?= $row['description'] ?></p>
                            <p class="card-text"><strong>$<?= $row['price'] ?></strong></p>
                            <a href="#" class="btn btn-primary">Buy Now</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
