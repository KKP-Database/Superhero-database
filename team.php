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
        require("server/Team.php");
        require("server/MemberOf.php");
        require("server/Alignment.php");
        $team = Team::findById($_POST["teamID"]);
        $memberof = MemberOf::findByTeamId($team->getId());
        $alignment = Alignment::findById($team->getId());
    ?>
    <img id="upper_left" class="back_pic reflect" src="images/superman.png" width="500px" >

    <div class="container result">
        <div class="row text-center header">
            <div id="logo"></div>
        </div>

        <!--Character Start-->
        <div class="panel panel-success ">
            <div class="panel-heading text-center">
                <h4>Team
                </h4>
            </div>
            <div class="panel-body">

                <div class="row">

                    <div class="col-sm-offset-1 col-xs-10">
                        <div class="row">

                            <div class="col-xs-5">

                                <div class="panel panel-danger ">
                                    <div class="panel-heading text-center">
                                        <h3><?php echo $team->getName(); ?></h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-xs-8">
                                            <h4 class="text-primary">ALIGNMENT</h4>
                                            <p><?php echo $alignment->getAlignment(); ?></p>

                                            <h4 class="text-primary">TEAM LEADER</h4>
                                            <p>
                                                <?php 
                                                    foreach ($memberof as $member) {
                                                        if($member->getStatus() == "Leader") {
                                                            echo Superhero::findById($member->getSuperheroId())->getName();
                                                            break;
                                                        }
                                                    }
                                                ?>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-7 text-right">
                                <img src="<?php echo $team->getImageUrl(); ?>" class="img-thumbnail team-pic">
                            </div>

                        </div>
                        <br>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Team Members</h3>
                            </div>
                            <div class="panel-body">
                                <?php
                                    foreach ($memberof as $member) {
                                        echo "<div class='col-xs-2'>";
                                        echo "<div class='thumbnail'>";
                                        echo "<img src='" . Superhero::findById($member->getSuperheroId())->getImageUrl() . "' class='img-rounded member-pic' width='100px' height='80px'>";
                                        echo "<div class='caption text-center'>";
                                        echo "<p>" . Superhero::findById($member->getSuperheroId())->getName() . "</p>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                ?>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>