<!DOCTYPE html>
<html>

<head>
    <title>Edit car (SIBA Dynamics)</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php
    include 'conect.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $car_id = $_POST["car_id"];
        $make = $_POST["make"];
        $model = $_POST["model"];
        $year = $_POST["year"];
        $color = $_POST["color"];
        $price_per_day = $_POST["price_per_day"];
        $availability_status = $_POST["availability_status"];

        $sql = "UPDATE cars
                SET make='$make', model='$model', year='$year', color='$color', price_per_day='$price_per_day', 
                availability_status='$availability_status'
                WHERE id='$car_id'";

        if ($conn->query($sql) === TRUE) {
            echo "Car information updated successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $car_id = $_GET["id"];
        $sql = "SELECT * FROM cars WHERE id='$car_id'";
        $result = $conn->query($sql);
        $car_data = $result->fetch_assoc();
    }
    ?>

    <form method="post" action="edit.php" class="container mt-4">
        <input type="hidden" name="car_id" value="<?php echo $car_data["id"]; ?>">
        <div class="form-group">
            <label for="make">Make</label>
            <input type="text" name="make" id="make" class="form-control" value="<?php echo $car_data["make"]; ?>"
                required>
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" class="form-control" value="<?php echo $car_data["model"]; ?>"
                required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="text" name="year" id="year" class="form-control" value="<?php echo $car_data["year"]; ?>"
                required>
        </div>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" name="color" id="color" class="form-control" value="<?php echo $car_data["color"]; ?>"
                required>
        </div>
        <div class="form-group">
            <label for="price_per_day">Price Per Day</label>
            <input type="number" name="price_per_day" id="price_per_day" class="form-control"
                value="<?php echo $car_data["price_per_day"]; ?>" required>
        </div>
        <div class="form-check">
            <input type="checkbox" name="availability_status" id="availability_status" class="form-check-input"
                value="1" <?php if ($car_data["availability_status"] == 1) echo "checked"; ?>>
            <label class="form-check-label" for="availability_status">Available</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Car</button>
        <a href="index.php" class="btn btn-success mt-3">Home</a>
    </form>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>