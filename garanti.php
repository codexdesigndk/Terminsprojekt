<?php include 'includes/public_header.php'; ?>

<section class="content">
        <div class="row">

            <?php include 'includes/sidebar.php'; ?>
            <div class="right-content">
                <div class="col-sm-9">
                    <?php
                    $sql = "SELECT * FROM sider WHERE Id='3'";
                    $result = mysqli_query($connection, $sql);
                    $row = mysqli_fetch_array($result);

                    echo $row['Indhold'];

                    ?>

                </div>


            </div>
        </div>
</section>

<?php include 'includes/footer.php'; ?>
