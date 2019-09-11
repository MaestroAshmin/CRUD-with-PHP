<!DOCTYPE HTML>
<html>

<head>
    <title>Read</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">

        <div class="page-header">
            <h1>Read</h1>
        </div>

        <!-- PHP code to read records will be here -->
        <?php
        include 'config/database.php';
        $sql = "SELECT ID,FirstName,LastName, Email FROM users";

        $result = mysqli_query($conn, $sql);
        echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create New User</a>";
        if (mysqli_num_rows($result) > 0) {

            echo "<table class='table table-hover table-responsive table-bordered'>"; //start table

            //creating our table heading
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Email</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                /*
                echo "ID :{$row['ID']}  <br> " .
                    "NAME : {$row['FirstName']} <br> " .
                    "Cast : {$row['LastName']} <br> " .
                    "Email : {$row['Email']} <br> " .
                    "--------------------------------<br>";
                */
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>";

                // read one record 
                echo "<a href='read.php?id= {$row['ID']}' class='btn btn-info m-r-1em'>Read</a>";

                // we will use this links on next part of this post
                echo "<a href='update.php?id={$row['ID']}' class='btn btn-primary m-r-1em'>Edit</a>";

                // we will use this links on next part of this post
                echo "<a href='#' onclick='delete_user({$row['ID']});'  class='btn btn-danger'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        // table body will be here

        // end table
        else {
            echo "<div class='alert alert-danger'>No records found.</div>";
        }

        mysqli_close($conn);
        ?>


    </div> <!-- end .container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->
    <script type='text/javascript'>
        // confirm record deletion
        function delete_user(id) {

            var answer = confirm('Are you sure?');
            if (answer) {
                // if user clicked ok, 
                // pass the id to delete.php and execute the delete query
                window.location = 'config/deleteprocess.php?id=' + id;
            }
        }
    </script>

</body>

</html>