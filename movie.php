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
        require("server/Movie.php");
        require("server/Star.php");
        require("server/PortraitedIn.php");
        require("server/Director.php");
        $movie = Movie::findById($_POST["movieID"]);
        $portraitedin = PortraitedIn::findByMovieId($_POST["movieID"]);
        $director = Director::findById($_POST["movieID"]);
    ?>
    <img id="upper_left" class="reflect" src="images/spiderman.png" width="450px">

    <div class="container result">
        <div class="row text-center header">
            <div id="logo"></div>
        </div>

        <!--Character Start-->
        <div class="panel panel-info">
            <div class="panel-heading  text-center">
                MOVIE
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-xs-offset-1 col-xs-10 movie-body">
                        <div class="row">
                            <div class="row">
                                <h3 class="text-danger"><?php echo $movie->getName(); ?></h3>

                                <div class="row">
                                    <div class="col-xs-8">
                                        <iframe width="640px" height="315px" src="<?php echo $movie->getTrailerUrl(); ?>" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                    <div class="col-xs-4 text-right">
                                        <img src="<?php echo $movie->getPosterUrl() ?>" width="220px" height="315px" class="img-rounded">
                                    </div>
                                </div>

                                <h4 class="text-primary">Directed by</h4>
                                <p><?php echo $director->getFirstName() . " " . $director->getLastName(); ?></p>
                                <h4 class="text-primary">Rating</h4>
                                <p><?php echo $movie->getImdbScore(); ?></p>
                                <h4 class="text-primary">Plot</h4>
                                <p><?php echo $movie->getPlot(); ?></p>
                                <h4 class="text-primary">Cast</h4>
                                <div class="row">
                                    <?php
                                        foreach ($portraitedin as $starID) {
                                            $star = Star::findById($starID->getStarId());
                                            echo "<div class='col-xs-2'>";
                                            echo "<a href='#' id='" . $star->getId() . "' onclick='sendStarID(this.id)'>";
                                            echo "<div class='thumbnail'>";
                                            echo "<img src='" . $star->getImageUrl() . "' class='img-rounded' width='100px' height='80px'>";
                                            echo "<div class='caption text-center'>";
                                            echo "<p>" . $star->getFirstName() . " " . $star->getLastName() ."</p>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</a>";
                                            echo "</div>";
                                        }
                                    ?>
                                    <form id="star-form" action="star.php" method="post">
                                        <input type="hidden" name="starID" id="starID">
                                    </form>
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