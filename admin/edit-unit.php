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
                    <i class="fa fa-file"></i> <a href="units.php">Units</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Edit unit
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
            $sql = "SELECT * FROM Units WHERE id=$id";
            $result = mysqli_query($main, $sql);
            $row = mysqli_fetch_array($result);

            $name = $_POST['name'] ?: $row['name'];
            $unitType = $_POST['unit_type'] ?: $row['unit_type'];
            $unitHitpoints = $_POST['unit_hitpoints'] ?: $row['unit_hitpoints'];
            $unitRange = $_POST['unit_range'] ?: $row['unit_range'];
            $unitDamage = $_POST['unit_damage'] ?: $row['unit_damage'];
            $unitROF = $_POST['unit_rof'] ?: $row['unit_rof'];
            $unitCost = $_POST['unit_cost'] ?: $row['unit_cost'];
            $FKbuildingReq = $_POST['FK_building_req'] ?: $row['FK_building_req'];


            if ($_POST['submit']) {

                /* UPDATE QUERIES */
                //return only post data
                $id_sql = "`id`='$id'";

                if ($name != $row['name']) {
                    $new_name = $name;
                    $name_sql = ", `name`='$name'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Name', '$id', '$row[name]', 'Changed name from $row[name] to $new_name', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($unitType != $row['unit_type']) {
                    $new_unitType = $unitType;
                    $unitType_sql = ", `unit_type`='$unitType'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Unit Type', '$id', '$row[name]', 'Changed unit type from $row[unit_type] to $new_unitType', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($unitHitpoints != $row['unit_hitpoints']) {
                    $new_unitHitpoints = $unitHitpoints;
                    $unitHitpoints_sql = ", `unit_hitpoints`='$unitHitpoints'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Unit Hitpoints', '$id', '$row[name]', 'Changed unit hitpoints from $row[unit_hitpoints] to $new_unitHitpoints', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($unitRange != $row['unit_range']) {
                    $new_unitRange = $unitRange;
                    $unitRange_sql = ", `unit_range`='$unitRange'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Unit Range', '$id', '$row[name]', 'Changed unit range from $row[unit_range] to $new_unitRange', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($unitDamage != $row['unit_damage']) {
                    $new_unitDamage = $unitDamage;
                    $unitDamage_sql = ", `unit_damage`='$unitDamage'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Unit Damage', '$id', '$row[name]', 'Changed unit damage from $row[unit_damage] to $new_unitDamage', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($unitROF != $row['unit_rof']) {
                    $new_unitROF = $unitROF;
                    $unitROF_sql = ", `unit_rof`='$unitROF'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Unit ROF', '$id', '$row[name]', 'Changed unit rof from $row[unit_rof] to $new_unitROF', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($unitCost != $row['unit_cost']) {
                    $new_unitCost = $unitCost;
                    $unitCost_sql = ", `unit_cost`='$unitCost'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Unit Cost', '$id', '$row[name]', 'Changed unit cost from $row[unit_cost] to $new_unitCost', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($FKbuildingReq != $row['FK_building_req']) {
                    $new_FKbuildingReq = $FKbuildingReq;
                    $FKbuildingReq_sql = ", `FK_building_req`='$FKbuildingReq'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                   // $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                   // VALUES ('Username', '$id', '$row[name]', 'Changed username from $row[username] to $new_username', '$time')";
                   // mysqli_query($main, $log_sql);
                }


                /* END UPDATE QUERIES(); */


                /* PROCESS ALL (if required); */
                $processor = $id_sql . $name_sql . $unitType_sql . $unitHitpoints_sql . $unitRange_sql . $unitDamage_sql . $unitROF_sql . $unitCost_sql . $FKbuildingReq_sql; //add all the fields on this line
                $sql = "UPDATE Units SET " . $processor . " WHERE id=$id";
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
                <td>Type</td>
                <td>
                    <select name="unit_type" class="form-control">
                        <?php
                            echo "<option ";
                            if ($unitType == "Infantry") {
                                echo "selected='SELECTED' ";
                            }
                            echo "value='Infantry'>Infantry</option>";

                            echo "<option ";
                            if ($unitType == "Vehicle") {
                                echo "selected='SELECTED' ";
                            }
                            echo "value='Vehicle'>Vehicle</option>";

                            echo "<option ";
                            if ($unitType == "Naval") {
                                echo "selected='SELECTED' ";
                            }
                            echo "value='Naval'>Naval</option>";

                            echo "<option ";
                            if ($unitType == "Air") {
                                echo "selected='SELECTED' ";
                            }
                            echo "value='Air'>Air</option>";
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hitpoints</td>
                <td><input class="form-control" type="number" name="unit_hitpoints" value="<?php echo $unitHitpoints ?>"/></td>
            </tr>
            <tr>
                <td>Range</td>
                <td><input class="form-control" type="number" name="unit_range" value="<?php echo $unitRange ?>"/></td>
            </tr>
            <tr>
                <td>Damage</td>
                <td><input class="form-control" type="number" name="unit_damage" value="<?php echo $unitDamage ?>"/></td>
            </tr>
            <tr>
                <td>Rate of fire</td>
                <td><input class="form-control" type="number" name="unit_rof" value="<?php echo $unitROF ?>"/></td>
            </tr>
            <tr>
                <td>Cost</td>
                <td><input class="form-control" type="number" name="unit_cost" value="<?php echo $unitCost ?>"/></td>
            </tr>
            <tr>
                <td>Building Requirement</td>
                <td><input class="form-control" type="text" name="FK_building_req" value="<?php echo $FKbuildingReq ?>"/></td>
            </tr>
            </tbody>
        </table>
        <input class="btn btn-primary" type="submit" value="Save changes" name="submit"/>&nbsp;&nbsp;&nbsp;<a href='units.php'>Cancel</a>
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