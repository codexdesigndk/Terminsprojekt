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
                        <li class="active"><i class="fa fa-file"></i> Opret</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <?php
            if (!empty($_POST['submit'])) {
                $Navn = $_POST['Navn'];
                $FKMaarke = $_POST['FKMaarke'];
                $Pris = $_POST['Pris'];
                $Billedeurl = $_POST['Billedeurl'];
                $Beskrivelse = $_POST['Beskrivelse'];
                $Farve = $_POST['Farve'];



                // Definerer $file til at indeholde $_FILES for nemmere adgang
                $file = $_FILES['Image'];

                // Tjekker om der sker en fejl, f.eks forkert datatype, mistet forbindelse osv.
                if ($file['error'] == 0) {

                    // Giver fil et unikt navn så der ikke sker en konflikt med andre filer
                    $newfilename = time() . "_" . $file['name'];

                    //Gemmer billedemappe i variabel
                    $imagefolder = '../images/produktbilleder/';

                    // Flyt midlertidig fil til dens desitnation
                    //$moveresult = move_uploaded_file($file['tmp_name'], $newpath);

                    //WideImage
                    $wi_image_full = WideImage::load($file['tmp_name']);
                    $wi_image_full = $wi_image_full->resizeDown(300);
                    $wi_image_full->saveToFile($imagefolder . $newfilename);

                    // Skab en thumbnail på 100px og gem af det originale billede.
                    $wi_image_thumb = $wi_image_full->resizeDown(130);
                    $wi_image_thumb->saveToFile($imagefolder . "thumb_" . $newfilename);


                } else {
                    $newfilename = 'default.jpg';
                }


                $sql = "INSERT INTO produkter (Navn, FK_Maarke, Pris, Billedeurl, Beskrivelse, Farve) VALUES ('$Navn', '$FKMaarke', '$Pris', '$newfilename', '$Beskrivelse', '$Farve')";
                mysqli_query($connection, $sql);
                header("Location: produkter.php");
                exit;
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
                                            <td><input class="form-control" type="text" name="Navn" value=""/></td>

                                        </tr>
                                        <tr>
                                            <td>Beskrivele</td>
                                            <td><textarea name="Beskrivelse" cols="" rows=""></textarea></td>
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
                                        <td><input class="form-control" type="text" name="Farve" value=""/></td>

                                    </tr>
                                    <tr>
                                        <td>Pris</td>
                                        <td><input class="form-control" type="number" name="Pris" value=""/></td>
                                    </tr>
                                    <tr>
                                        <td>Mærke</td>
                                        <td><select class="form-control" name="FKMaarke">
                                                <?php
                                                $sql = "SELECT * FROM maarke";
                                                $result = mysqli_query($connection, $sql);

                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo "<option value='";
                                                    echo $row['M_Id'];
                                                    echo "'>";
                                                    echo $row['M_Navn'];
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