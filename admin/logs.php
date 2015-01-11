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
                            <i class="fa fa-file"></i> Logs
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
                                $sql = "SELECT * FROM notifications";
                                $result = mysqli_query($main, $sql);

                                echo "<table id='logstable' class='table'>";
                                echo "<thead>";
                                echo "<tr>" . "<th>Id</th>" . "<th>Type</th>" . "<th>User/Unit ID</th>" . "<th>Username</th>" . "<th>Description</th>" . "<th>Date</th>";
                                echo "</thead>";

                                echo "<tbody>";
                                while ($row = mysqli_fetch_array($result)) {
                                    $date_timestamp = $row['timeChanged'];
                                    $date_string = date('Y-n-j, H:i:s', $date_timestamp);

                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['typeChanged'] . "</td>";
                                    echo "<td>" . $row['userid'] . "</td>";
                                    echo "<td>" . $row['username'] . "</td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "<td>" . $date_string . "</td>";
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
            $("#logstable").dataTable();
        })
    </script>


<?php include_once "includes/footer.php"; ?>