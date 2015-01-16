<?php include_once "includes/header.php"; ?>
<?php include_once "includes/nav.php"; ?>
    <div id="page-wrapper">

    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Brugere
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                </li>
                <li>
                    <i class="fa fa-file"></i> <a href="brugere.php">Brugere</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Rediger brugere
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    <div class="row">
    <div class="col-lg-12">


    <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
    <?php
        if (isset($_GET['id'])) {


            $id = $_GET['id'];


            $sql = "SELECT * FROM brugere WHERE Id=$id";
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_array($result);

            $time = time();
            $Titel = (isset($_POST['Titel']) ? $_POST['Titel'] : $row['Titel']);
            $Fornavn = (isset($_POST['Fornavn']) ? $_POST['Fornavn'] : $row['Fornavn']);
            $Efternavn = (isset($_POST['Efternavn']) ? $_POST['Efternavn'] : $row['Efternavn']);
            $Email = (isset($_POST['Email']) ? $_POST['Email'] : $row['Email']);

            $passwordset = (isset($_POST['Adgangskode']) ? $_POST['Adgangskode'] : "");
            $password = password_hash($passwordset, PASSWORD_DEFAULT);

            $date_timestamp = strtotime($row['SidsteBesog']);
            $lastlogin_string = date('Y-n/j, H:i:s', $date_timestamp);

            $Billede = (isset($_POST['Billede']) ? $_POST['Billede'] : $row['Billedeurl']);


            if (isset($_POST['submit'])) {


                $id_sql = "`Id`='$id'";

                if ($Titel != $row['Titel']) {
                    $new_Titel = $Titel;
                    $Titel_sql = ", `Titel`='$Titel'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO log (Bruger ,Dato , Beskrivelse) VALUES ('$id', '$time', 'Har skiftet sin titel.')";
                    mysqli_query($connection, $log_sql);
                } else {
                    $Titel_sql = "";
                }

                if ($Fornavn != $row['Fornavn']) {
                    $new_Fornavn = $Fornavn;
                    $Fornavn_sql = ", `Fornavn`='$Fornavn'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO log (Bruger ,Dato , Beskrivelse) VALUES ('$id', '$time', 'Har skiftet sin titel.')";
                    mysqli_query($connection, $log_sql);
                } else {
                    $Fornavn_sql = "";
                }

                if ($Efternavn != $row['Efternavn']) {
                    $new_Efternavn = $Efternavn;
                    $Efternavn_sql = ", `Efternavn`='$Efternavn'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO log (Bruger ,Dato , Beskrivelse) VALUES ('$id', '$time', 'Har skiftet sin titel.')";
                    mysqli_query($connection, $log_sql);
                } else {
                    $Efternavn_sql = "";
                }

                if ($Email != $row['Email']) {
                    $new_Email = $Email;
                    $Email_sql = ", `Email`='$Email'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO log (Bruger ,Dato , Beskrivelse) VALUES ('$id', '$time', 'Har skiftet sin titel.')";
                    mysqli_query($connection, $log_sql);
                } else {
                    $Email_sql = "";
                }

                if (!empty($_POST['Adgangskode'])) {
                    $passwordset = $_POST['Adgangskode'];
                    $hash = password_hash($passwordset, PASSWORD_DEFAULT);
                    $password_sql = ", `Adgangskode`='$hash'";
                    /* LOGGING */
                    $log_sql = "INSERT INTO log (Bruger ,Dato , Beskrivelse) VALUES ('$id', '$time', 'Har skiftet sin titel.')";
                    mysqli_query($connection, $log_sql);
                } else {
                    $password_sql = "";
                }





                $processor = $id_sql . $Titel_sql . $Fornavn_sql . $Efternavn_sql . $Email_sql . $password_sql; //add all the fields on this line
                $sql = "UPDATE brugere SET " . $processor . " WHERE id=$id";
                mysqli_query($connection, $sql);

                header("location: brugere.php");

            }

        }
    ?>
    <form method="post">
        <table class="table">
            <tbody>
            <tr>
                <td>Titel</td>
                <td><input class="form-control" type="text" name="Titel" value="<?= $Titel ?>"/></td>
            </tr>
            <tr>
                <td>Fornavn</td>
                <td><input class="form-control" type="text" name="Fornavn" value="<?php echo $Fornavn ?>"/></td>
            </tr>
            <tr>
                <td>Efternavn</td>
                <td><input class="form-control" type="text" name="Efternavn" value="<?php echo $Efternavn ?>"/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input class="form-control" type="email" name="Email" value="<?php echo $Email ?>"/></td>
            </tr>
            <tr>
                <td>Billede</td>
                <td><input class="form-control" type="text" name="Billede" value=""/></td>
            </tr>
            <tr>
                <td>Adgangskode</td>
                <td><input class="form-control" type="password" name="Adgangskode" value="" Placeholder="*************"/></td>
            </tr>
            <tr>
                <td>Sidste Besøg</td>
                <td><?php echo $lastlogin_string ?></td>
            </tr>
            </tbody>
        </table>
        <input class="btn btn-primary" type="submit" value="Gem ændringer" name="submit"/>&nbsp;&nbsp;&nbsp;<a href='brugere.php'>Annuller</a>
    </form>
    </div>
    </div>


    </div>
    </div>
    <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include_once "includes/footer.php"; ?>