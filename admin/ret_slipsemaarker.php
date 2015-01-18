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
                        <li><i class="fa fa-file"></i> <a href="slipsemaarker.php">Slipsemærker</a></li>
                        <li class="active"><i class="fa fa-file"></i> Rediger mærke</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4">
                                <h3>Rediger Slipsemærke</h3>

                                <?php
                                if (isset($_GET['id'])) {

                                    $id = $_GET['id'];
                                    $navn = "";

                                    if (isset($_POST['submit'])) {
                                        $navn = $_POST['Navn'];

                                        $sql = "UPDATE maarke SET M_Navn ='$navn' WHERE M_Id=$id";
                                        mysqli_query($connection, $sql);
                                        header("Location: slipsemaarker.php");
                                        exit;

                                    } else {
                                        $sql = "SELECT * FROM maarke WHERE M_Id=$id";
                                        $result = mysqli_query($connection, $sql);
                                        $row = mysqli_fetch_array($result);

                                        $titel = $row['M_Navn'];
                                    }

                                }

                                ?>
                                <form method="post" enctype="multipart/form-data">
                                    Indtast nyt navn:<br>
                                    <input class="form-control" type="text" name="Navn" value="<?php echo $navn ?>" required="yes"/><br>
                                    <input class="btn btn-primary" type="submit" value="Gem ændringer" name="submit"/>&nbsp;&nbsp;<a href='slipsemaarker.php'>Annuller</a>
                                </form><br>
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