<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"><img src="../images/logo_notagline.png" height="30px"></a>
    </div>

    <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">

            <li>
                <a href="../index.php"> Back to Game</a>
            </li>

        <!-- User menu at the right top side. -->
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                <?php
                    $sql = "SELECT * FROM users WHERE id=$userid";
                    $result = mysqli_query($main, $sql);

                    $row = mysqli_fetch_array($result);
                    echo $row['playerHandle'];
                ?>
                <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                </li>
                <li>
                    <a href="
                    <?php
                        $sql = "SELECT * FROM users WHERE id=$userid";
                        $result = mysqli_query($main, $sql);

                        $row = mysqli_fetch_array($result);
                        echo "edit-user.php?id=$row[id]";
                    ?>
                    "><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<? echo $base.'logout.php'; ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>


    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="users.php"><i class="fa fa-fw fa-user"></i> Users</a>
            </li>
            <li>
                <a href="buildings.php"><i class="fa fa-fw fa-building"></i> Buildings</a>
            </li>
            <li>
                <a href="units.php"><i class="fa fa-fw fa-plane"></i> Units</a>
            </li>
            <li>
                <a href="chat.php"><i class="fa fa-fw fa-weixin"></i> Chat</a>
            </li>
            <li>
                <a href="factions.php"><i class="fa fa-fw fa-users"></i> Factions</a>
            </li>
            <li>
                <a href="maps.php"><i class="fa fa-fw fa-flag"></i> Maps</a>
            </li>
            <li>
                <a href="logs.php"><i class="fa fa-fw fa-dollar"></i> Logs</a>
            </li>
            <li>
                <a href="donations.php"><i class="fa fa-fw fa-dollar"></i> Donations</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>