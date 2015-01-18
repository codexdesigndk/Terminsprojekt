
<div class="col-sm-3 sidebar">
    <h2 class="sidebar-titel">Produkter</h2>
    <aside class="sidebar-menu">

        <?php
        $sql = "SELECT * FROM maarke";
        $result = mysqli_query($connection, $sql);

        echo "<ul>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<li><a href='#'>" . $row['M_Navn'] . "</a></li>";
        }

        echo "</ul>";
        ?>

    </aside>
    <?php
    $sql = "SELECT * FROM nyheder ORDER BY RAND() LIMIT 2";
    $result = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_array($result)) {
        echo "<aside class='sidebar-lower'>";
        echo "<h3 class='sidebar-titel'>" . $row['Titel'] . "</h3>";
        echo "<p>$row[Indhold]</p>";
        echo "<a href='nyhed.php?id=$row[Id]'>Læs mere</a>";
        echo "</aside>";    }
    ?>
</div>