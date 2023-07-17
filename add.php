<!DOCTYPE html>
<html>

<head>
    <title>Add new car (SIBA Dynamics)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1>Add Car</h1>

        <?php
        include 'conect.php';

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $make = $_POST["make"];
            $model = $_POST["model"];
            $year = $_POST["year"];
            $color = $_POST["color"];
            $price_per_day = $_POST["price_per_day"];
            $availability_status = isset($_POST["availability_status"]) ? 1 : 0;

            $sql = "INSERT INTO cars (make, model, year, color, price_per_day, availability_status)
                    VALUES ('$make', '$model', '$year', '$color', '$price_per_day', '$availability_status')";

            if ($conn->query($sql) === TRUE) {
                echo "<div class=\"alert alert-success\">New car added successfully!</div>";
            } else {
                echo "<div class=\"alert alert-danger\">Error: " . $sql . "<br>" . $conn->error . "</div>";
            }
        }
        ?>

        <form method="post" action="add.php" class="mt-4">
            <div class="form-group">
                <input type="text" name="make" placeholder="Make" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="model" placeholder="Model" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="year" placeholder="Year" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="color" placeholder="Color" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="number" name="price_per_day" placeholder="Price per Day" class="form-control" required>
            </div>
            <div class="form-check">
                <input type="checkbox" name="availability_status" value="1" class="form-check-input" checked>
                <label class="form-check-label">Available</label>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
            <a href="index.php" class="btn btn-success">Home</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>