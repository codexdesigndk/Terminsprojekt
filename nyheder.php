<?php include 'includes/public_header.php'; ?>

<section class="content">
    <div class="row">

        <?php include 'includes/sidebar.php'; ?>

        <div class="right-content">
            <div class="col-sm-9">
                <div class="col-xs-12">
                    <h2>Nyheder</h2>
                    <?php

                    $sql = "SELECT * FROM nyheder ORDER BY Id DESC";
                    $result = mysqli_query($connection, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        $date_timestamp = strtotime($row['Dato']);
                        $date_string = date('j/n-Y', $date_timestamp);

                        echo "<article>";
                        echo "<time>$date_string</time><br />";
                        echo "<h3>" . $row['Titel'] . "</h3>";
                        echo "<p>" . substr($row['Indhold'],0,500) . "</p>";
                        echo "<a class='se-mere-link' href='nyhed.php?id=$row[Id]'> Læs mere...</a>";
                        echo "</article>";
                    }

                    ?>
                </div>
                <div class="col-xs-12 forsideindhold">
                    <?php
                    $sql = "SELECT * FROM sider WHERE Id='5'";
                    $result = mysqli_query($connection, $sql);
                    $row = mysqli_fetch_array($result);

                    echo $row['Indhold'];

                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
