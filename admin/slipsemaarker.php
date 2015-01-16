<?php include_once "includes/header.php"; ?>
<?php include_once "includes/nav.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slipsemærker</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a></li>
                        <li class="active"><i class="fa fa-file"></i> Slipsemærker</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-lg-offset-1">


                            <?php
                            if (!empty($_POST['submit'])) {
                                $navn = $_POST['Navn'];

                                $sql = "INSERT INTO maarke (Navn) VALUES ('$navn')";
                                mysqli_query($connection, $sql);
                                header("Location: slipsemaarker.php");
                                exit;
                            }


                            ?>

                            <br />
                            <legend>Opret mærke</legend>
                            <form method="post">
                                Navn:<br>
                                <input class="form-control" type="text" name="Navn" value=""/><br />
                                <input class="btn btn-primary" type="submit" value="Opret Mærke" name="submit"/>&nbsp;&nbsp;&nbsp;<a href='slipsemaarker.php'>Annuller</a>
                            </form>

                        </div>
                        <br /><br />
                        <div class="col-lg-5 col-lg-offset-1">
                            <?php
                                $sql = "SELECT * FROM maarke";
                                $result = mysqli_query($connection, $sql);

                                echo "<table id='usertable' class='table'>";
                                echo "<thead>";
                                echo "<tr>" . "<th>Mærke</th>" . "<th>Slet</th>";
                                echo "</thead>";

                                echo "<tbody>";
                                while ($row = mysqli_fetch_array($result)) {


                                    $linkrow = "ret_slipsemaarker.php?id=" . $row['Id'];


                                    echo "<tr class='linkrow' href='$linkrow'>";
                                    echo "<td>" . $row['Navn'] . "</td>";
                                    echo "<td><a class='btn btn-danger' href='slet_slipsemaarker.php?id=" . $row['Id'] . "'>Slet</a></td>";
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
        jQuery(document).ready(function($) {
            $(".linkrow").click(function() {
                window.document.location = $(this).attr("href");
            });
        });
    </script>


<?php include_once "includes/footer.php"; ?>