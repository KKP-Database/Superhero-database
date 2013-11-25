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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="server.js" type="text/javascript"></script>
</head>

<body class="bg2">
    <?php 
        require("server/DatabasePDO.php");
        require("server/Star.php");
        require("server/PortraitedBy.php");
        require("server/PortraitedIn.php");
        require("server/Superhero.php");
        require("server/Movie.php");
        $star = Star::findById($_POST["starID"]);
        $portraitedin = PortraitedIn::findByStarId($star->getId());
        $portraitedby = PortraitedBy::findByStarId($star->getId());
    ?>
    <img id="upper_left" class="reflect" src="images/spiderman.png" width="450px">

    <div class="container result">
        <div class="row text-center header">
            <div id="logo"></div>
        </div>

        <!--Character Start-->
        <div class="panel panel-default">
            <div class="panel-heading  text-center">
                STAR
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-xs-offset-1 col-xs-10 movie-body">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <div class="row">
                                    <div class="alert alert2 alert-success col-xs-offset-1 col-xs-10">
                                        <span class="versus-hero-topic"><?php echo $star->getFirstName() . " " . $star->getLastName(); ?></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <img src="<?php echo $star->getImageUrl(); ?>" width="280px" height="400px" class="img-rounded">
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <h4 class="text-primary">Born</h4>
                                <p><?php echo $star->getBirthdate(); ?></p>

                                <h4 class="text-primary">Known in</h4>
                                <div class="row">
                                    <?php
                                        foreach($portraitedin as $movieID) {
                                            $movie = Movie::findById($movieID->getMovieId());
                                            echo "<div class='col-xs-3'>";
                                            echo "<a href='#' id='" . $movie->getId() . "' onclick='sendMovieID(this.id)'>";
                                            echo "<div class='thumbnail'>";
                                            echo "<img src='" . $movie->getPosterUrl() . "'>";
                                            echo "<div class='caption text-center'>";
                                            echo "<p>" . $movie->getName() . "</p>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</a>";
                                            echo "</div>";
                                        }
                                    ?>
                                    <form id="movie-form" action="movie.php" method="post"> 
                                        <input type="hidden" name="movieID" id="movieID">
                                    </form>
                                </div>
                                <h4 class="text-primary">Character</h4>
                                <div class="row">
                                    <?php
                                        foreach($portraitedby as $superheroID) {
                                            $superhero = Superhero::findById($superheroID->getSuperheroId());
                                            echo "<div class='col-xs-3'>";
                                            echo "<a href='#' id='" . $superhero->getId() . "' onclick='sendSuperheroID(this.id)'>";
                                            echo "<div class='thumbnail'>";
                                            echo "<img src='" . $superhero->getImageUrl() . "'>";
                                            echo "<div class='caption text-center'>";
                                            echo "<p>" . $superhero->getName() . "</p>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</a>";
                                            echo "</div>";
                                        }
                                    ?>
                                    <form id="superhero-form" action="superhero.php" method="post"> 
                                        <input type="hidden" name="superheroID" id="superheroID">
                                    </form>
                                </div>
                            </div>



                        </div>





                    </div>

                </div>
            </div>

        </div>

    </div>




    <!-- Character End -->


    </div>

</body>

</html>