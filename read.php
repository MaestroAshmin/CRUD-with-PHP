<!DOCTYPE HTML>
<html>

<head>
    <title>PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>

<body>


    <!-- container -->
    <div class="container">

        <div class="page-header">
            <h1>Read Product</h1>
        </div>

        <!-- PHP read one record will be here -->
        <?php
        include 'config/database.php';
        //$id = isset($_GET['id']) ? $_GET['id'] : null;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $sql = "SELECT ID, FirstName, LastName, Email from users where ID={$id}";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        $ID = $row['ID'];
        $FirstName = $row['FirstName'];
        $LastName = $row['LastName'];
        $Email = $row['Email'];


        ?>
        <!-- HTML read one record table will be here -->
        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <td>ID</td>
                <td><?php echo htmlspecialchars($row['ID'], ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><?php echo htmlspecialchars($row['FirstName'], ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><?php echo htmlspecialchars($row['LastName'], ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo htmlspecialchars($row['Email'], ENT_QUOTES);  ?></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a href='index.php' class='btn btn-danger'>Back to read products</a>
                </td>
            </tr>
        </table>

    </div> <!-- end .container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>