<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product Submission</title>
</head>
<body>
    <h1>New Product Submission</h1>
    <form method="post">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get form data
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];

        // Validate data (you may add more validation as needed)
        if (empty($name) || empty($description) || empty($price)) {
            echo "<p>Please fill in all fields.</p>";
        } else {
            // Database connection details
            $servername = "35.240.223.118";
            $username = "thitikorn";
            $password = "028962216";
            $dbname = "thitikorn";

            // Create a connection to the database
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare and execute SQL query to insert data into the database
            $sql = "INSERT INTO products (name, description, price) VALUES ('$name', '$description', '$price')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Product submission successful!</p>";
            } else {
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }

            // Close the database connection
            $conn->close();
        }
    }
    ?>
</body>
</html>
