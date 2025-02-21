<?php
include '../CAPSTONE 24-25/database/db_connection.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <title>Precast Solutions - Home</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #e8f5e9;
        }

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

        .search-filter {
            display: flex;
            justify-content: center;
            padding: 20px;
            background-color: #c8e6c9;
        }

        .search-filter input, .search-filter select {
            padding: 12px;
            margin: 0 10px;
            border-radius: 20px;
            border: 2px solid #388e3c;
            width: 250px;
            font-size: 16px;
        }

        .promo-section {
            text-align: center;
            padding: 40px 20px;
            background-color: #a5d6a7;
            color: #1b5e20;
        }

        .promo-section h2 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .promo-section p {
            font-size: 18px;
        }

        .product-list {
            display: flex;
            overflow-x: auto;
            padding: auto;
            gap: 20px;
            scroll-snap-type: x mandatory;  
        }

        .product {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            min-width: 250px;
            scroll-snap-align: start;
        }

        .product img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .product h3 {
            font-size: 20px;
            margin: 10px 0;
            color: #2e7d32;
        }

        .product p {
            color: #555;
            font-size: 16px;
        }

        .product button {
            background-color: #388e3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        .product button:hover {
            background-color: #1b5e20;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #2e7d32;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <a href="#">Precast Products</a>
        </div>
        <nav>
            <a href="#">Home</a>
            <a href="products.php">Products Details</a>
            <a href="#">Cart</a>
            <a href="contact.html">Contact Us</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <section class="search-filter">
        <input type="text" placeholder="Search for products...">
        <select>
            <option>All Categories</option>
            <option>Fountains</option>
            <option>Garden Ornaments</option>
            <option>Sculptures</option>
            <option>Statues</option>
        </select>
    </section>

    <section class="promo-section">
        <h2>Quality Precast Products</h2>
        <p>Order now!</p>
        <p>Get the best materials for your construction needs at unbeatable prices!</p>
    </section>

    <section class="product-list">
    <div class="container mt-4">
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
    </section>

    <footer>
        <p>&copy; 2025 House of Precast E-commerce - All Rights Reserved</p>
    </footer>
</body>
</html>
