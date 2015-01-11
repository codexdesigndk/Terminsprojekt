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
                    <i class="fa fa-file"></i> <a href="users.php">Users</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Edit user
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
            $sql = "SELECT * FROM users WHERE id=$id";
            $result = mysqli_query($main, $sql);
            $row = mysqli_fetch_array($result);


            $username = $_POST['username'] ?: $row['username'];
            $email = $_POST['email'] ?: $row['email'];

            $passwordset = $_POST['password'];
            $password = password_hash($passwordset, PASSWORD_DEFAULT);

            $regDate = $row['regDate'];
            $date_timestamp = $row['regDate'];
            $date_string = date('Y-n-j, H:i:s', $date_timestamp);

            $lastLogin = $row['lastLogin'];
            $date_timestamp = $row['lastLogin'];
            $lastlogin_string = date('Y-n-j, H:i:s', $date_timestamp);

            $level = $_POST['level'] ?: $row['level'];
            $avatar = $_POST['avatar'] ?: $row['avatar'];
            $xp = $_POST['exp'] ?: $row['exp'];
            $maxxp = $_POST['maxExp'] ?: $row['maxExp'];
            $playerHandle = $_POST['playerHandle'] ?: $row['playerHandle'];
            $emailNotification = $_POST['emailNotification'] ?: $row['emailNotification'];
            $clan = $_POST['clan'] ?: $row['clan'];
            $faction = $_POST['faction'] ?: $row['faction'];
            $cash = $_POST['cash'] ?: $row['cash'];
            $resource = $_POST['resource'] ?: $row['resource'];
            $production_1 = $_POST['production_1'] ?: $row['production_1'];
            $production_2 = $_POST['production_2'] ?: $row['production_2'];
            $production_3 = $_POST['production_3'] ?: $row['production_3'];
            $production_4 = $_POST['production_4'] ?: $row['production_4'];
            $production_5 = $_POST['production_5'] ?: $row['production_5'];
            $production_6 = $_POST['production_6'] ?: $row['production_6'];


            if ($_POST['submit']) {

                /* UPDATE QUERIES */
                //return only post data
                $id_sql = "`id`='$id'";

                if ($username != $row['username']) {
                    $new_username = $username;
                    $username_sql = ", `username`='$username'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Username', '$id', '$row[username]', 'Changed username from $row[username] to $new_username', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($email != $row['email']) {
                    $new_email = $email; //coma required to infront
                    $email_sql = ", `email`='$email'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Email', '$id', '$row[username]', 'Changed email from $row[email] to $email', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if (!empty($_POST['password'])) {
                    $passwordset = $_POST['password'];
                    $hash = password_hash($passwordset, PASSWORD_DEFAULT);
                    $password_sql = ", `password`='$hash'";
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Password', '$id', '$row[username]', 'Changed password', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($level != $row['level']) {
                    $new_level = $level;
                    $level_sql = ", `level`='$level'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Level', '$id', '$row[username]', 'Changed level from $row[level] to $new_level', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($avatar != $row['avatar']) {
                    $new_avatar = $avatar;
                    $avatar_sql = ", `avatar`='$avatar'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Username', '$id', '$row[username]', 'Changed avatar from $row[avatar] to $new_avatar', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($xp != $row['exp']) {
                    $new_xp = $xp;
                    $xp_sql = ", `exp`='$xp'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Username', '$id', '$row[username]', 'Changed exp from $row[exp] to $new_xp', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($maxxp != $row['maxExp']) {
                    $new_maxxp = $maxxp;
                    $maxxp_sql = ", `maxExp`='$maxxp'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Username', '$id', '$row[username]', 'Changed max exp from $row[maxExp] to $new_maxxp', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($playerHandle != $row['playerHandle']) {
                    $new_playerHandle = $playerHandle;
                    $playerHandle_sql = ", `playerHandle`='$playerHandle'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Username', '$id', '$row[username]', 'Changed playerHandle from $row[playerHandle] to $new_playerHandle', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($emailNotification != $row['emailNotification']) {
                    $new_emailNotification = $emailNotification;
                    $emailNotification_sql = ", `emailNotification`='$emailNotification'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Username', '$id', '$row[username]', 'Changed email notification from $row[emailNotification] to $new_emailNotification', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($clan != $row['clan']) {
                    $new_clan = $clan;
                    $clan_sql = ", `clan`='$clan'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Username', '$id', '$row[username]', 'Changed clan from $row[clan] to $new_clan', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($faction != $row['faction']) {
                    $new_faction = $faction;
                    $faction_sql = ", `faction`='$faction'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Username', '$id', '$row[username]', 'Changed faction from $row[faction] to $new_faction', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($cash != $row['cash']) {
                    $new_cash = $cash;
                    $cash_sql = ", `cash`='$cash'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Username', '$id', '$row[username]', 'Changed cash from $row[cash] to $new_cash', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($resource != $row['resource']) {
                    $new_resource = $resource;
                    $resource_sql = ", `resource`='$resource'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Username', '$id', '$row[username]', 'Changed resource from $row[resource] to $new_resource', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($production_1 != $row['production_1']) {
                    $new_production_1 = $production_1;
                    $production_1_sql = ", `production_1`='$production_1'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Username', '$id', '$row[username]', 'Changed production_1 from $row[production_1] to $new_production_1', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($production_2 != $row['production_2']) {
                    $new_production_2 = $production_2;
                    $production_2_sql = ", `production_2`='$production_2'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Username', '$id', '$row[username]', 'Changed production_2 from $row[production_2] to $new_production_2', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($production_3 != $row['production_3']) {
                    $new_production_3 = $production_3;
                    $production_3_sql = ", `production_3`='$production_3'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Username', '$id', '$row[username]', 'Changed production_3 from $row[production_3] to $new_production_3', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($production_4 != $row['production_4']) {
                    $new_production_4 = $production_4;
                    $production_4_sql = ", `production_4`='$production_4'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Username', '$id', '$row[username]', 'Changed production_4 from $row[production_4] to $new_production_4', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($production_5 != $row['production_5']) {
                    $new_production_5 = $production_5;
                    $production_5_sql = ", `production_5`='$production_5'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Username', '$id', '$row[username]', 'Changed production_5 from $row[production_5] to $new_production_5', '$time')";
                    mysqli_query($main, $log_sql);
                }

                if ($production_6 != $row['production_6']) {
                    $new_production_6 = $production_6;
                    $production_6_sql = ", `production_6`='$production_6'"; //this is the first one so no coma is required at the front
                    /* LOGGING */
                    $log_sql = "INSERT INTO notifications (typeChanged ,userid , username, description, timeChanged)
                  VALUES ('Username', '$id', '$row[username]', 'Changed production_6 from $row[production_6] to $new_production_6', '$time')";
                    mysqli_query($main, $log_sql);
                }

                /* END UPDATE QUERIES(); */


                /* PROCESS ALL (if required); */
                $processor = $id_sql . $username_sql . $email_sql . $password_sql . $level_sql . $avatar_sql . $xp_sql . $maxxp_sql . $playerHandle_sql . $emailNotification_sql . $clan_sql . $faction_sql . $cash_sql . $resource_sql . $production_1_sql . $production_2_sql . $production_3_sql . $production_4_sql . $production_5_sql . $production_6_sql; //add all the fields on this line
                $sql = "UPDATE users SET " . $processor . " WHERE id=$id";
                mysqli_query($main, $sql);
                //end();

            }//end submit(); 

        }
    ?>
    <form method="post">
        <table class="table">
            <tbody>
            <tr>
                <td>Username</td>
                <td><input class="form-control" type="text" name="username" value="<?= $username ?>"/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input class="form-control" type="email" name="email" value="<?php echo $email ?>"/></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input class="form-control" type="text" name="password" value="" placeholder="************"/></td>
            </tr>
            <tr>
                <td>Registration date</td>
                <td><?php echo $date_string ?></td>
            </tr>
            <tr>
                <td>Last login</td>
                <td><?php echo $lastlogin_string ?></td>
            </tr>
            <tr>
                <td>Level</td>
                <td><input class="form-control" type="number" name="level" value="<?php echo $level ?>"/></td>
            </tr>
            <tr>
                <td>Avatar</td>
                <td><input class="form-control" type="text" name="avatar" value="<?php echo $avatar ?>"/></td>
            </tr>
            <tr>
                <td>Experience</td>
                <td><input class="form-control" type="number" name="xp" value="<?php echo $xp ?>"/></td>
            </tr>
            <tr>
                <td>Max Experience</td>
                <td><input class="form-control" type="number" name="maxxp" value="<?php echo $maxxp ?>"/></td>
            </tr>
            <tr>
                <td>Playerhandle</td>
                <td><input class="form-control" type="text" name="playerHandle" value="<?php echo $playerHandle ?>"/></td>
            </tr>
            <tr>
                <td>Email notification</td>
                <td>
                    <select name="emailNotification" class="form-control">
                        <?php
                            echo "<option ";
                            if ($emailNotification == "on") {
                                echo "selected='SELECTED' ";
                            }
                            echo "value='on'>On</option>";

                            echo "<option ";
                            if ($emailNotification == "off") {
                                echo "selected='SELECTED' ";
                            }
                            echo "value='off'>Off</option>";
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Clan</td>
                <td><input class="form-control" type="text" name="clan" value="<?php echo $clan ?>"/></td>
            </tr>
            <tr>
                <td>Faction</td>
                <td><input class="form-control" type="text" name="faction" value="<?php echo $faction ?>"/></td>
            </tr>
            <tr>
                <td>Cash</td>
                <td><input class="form-control" type="number" name="cash" value="<?php echo $cash ?>"/></td>
            </tr>
            <tr>
                <td>Resource:</td>
                <td><input class="form-control" type="number" name="resource" value="<?php echo $resource ?>"/></td>
            </tr>
            <tr>
                <td>Production 1</td>
                <td><input class="form-control" type="text" name="production_1" value="<?php echo $production_1 ?>"/></td>
            </tr>
            <tr>
                <td>Production 2</td>
                <td><input class="form-control" type="text" name="production_2" value="<?php echo $production_2 ?>"/></td>
            </tr>
            <tr>
                <td>Production 3</td>
                <td><input class="form-control" type="text" name="production_2" value="<?php echo $production_3 ?>"/></td>
            </tr>
            <tr>
                <td>Production 4</td>
                <td><input class="form-control" type="text" name="production_2" value="<?php echo $production_4 ?>"/></td>
            </tr>
            <tr>
                <td>Production 5</td>
                <td><input class="form-control" type="text" name="production_2" value="<?php echo $production_5 ?>"/></td>
            </tr>
            <tr>
                <td>Production 6</td>
                <td><input class="form-control" type="text" name="production_2" value="<?php echo $production_6 ?>"/></td>
            </tr>
            </tbody>
        </table>
        <input class="btn btn-primary" type="submit" value="Save changes" name="submit"/>&nbsp;&nbsp;&nbsp;<a href='users.php'>Cancel</a>
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