<?php include_once "includes/header.php"; ?>
<?php include_once "includes/nav.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Produkter</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a></li>
                        <li class="active"><i class="fa fa-file"></i> Produkter</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-4">
                                <a class='btn btn-primary' href='opret-produkt.php'>Tilføj produkt</a><br /><br />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $sql = "SELECT * FROM produkter";
                            $result = mysqli_query($connection, $sql);

                            echo "<table id='usertable' class='table'>";
                            echo "<thead>";
                            echo "<tr>" . "<th>Billede</th>" . "<th>Id</th>" . "<th>Navn</th>" . "<th>Mærke</th>" . "<th>Farve</th>" . "<th>Pris</th>" . "<th>Slet</th>";
                            echo "</thead>";

                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {

                                $linkrow = "ret-produkt.php?id=" . $row['Id'];

                                echo "<tr class='linkrow' href='$linkrow'>";
                                echo "<td><img src='../images/produktbilleder/thumb_" . $row['Billedeurl'] . "' width='70px'/></td>";
                                echo "<td>" . $row['Id'] . "</td>";
                                echo "<td>" . $row['Navn'] . "</td>";
                                echo "<td>" . $row['FK_Maarke'] . "</td>";
                                echo "<td>" . $row['Farve'] . "</td>";
                                echo "<td>DKK " . $row['Pris'] . ",-</td>";
                                echo "<td><a class='btn btn-danger' href='slet_produkt.php?id=" . $row['Id'] . "'>Slet</a></td>";
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