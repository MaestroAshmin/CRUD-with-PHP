<!DOCTYPE HTML>
<html>

<head>
    <title>PDO - Update a Record - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>

<body>

    <!-- container -->
    <div class="container">

        <div class="page-header">
            <h1>Update Product</h1>
        </div>
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

        <!--we have our html form here where new record information can be updated-->
        <form action="config/updateprocess.php?id=<?php echo $id ?>" method="post">
            <!--?id=<?php echo $row["id"]; ?>-->
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>First Name</td>
                    <td><input type='text' name='FirstName' value="<?php echo htmlspecialchars($row['FirstName'], ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name='LastName' class='form-control' value="<?php echo htmlspecialchars($row['LastName'], ENT_QUOTES);  ?>" /></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type='email' name='Email' value="<?php echo htmlspecialchars($row['Email'], ENT_QUOTES);  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save Changes' class='btn btn-primary' />
                        <a href='index.php' class='btn btn-danger'>Back to read products</a>
                    </td>
                </tr>
            </table>
        </form>
    </div> <!-- end .container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>