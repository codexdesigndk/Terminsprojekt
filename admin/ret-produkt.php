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
                        <li><i class="fa fa-file"></i> <a href="produkter.php">Produkter</a></li>
                        <li class="active"><i class="fa fa-file"></i> Ret</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->


            <?php
            if (isset($_GET['id'])) {


                $id = $_GET['id'];


                $sql = "SELECT * FROM produkter WHERE Id=$id";
                $result = mysqli_query($connection, $sql);
                $row = mysqli_fetch_array($result);

                $Navn = (isset($_POST['Navn']) ? $_POST['Navn'] : $row['Navn']);
                $FKMaarke = (isset($_POST['FKMaarke']) ? $_POST['FKMaarke'] : $row['FK_Maarke']);
                $Pris = (isset($_POST['Pris']) ? $_POST['Pris'] : $row['Pris']);
                $Billede = (isset($_POST['Image']) ? $_POST['Image'] : $row['Billedeurl']);
                $Beskrivelse = (isset($_POST['Beskrivelse']) ? $_POST['Beskrivelse'] : $row['Beskrivelse']);
                $Farve = (isset($_POST['Farve']) ? $_POST['Farve'] : $row['Farve']);


                if (isset($_POST['submit'])) {


                    $id_sql = "`Id`='$id'";

                    if ($Navn != $row['Navn']) {
                        $new_Navn = $Navn;
                        $Navn_sql = ", `Navn`='$Navn'"; //this is the first one so no coma is required at the front
                        /* LOGGING */
                        $log_sql = "INSERT INTO log (Bruger ,Dato , Beskrivelse) VALUES ('$id', '$time', 'Har skiftet sin titel.')";
                        mysqli_query($connection, $log_sql);
                    } else {
                        $Navn_sql = "";
                    }

                    if ($FKMaarke != $row['FK_Maarke']) {
                        $new_FKMaarke = $FKMaarke;
                        $FKMaarke_sql = ", `FK_Maarke`='$FKMaarke'"; //this is the first one so no coma is required at the front
                        /* LOGGING */
                        $log_sql = "INSERT INTO log (Bruger ,Dato , Beskrivelse) VALUES ('$id', '$time', 'Har skiftet sin titel.')";
                        mysqli_query($connection, $log_sql);
                    } else {
                        $FKMaarke_sql = "";
                    }

                    if ($Pris != $row['Pris']) {
                        $new_Pris = $Pris;
                        $Pris_sql = ", `Pris`='$Pris'"; //this is the first one so no coma is required at the front
                        /* LOGGING */
                        $log_sql = "INSERT INTO log (Bruger ,Dato , Beskrivelse) VALUES ('$id', '$time', 'Har skiftet sin titel.')";
                        mysqli_query($connection, $log_sql);
                    } else {
                        $Pris_sql = "";
                    }

                    if ($Billede != $row['Billedeurl']) {
                        $new_Billede = $Billede;
                        $Billede_sql = ", `Billedeurl`='$Billede'"; //this is the first one so no coma is required at the front
                        /* LOGGING */
                        $log_sql = "INSERT INTO log (Bruger ,Dato , Beskrivelse) VALUES ('$id', '$time', 'Har skiftet sin titel.')";
                        mysqli_query($connection, $log_sql);
                    } else {
                        $Billede_sql = "";
                    }

                    if ($Beskrivelse != $row['Beskrivelse']) {
                        $new_Beskrivelse = $Beskrivelse;
                        $Beskrivelse_sql = ", `Beskrivelse`='$Beskrivelse'"; //this is the first one so no coma is required at the front
                        /* LOGGING */
                        $log_sql = "INSERT INTO log (Bruger ,Dato , Beskrivelse) VALUES ('$id', '$time', 'Har skiftet sin titel.')";
                        mysqli_query($connection, $log_sql);
                    } else {
                        $Beskrivelse_sql = "";
                    }

                    if ($Farve != $row['Farve']) {
                        $new_Farve = $Farve;
                        $Farve_sql = ", `Farve`='$Farve'"; //this is the first one so no coma is required at the front
                        /* LOGGING */
                        $log_sql = "INSERT INTO log (Bruger ,Dato , Beskrivelse) VALUES ('$id', '$time', 'Har skiftet sin titel.')";
                        mysqli_query($connection, $log_sql);
                    } else {
                        $Farve_sql = "";
                    }


                    $processor = $id_sql . $Navn_sql . $FKMaarke_sql . $Pris_sql . $Billede_sql . $Beskrivelse_sql . $Farve_sql; //add all the fields on this line
                    $sql = "UPDATE produkter SET " . $processor . " WHERE id=$id";
                    mysqli_query($connection, $sql);

                    header("location: produkter.php");

                }

            }
            ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-8">
                                <form method="post" enctype="multipart/form-data">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>Navn</td>
                                            <td><input class="form-control" type="text" name="Navn" value="<?php echo $Navn ?>"/></td>

                                        </tr>
                                        <tr>
                                            <td>Beskrivele</td>
                                            <td><textarea name="Beskrivelse" cols="" rows=""><?php echo $Beskrivelse ?></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace( 'Beskrivelse' );
                                </script>
                            </div>
                            <div class="col-lg-4">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>Farve</td>
                                        <td><input class="form-control" type="text" name="Farve" value="<?php echo $Farve ?>"/></td>

                                    </tr>
                                    <tr>
                                        <td>Pris</td>
                                        <td><input class="form-control" type="number" name="Pris" value="<?php echo $Pris ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Mærke</td>
                                        <td><select class="form-control" name="FKMaarke">
                                                <?php
                                                $sql = "SELECT * FROM maarke ";
                                                $result = mysqli_query($connection, $sql);


                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo "<option ";

                                                    if ($row['Id'] == 2) { // Add the right FK $var here
                                                        echo "selected='SELECTED' ";
                                                    }

                                                    echo "value='";
                                                    echo $row['Id'];
                                                    echo "'>";
                                                    echo $row['Navn'];
                                                    echo "</option>";
                                                }
                                                ?>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>Billede</td>
                                        <td><input class="form-control" type="file" name="Image" id=""/></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input class="btn btn-primary" type="submit" value="Opret" name="submit"/>&nbsp;&nbsp;&nbsp;<a href='brugere.php'>Annuller</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->


<?php include_once "includes/footer.php"; ?>