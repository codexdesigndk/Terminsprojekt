<?php include_once "includes/header.php"; ?>

<?php include_once "includes/nav.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Units
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Buildings
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->


            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <?php
                            $sql = "SELECT * FROM buildingTypes";
                            $result = mysqli_query($main, $sql);


                            while ($row = mysqli_fetch_array($result)) {
                                echo "<div class='col-sm-4'>";
                                echo "<a href='edit-building.php?id=$row[id]'><h1 type='button' class='btn btn-primary btn-lg btn-block'><i><img src='../images/icons/" . $row['icon'] . "' height='50px'>&nbsp;</i> " . $row['name'] . "</h1></a>";
                                echo "<table class='table text-center'>";
                                echo "<tbody>";
                                echo "<tr>";
                                echo "<td><b>Id</b></td>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td><b>Name</b></td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td><b>Cost</b></td>";
                                echo "<td>$" . $row['cost'] . "</td>";
                                echo "</tr>";
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";

                            }

                        ?>

                    </div>
                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include_once "includes/footer.php"; ?>