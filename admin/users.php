<?php include_once "includes/header.php"; ?>
<?php include_once "includes/nav.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Users
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Users
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                                $sql = "SELECT * FROM users";
                                $result = mysqli_query($main, $sql);

                                echo "<table id='usertable' class='table'>";
                                echo "<thead>";
                                echo "<tr>" . "<th>Id</th>" . "<th>Username</th>" . "<th>Email</th>" . "<th>Registered</th>" . "<th>Last login</th>" . "<th>Level</th>" . "<th>Cash</th>";
                                echo "</thead>";

                                echo "<tbody>";
                                while ($row = mysqli_fetch_array($result)) {
                                    $date_timestamp = $row['regDate'];
                                    $date_string = date('Y-n-j', $date_timestamp);

                                    $date_timestamp = $row['lastLogin'];
                                    $lastlogin_string = date('Y-n-j', $date_timestamp);

                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td><a href='edit-user.php?id=$row[id]'>" . $row['username'] . "</a></td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $date_string . "</td>";
                                    echo "<td>" . $lastlogin_string . "</td>";
                                    echo "<td>" . $row['level'] . "</td>";
                                    echo "<td>" . $row['cash'] . "</td>";
                                    echo "</tr>";

                                }
                                echo "</tbody>";
                                echo "</table>";

                            ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <script>
        $(function(){
            $("#usertable").dataTable();
        })
    </script>


<?php include_once "includes/footer.php"; ?>