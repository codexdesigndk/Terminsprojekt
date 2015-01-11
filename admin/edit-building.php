<?php include_once "includes/header.php"; ?>
<?php include_once "includes/nav.php"; ?>
    <div id="page-wrapper">

    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Users
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                </li>
                <li>
                    <i class="fa fa-file"></i> <a href="buildings.php">Buildings</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Edit building
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

                //call database information();
                $sql = "SELECT * FROM buildingTypes WHERE id=$id";
                $result = mysqli_query($main, $sql);
                $row = mysqli_fetch_array($result);

                $name = $_POST['name'] ?: $row['name'];
                $cost = $_POST['cost'] ?: $row['cost'];

                if ($_POST['submit']) {

                    /* UPDATE QUERIES */
                    //return only post data
                    $id_sql = "`id`='$id'";

                    if ($name != $row['name']) {
                        $new_name = $name;
                        $name_sql = ", `name`='$name'"; //this is the first one so no coma is required at the front
                        /* LOGGING */
                        $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Building Name', '$id', '$row[name]', 'Changed name from $row[name] to $new_name', '$time')";
                        mysqli_query($main, $log_sql);
                    }

                    if ($cost != $row['cost']) {
                        $new_cost = $cost;
                        $cost_sql = ", `cost`='$cost'"; //this is the first one so no coma is required at the front
                        /* LOGGING */
                        $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Building Cost', '$id', '$row[name]', 'Changed cost from $row[cost] to $new_cost', '$time')";
                        mysqli_query($main, $log_sql);
                    }


                    /* END UPDATE QUERIES(); */


                    /* PROCESS ALL (if required); */
                    $processor = $id_sql . $name_sql . $cost_sql; //add all the fields on this line
                    $sql = "UPDATE buildingTypes SET " . $processor . " WHERE id=$id";
                    mysqli_query($main, $sql);
                    //end();

                }//end submit();

            }
        ?>
    <form method="post">
        <table class="table">
            <tbody>
            <tr>
                <td>Name</td>
                <td><input class="form-control" type="text" name="name" value="<?php echo $name ?>"/></td>
            </tr>
            <tr>
                <td>Cost</td>
                <td><input class="form-control" type="number" name="cost" value="<?php echo $cost ?>"/></td>
            </tr>
            </tbody>
        </table>
        <input class="btn btn-primary" type="submit" value="Save changes" name="submit"/>&nbsp;&nbsp;&nbsp;<a href='buildings.php'>Cancel</a>
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