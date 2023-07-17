<!DOCTYPE html>
<html>

<head>
    <title>SIBA Dynamics Exam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .mt-5 {
        color: black;
        text-align: center;
        margin-top: 5rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .mt-4 {
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">
            Welcome to Car Rental
        </h1>
        <h5 class="mb-4">
            BSC/WD/21/31/10
        </h5>
        <h5 class="mb-4">
            A.M.H.C.ADHIKARAM
        </h5>
        <br><br><br>
        <?php
        include 'conect.php';
        if (isset($_GET['action'])) {
            $action = $_GET['action'];

            switch ($action) {
                case 'add':
                    include 'add.php';
                    break;
                case 'edit':
                    include 'edit.php';
                    break;
                case 'delete':
                    include 'delet.php';
                    break;
                default:
                    include 'view.php';
            }
        } else {
            include 'view.php';
        }
        ?>
        <br><br><br>
        <div class="text-center">
            <p><a href="?action=add" class="btn btn-primary">Add a New Car</a></p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>