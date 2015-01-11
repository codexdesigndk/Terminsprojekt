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
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Units
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-3">
                        <h1 type="button" class="btn btn-primary btn-lg btn-block disabled"><i class="fa fa-fw fa-male"></i> Infantry</h1>
                        <?php
                            $sql = "SELECT * FROM Units WHERE unit_type = 'Infantry' ORDER BY unit_cost ASC";
                            $result = mysqli_query($main, $sql);


                            echo "<table class='table'>";
                            echo "<tbody>";
                            echo "<tr>" . "<th>Id</th>" . "<th>Name</th>" . "<th>Cost</th>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td><a href='edit-unit.php?id=$row[id]'>" . $row['name'] . "</a></td>";
                                echo "<td>$" . $row['unit_cost'] . "</td>";
                                echo "</tr>";

                            }
                            echo "</tbody>";
                            echo "</table>";

                        ?>
                    </div>
                    <div class="col-sm-3">
                        <h1 type="button" class="btn btn-success btn-lg btn-block disabled"><i class="fa fa-fw fa-truck"></i> Vehicles</h1>
                        <?php
                            $sql = "SELECT * FROM Units WHERE unit_type = 'Vehicle' ORDER BY unit_cost ASC";
                            $result = mysqli_query($main, $sql);

                            echo "<table class='table'>";
                            echo "<tbody>";
                            echo "<tr>" . "<th>Id</th>" . "<th>Name</th>" . "<th>Cost</th>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td><a href='edit-unit.php?id=$row[id]'>" . $row['name'] . "</a></td>";
                                echo "<td>$" . $row['unit_cost'] . "</td>";
                                echo "</tr>";

                            }
                            echo "</tbody>";
                            echo "</table>";

                        ?>
                    </div>
                    <div class="col-sm-3">
                        <h1 type="button" class="btn btn-warning btn-lg btn-block disabled"><i class="fa fa-fw fa-anchor"></i> Naval</h1>
                        <?php
                            $sql = "SELECT * FROM Units WHERE unit_type = 'Naval' ORDER BY unit_cost ASC";
                            $result = mysqli_query($main, $sql);

                            echo "<table class='table'>";
                            echo "<tbody>";
                            echo "<tr>" . "<th>Id</th>" . "<th>Name</th>" . "<th>Cost</th>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td><a href='edit-unit.php?id=$row[id]'>" . $row['name'] . "</a></td>";
                                echo "<td>$" . $row['unit_cost'] . "</td>";
                                echo "</tr>";

                            }
                            echo "</tbody>";
                            echo "</table>";

                        ?>
                    </div>
                    <div class="col-sm-3">
                        <h1 type="button" class="btn btn-danger btn-lg btn-block disabled"><i class="fa fa-fw fa-plane"></i> Air</h1>
                        <?php
                            $sql = "SELECT * FROM Units WHERE unit_type = 'Air' ORDER BY unit_cost ASC";
                            $result = mysqli_query($main, $sql);

                            echo "<table class='table'>";
                            echo "<tbody>";
                            echo "<tr>" . "<th>Id</th>" . "<th>Name</th>" . "<th>Cost</th>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td><a href='edit-unit.php?id=$row[id]'>" . $row['name'] . "</a></td>";
                                echo "<td>$" . $row['unit_cost'] . "</td>";
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

<?php include_once "includes/footer.php"; ?>