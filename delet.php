<!DOCTYPE html>
<html>

<head>
    <title>Delete Car - Car Rental Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1>Delete Car</h1>

        <?php
        include 'conect.php';

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $car_id = $_POST["car_id"];

            $sql = "DELETE FROM cars WHERE id='$car_id'";

            if ($conn->query($sql) === TRUE) {
                echo "<div class=\"alert alert-success\">Car deleted successfully!</div>";
            } else {
                echo "<div class=\"alert alert-danger\">Error: " . $sql . "<br>" . $conn->error . "</div>";
            }
        } else {
            $car_id = $_GET["id"];
        }
        ?>

        <form method="post" action="delet.php" class="mt-4">
            <input type="hidden" name="car_id" value="<?php echo $car_id; ?>">
            <p>Are you sure you want to delete this car?</p>
            <button type="submit" class="btn btn-danger">Delete Car</button>
            <a href="index.php" class="btn btn-success">Home</a>
        </form>
    </div>

    <script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>