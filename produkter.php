<?php include 'includes/public_header.php'; ?>

<section class="content">
    <div class="row">

        <?php include 'includes/sidebar.php'; ?>

        <div class="right-content">
            <div class="col-sm-9">
                <div class="col-xs-12">

                    <?php
                    $sql = "SELECT * FROM produkter";
                    $result = mysqli_query($connection, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<div class='col-sm-4 text-center divider-produkt'>";
                        echo "<div class='col-sm-12'>";
                        echo "<img src='images/produktbilleder/thumb_" . $row['Billedeurl'] . "'>";
                        echo "</div>";
                        echo "<div class='col-sm-12'>";
                        echo "<h2>$row[Navn]</h2>";
                        echo "<p>" . $row['Farve'] . "</p>";
                        echo "<p><b>DKK " . $row['Pris'] . ",-</b></p>";
                        echo "</div>";
                        echo "<div class='col-sm-12 text-center divider-small'>";
                        echo "<a class='infobtn' href='produkt.php?id=$row[Id]'>Info</a>";
                        echo "</div>";
                        echo "</div>";
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
