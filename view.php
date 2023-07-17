<!-- view.php -->
<div class="container mt-4">
    <h2>Available Cars</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Color</th>
                <th>Price per Day</th>
                <th>Availability Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM cars";
            $result = $conn->query($sql);

            if ($result === false) {
                echo "<tr><td colspan='7' class='text-center'>Error executing the query: " . $conn->error . "</td></tr>";
            } else {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["make"] . "</td>";
                        echo "<td>" . $row["model"] . "</td>";
                        echo "<td>" . $row["year"] . "</td>";
                        echo "<td>" . $row["color"] . "</td>";
                        echo "<td>" . $row["price_per_day"] . "</td>";
                        echo "<td>" . ($row["availability_status"] ? "Available" : "Rented") . "</td>";
                        echo "<td>";
                        echo "<a href='?action=edit&id=" . $row["id"] . "' class='btn btn-primary btn-sm'>Edit</a> ";
                        echo "<a href='?action=delete&id=" . $row["id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this car?\")'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No cars available in the inventory.</td></tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>