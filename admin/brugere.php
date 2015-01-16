<?php include_once "includes/header.php"; ?>
<?php include_once "includes/nav.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Brugere</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a></li>
                        <li class="active"><i class="fa fa-file"></i> Brugere</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                                $sql = "SELECT * FROM brugere";
                                $result = mysqli_query($connection, $sql);

                                echo "<table id='usertable' class='table'>";
                                echo "<thead>";
                                echo "<tr>" . "<th>Id</th>" . "<th>Titel</th>" . "<th>Fornavn</th>" . "<th>Efternavn</th>" . "<th>Email</th>" . "<th>Sidste Besøg</th>" . "<th>Billede</th>";
                                echo "</thead>";

                                echo "<tbody>";
                                while ($row = mysqli_fetch_array($result)) {

                                    $date_timestamp = strtotime($row['SidsteBesog']);
                                    $lastlogin_string = date('Y-n/j, H:i:s', $date_timestamp);
                                    $linkrow = "rediger-brugere.php?id=" . $row['Id'];


                                    echo "<tr class='linkrow' href='$linkrow'>";
                                    echo "<td>" . $row['Id'] . "</td>";
                                    echo "<td>" . $row['Titel'] . "</td>";
                                    echo "<td>" . $row['Fornavn'] . "</td>";
                                    echo "<td>" . $row['Efternavn'] . "</td>";
                                    echo "<td>" . $row['Email'] . "</td>";
                                    echo "<td>" . $lastlogin_string . "</td>";
                                    echo "<td>" . $row['Billedeurl'] . "</td>";
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