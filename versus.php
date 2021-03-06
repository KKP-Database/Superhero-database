<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Superhero Database</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="rotate.css">

</head>

<body class="bg2">
    <?php 
        require("server/DatabasePDO.php");
        require("server/Superhero.php");
        require("server/Power.php");
        $current = Superhero::findById($_POST["current"]);
        $opponent = Superhero::findById($_POST["opponent"]);
        $cpower = Power::findById($current->getPowerId());
        $opower = Power::findById($opponent->getPowerId());
        $avgcpower = Power::findAvg($current->getPowerId());
        $avgopower = Power::findAvg($opponent->getPowerId());
        $avgcpower = doubleval($avgcpower[0]);
        $avgopower = doubleval($avgopower[0]);
    ?>
    <img id="upper_left" class="back_pic" src="images/batman.png" width="490px">

    <div class="container result">
        <div class="row text-center header">
            <div id="logo"></div>
        </div>

        <!--Character Start-->
        <div class="panel panel-warning ">
            <div class="panel-heading text-center">
                <h4>VERSUS</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-5 text-center">
                        <div class="alert alert3 alert-success col-xs-offset-2 col-xs-8">
                            <span class="versus-hero-topic"><?php echo $current->getName(); ?></span>
                        </div>
                        <div class="row">
                            <img src="<?php echo $current->getImageUrl(); ?>" width="200px" height="300px">
                        </div>
                        <div class="row">
                            <?php
                                if($avgopower > $avgcpower) {
                                    echo "<div class='circle lose'>";
                                    echo "LOSE";
                                    echo "</div>";
                                }
                                else {
                                    echo "<div class='circle win'>";
                                    echo "WIN";
                                    echo "</div>";   
                                }
                            ?>
                        </div>

                        <!--Power-->
                        <div class="text-right">
                            <h4 class="text-danger text-center power-topic">POWERGRID</h4>
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Intelligence</strong>
                                </div>
                                <div class="col-sm-7">
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $cpower->getIntelligence(); ?>%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Strength</strong>
                                </div>
                                <div class="col-sm-7">
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $cpower->getStrength(); ?>%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Speed</strong>
                                </div>
                                <div class="col-sm-7">
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $cpower->getSpeed(); ?>%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Durability</strong>
                                </div>
                                <div class="col-sm-7">
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $cpower->getDurability(); ?>%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Power</strong>
                                </div>
                                <div class="col-sm-7">
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $cpower->getPower(); ?>%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Combat</strong>
                                </div>
                                <div class="col-sm-7">
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $cpower->getCombat(); ?>%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--    Power End -->



                    <div class="col-xs-2">
                            <img src="images/vs.png" width="100%" class="versus-img">

                    </div>
                   <div class="col-xs-5 text-center">
                        <div class="alert alert3 alert-danger col-xs-offset-2 col-xs-8">
                            <span class="versus-hero-topic"><?php echo $opponent->getName(); ?></span>
                        </div>
                        <div class="row">
                            <img src="<?php echo $opponent->getImageUrl(); ?>" width="200px" height="300px">
                        </div>
                        <div class="row">
                            <?php
                                if($avgopower < $avgcpower) {
                                    echo "<div class='circle lose'>";
                                    echo "LOSE";
                                    echo "</div>";
                                }
                                else {
                                    echo "<div class='circle win'>";
                                    echo "WIN";
                                    echo "</div>";   
                                }
                            ?>
                        </div>

                        <!--Power-->
                        <div class="text-right">
                            <h4 class="text-danger text-center power-topic">POWERGRID</h4>
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Intelligence</strong>
                                </div>
                                <div class="col-sm-7">
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $opower->getIntelligence(); ?>%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Strength</strong>
                                </div>
                                <div class="col-sm-7">
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $opower->getStrength(); ?>%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Speed</strong>
                                </div>
                                <div class="col-sm-7">
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $opower->getSpeed(); ?>%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Durability</strong>
                                </div>
                                <div class="col-sm-7">
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $opower->getDurability(); ?>%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Power</strong>
                                </div>
                                <div class="col-sm-7">
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $opower->getPower(); ?>%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Combat</strong>
                                </div>
                                <div class="col-sm-7">
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $opower->getCombat(); ?>%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--    Power End -->

                </div>
            </div>
        </div>
    </div>


</body>

</html>