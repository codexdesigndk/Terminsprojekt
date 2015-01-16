<?php include 'includes/public_header.php'; ?>

<section class="content">
    <div class="row">

        <?php include 'includes/sidebar.php'; ?>

        <div class="right-content">
            <div class="col-sm-9">
                <div class="col-xs-12">
                <?php
                $sql = "SELECT * FROM produkter ORDER BY RAND() LIMIT 2";
                $result = mysqli_query($connection, $sql);

                while ($row = mysqli_fetch_array($result)) {
                    echo "<div class='col-sm-6 forsideprodukter divider-produkt text-center'>";
                    echo "<img src='images/produktbilleder/" . $row['Billedeurl'] . "'>";
                    echo "<h2>" . $row['Navn'] . "</h2>";
                    echo "<p>" . $row['Farve'] . "</p>";
                    echo "<p class='pris'>DKK " . $row['Pris'] . ",-</p>";
                    echo "<a class='infobtn' href='produkt.php?id=" . $row['Id'] . "'>Info</a>";
                    echo "</div>";
                }
                ?>
                </div>
                <div class="col-xs-12 forsideindhold">
                    <?php
                    $sql = "SELECT * FROM sider WHERE Id='1'";
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
