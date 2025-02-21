<?php
include '../CAPSTONE 24-25/database/db_connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle CRUD operations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $sql = "INSERT INTO products (name, description, price) VALUES ('$name', '$description', '$price')";
        $conn->query($sql);
    }
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $sql = "UPDATE products SET name='$name', description='$description', price='$price' WHERE id='$id'";
        $conn->query($sql);
    }
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM products WHERE id='$id'";
        $conn->query($sql);
    }
}

// Fetch items from database
$result = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventory Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
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


        </header>
    <div class="container mt-5">
        <h2>Inventory Management</h2>
        <form method="POST" class="mb-3">
            <input type="text" name="name" placeholder="Item Name" required>
            <input type="number" step="0.01" name="price" placeholder="Price" required>
            <input type="text" name="description" placeholder="Description" required>
            <button type="submit" name="add" class="btn btn-primary">Add Item</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['description'] ?></td>
                        <td><?= $row['price'] ?></td>
                        <td>
                            <form method="POST" style="display:inline-block;">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <input type="text" name="name" value="<?= $row['name'] ?>" required>
                                <input type="number" step="0.01" name="price" value="<?= $row['price'] ?>" required>
                                <button type="submit" name="edit" class="btn btn-warning">Edit</button>
                            </form>
                            <form method="POST" style="display:inline-block;">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>