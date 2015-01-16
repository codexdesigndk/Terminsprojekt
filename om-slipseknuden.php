<?php include 'includes/public_header.php'; ?>

<section class="content">
        <div class="row">

            <?php include 'includes/sidebar.php'; ?>
            <div class="right-content">
                <div class="col-sm-9">
                    <?php
                    $sql = "SELECT * FROM sider WHERE Id='2'";
                    $result = mysqli_query($connection, $sql);
                    $row = mysqli_fetch_array($result);

                    echo $row['Indhold'];

                    $sql = "SELECT * FROM brugere";
                    $result = mysqli_query($connection, $sql);

                    $i = 0;
                    while ($row = mysqli_fetch_array($result)) {

                        if ($i % 2 == 0) {
                            echo "<div class='row'>";
                        }
                        $i++;

                        echo "<div class='col-sm-6'>";
                        echo "<img src='images/medarbejdere/" . $row['Billedeurl'] . "' height='200px' width='200px'>";
                        echo "<h3>" . $row['Fornavn'] . " " . $row['Efternavn'] . "</h3>";
                        echo "<p><b>" . $row['Titel'] . "</b><br>" . $row['Email'] . "</p>";
                        echo "</div>";

                        if ($i % 2 == 0) {
                            echo "</div>";
                        }

                    }

                    ?>

                </div>
            </div>
        </div>
</section>

<?php include 'includes/footer.php'; ?>
