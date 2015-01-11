<?php include_once "includes/header.php"; ?>

<?php include_once "includes/nav.php"; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Donations
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Donations
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                            $sql = "SELECT * FROM donations";
                            $result = mysqli_query($main, $sql);

                            echo "<table class='table'>";
                            echo "<tr>" . "<th>Amount</th>" . "<th>Name</th>" . "<th>Paypal</th>" . "<th>Date</th>" . "<th>Id</th>";
                            while ($row = mysqli_fetch_array($result)) {
                                $date_timestamp = $row['time'];
                                $date_string = date('Y-n-j, H:i:s', $date_timestamp);

                                echo "<tr>";
                                echo "<td>$" . $row['pp_charges'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['pp_email'] . "</td>";
                                echo "<td>" . $date_string . "</td>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "</tr>";

                            }
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

<?php include_once "includes/footer.php"; ?>