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

    <!-- lightbox -->
    <script src="lightbox/js/jquery-1.10.2.min.js"></script>
    <script src="lightbox/js/lightbox-2.6.min.js"></script>
    <link href="lightbox/css/lightbox.css" rel="stylesheet" />

    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="rotate.css">

    <script src="server.js" type="text/javascript"></script>
</head>

<body class="bg2">
    <?php 
        require("server/DatabasePDO.php");
        require("server/Superhero.php");
        require("server/Team.php");
        require("server/Power.php");
        require("server/Gallery.php");
        require("server/Alignment.php");
        require("server/MemberOf.php");
        require("server/PortraitedBy.php");
        require("server/Star.php");
        $superhero = Superhero::findById($_POST["superheroID"]);
        $power = Power::findBySuperheroId($superhero->getId());
        $alignment = Alignment::findBySuperheroId($superhero->getId());
        $memberof = MemberOf::findBySuperheroId($superhero->getId());
        $portraitedby = PortraitedBy::findBySuperheroId($superhero->getId());
        $gallerys = Gallery::findBySuperheroId($superhero->getId());
    ?>
    <img id="upper_right" class="reflect ironman" src="images/ironman.png" width="450px">

    <div class="container result">
        <div class="row text-center header">
            <div id="logo"></div>
        </div>

        <!--Character Start-->
        <div class="panel panel-warning ">
            <div class="panel-heading text-center">
                <h4>CHARACTER
                </h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-4 text-center">
                        <br>
                        <div class="col-xs-12">
                            <img src="<?php echo $superhero->getImageUrl(); ?>" class="img-rounded" width="300px" height="450px">

                        </div>
                    </div>
                    <div class="col-xs-4">

                        <h3 class="text-danger">BIOGRAPHY</h3>

                        <div class="row bio">
                            <div class="col-sm-4">
                                <strong>Name</strong>
                            </div>
                            <div class="col-sm-8"><?php echo $superhero->getName(); ?></div>
                        </div>
                        <div class="row bio">
                            <div class="col-sm-4">
                                <strong>Realname</strong>
                            </div>
                            <div class="col-sm-8"><?php echo $superhero->getRealName(); ?></div>
                        </div>
                        <div class="row bio">
                            <div class="col-sm-4">
                                <strong>Nicknames</strong>
                            </div>
                            <div class="col-sm-8"><?php echo $superhero->getNickname(); ?></div>
                        </div>
                        <div class="row bio">
                            <div class="col-sm-4">
                                <strong>Alignment</strong>
                            </div>
                            <div class="col-sm-8"><?php echo $alignment->getAlignment(); ?></div>
                        </div>
                        
                        <div class="row bio">
                            <div class="col-sm-4">
                                <strong>Team</strong>
                            </div>
                            <div class="col-sm-8">
                                <?php
                                    foreach ($memberof as $member) {
                                        echo "<a href='#' id='" . $member->getTeamId() . "' onclick='sendTeamID(this.id)'>" . Team::findById($member->getTeamId())->getName() . "</a><br>";
                                    }
                                ?>
                                <form id="team-form" action="team.php" method="post">
                                    <input type="hidden" name="teamID" id="teamID">
                                </form>
                            </div>
                        </div>
                        <div class="row bio">
                            <div class="col-sm-4">
                                <strong>Starring</strong>
                            </div>
                            <div class="col-sm-8">
                                <?php
                                    foreach ($portraitedby as $star) {
                                        echo "<a href='#' id='" . $star->getStarId() . "' onclick='sendStarID(this.id)'>" . Star::findById($star->getStarId())->getFirstName() . " " . Star::findById($star->getStarId())->getLastName() . "</a><br>";
                                    }
                                ?>
                                <form id="star-form" action="star.php" method="post">
                                    <input type="hidden" name="starID" id="starID">
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <!--Power-->
                    <div class="col-xs-4">
                        <h3 class="text-danger">POWERGRID</h3>
                        <div class="row">
                            <div class="col-sm-4">
                                <strong>Intelligence</strong>
                            </div>
                            <div class="col-sm-6">
                                <div class="progress progress-striped active">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $power->getIntelligence(); ?>%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <strong>Strength</strong>
                            </div>
                            <div class="col-sm-6">
                                <div class="progress progress-striped active">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $power->getStrength(); ?>%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <strong>Speed</strong>
                            </div>
                            <div class="col-sm-6">
                                <div class="progress progress-striped active">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $power->getSpeed(); ?>%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <strong>Durability</strong>
                            </div>
                            <div class="col-sm-6">
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $power->getDurability(); ?>%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <strong>Power</strong>
                            </div>
                            <div class="col-sm-6">
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $power->getPower(); ?>%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <strong>Combat</strong>
                            </div>
                            <div class="col-sm-6">
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $power->getCombat(); ?>%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--    Power End -->
                <div class="row">

                    <div class="col-xs-4 text-center">
                        <h3 class="text-danger">VERSUS</h3>
                        <form class="form-inline" role="form" action="versus.php" method="post">
                            <div class="row">
                                <div class="col-xs-offset-1 col-xs-10">
                                    <select name="opponent" class="form-control input-lg">
                                        <?php
                                            $superheroAll = Superhero::findAll();
                                            foreach ($superheroAll as $superhero) {
                                                echo "<option value='" . $superhero->getId() . "'>";
                                                echo $superhero->getName();
                                                echo "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <?php echo "<input type='hidden' name='current' value='" . $superhero->getId() . "'>"; ?>
                                <button type="submit" class="btn btn-primary btn-lg button-versus">Versus</button>
                            </div>

                        </form>
                    </div>
                    <div class="col-xs-8">
                        <h3 class="text-danger">GALLERY</h3>
                        <div class="row">
                            <?php 
                                foreach ($gallerys as $gallery) {
                                    echo "<div class='col-xs-6'>";
                                    echo "<a href='" . $gallery->getGalleryUrl() . "' data-lightbox='gallery'>";
                                    echo "<img src='" . $gallery->getGalleryUrl() . "' class='img-thumbnail gallery'>";
                                    echo "</a>";
                                    echo "</div>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>