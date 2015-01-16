<?php include 'includes/public_header.php'; ?>

<section class="content">
    <div class="row">

        <?php include 'includes/sidebar.php'; ?>
        <div class="right-content">
            <div class="col-sm-9">
                <div class="col-xs-12">
                    <div class="col-sm-5">

                        <?php

                        $navn = '';
                        $mail = '';
                        $besked = '';
                        $fejlnavn = '';
                        $fejlmail = '';
                        $fejlbesked = '';
                        $fejl = 0;
                        $success = 'Udfyld alle felter herunder:';

                        if ($_POST) {
                            if (isset($_POST['navn'])) {
                                if (empty($_POST['navn'])) {
                                    $fejlnavn = "Navn - Feltet er ikke udfyldt!";
                                    $fejl++;
                                } else {
                                    $navn = $_POST['navn'];
                                }
                            }

                            if (isset($_POST['mail'])) {
                                if (empty($_POST['mail'])) {
                                    $fejlmail = "E-mail - Feltet er ikke udfyldt!";
                                    $fejl++;
                                } else {
                                    $mail = $_POST['mail'];
                                }
                            }


                            if (isset($_POST['besked'])) {
                                if (empty($_POST['besked'])) {
                                    $fejlbesked = "Besked - Feltet er ikke udfyldt!";
                                    $fejlbesked = "Besked - Feltet er ikke udfyldt!";
                                    $fejl++;
                                } else {
                                    $besked = $_POST['besked'];
                                }
                            }

                            if ($fejl == 0) {
                                $navn = '';
                                $mail = '';
                                $besked = '';
                                $success = 'Tak for din henvendelse.';

                                $name = $_POST['navn'];
                                $email = $_POST['mail'];
                                $message = $_POST['besked'];
                                $subject = "Besked via Slipseknuden.dk";

                                $from = "From: $name<$email>\r\nReturn-path: $email";
                                mail("jesper@codex-design.com", $subject, $message, $from);
                            }
                        }
                        ?>



                        <!-- Kontaktformular -->

                        <form action="" method="post">
                            <fieldset>
                                <legend class="text-center">Kontakt os</legend>
                                <p><?php echo $success ?></p>

                                <div class="form-group">
                                    <input class="form-control" type="text" name="navn" placeholder="Navn / Firma"
                                           value="<?php echo $navn; ?>" size="30"/>

                                    <p><?php echo $fejlnavn; ?></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" name="mail" placeholder="E-mail"
                                           value="<?php echo $mail; ?>" size="30"/>

                                    <p> <?php echo $fejlmail; ?></p>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="besked"
                                              placeholder="Skriv din besked og så vender vi tilbage hurtigst muligt."
                                              cols="40" rows="7"><?php echo $besked; ?></textarea>

                                    <p><?php echo $fejlbesked; ?></p>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="kontakt-send">Send</button>
                                </div>
                            </fieldset>
                        </form>


                    </div>
                    <div class="col-sm-7">
                        <img src="images/10_tern.jpg">
                    </div>
                </div>

                <div class="col-xs-12 divider">
                    <div class="col-sm-5 kontaktinfo">

                        <?php
                        $sql = "SELECT * FROM sider WHERE Id='4'";
                        $result = mysqli_query($connection, $sql);
                        $row = mysqli_fetch_array($result);

                        echo $row['Indhold'];
                        ?>
                    </div>
                    <div class="col-sm-7">
                        <div id="map_canvas">
                            <script src="https://maps.googleapis.com/maps/api/js"></script>
                            <script>
                                function initialize() {
                                    var mapCanvas = document.getElementById('map_canvas');
                                    var mapOptions = {
                                        center: new google.maps.LatLng(55.62563129999999, 12.086093399999982),
                                        zoom: 15,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    }
                                    var map = new google.maps.Map(mapCanvas, mapOptions)
                                }
                                google.maps.event.addDomListener(window, 'load', initialize);
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
