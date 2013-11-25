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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css.css">
    <script src="server.js" type="text/javascript"></script>
</head>

<body class="bg2">
    <?php 
        require("server/DatabasePDO.php");
        require("server/Superhero.php");
        require("server/Team.php");
        require("server/Movie.php");
        require("server/Story.php");
        $superheros = Superhero::findByName($_POST["keyword"]);
        $teams = Team::findByName($_POST["keyword"]);
        $movies = Movie::findByName($_POST["keyword"]);
        $stories = Story::findByName($_POST["keyword"]);
    ?>
    <img id="upper_right" class="reflect back-panel" src="images/ironman.png" width="500px">

    <div class="container result">
        <div class="row text-center header">
            <div class="row">
                <div id="logo"></div>
            </div>
            <br>
            <br>
            <div class="alert alert2 alert-success col-xs-offset-4 col-xs-4">
                <h3>
                    <span class="glyphicon glyphicon-search"></span>RESULT :
                    <span><?php echo $_POST["keyword"]; ?></span>
                </h3>
            </div>

        </div>

        <!--Character Start-->
        <div class="panel panel-warning">
            <div class="panel-heading text-center">
                <h4>CHARACTER
                    <span class="label label-warning"><?php echo count($superheros); ?> Results</span>
                </h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php
                        foreach($superheros as $superhero) {
                            echo "<div class='col-xs-2 text-center'>";        
                            echo "<div class='row'>";
                            echo "<a href='#' id='" . $superhero->getId() . "' onclick='sendSuperheroID(this.id)'>";
                            echo "<img src='" . $superhero->getImageUrl() . "' class='img-circle' width='150px' height='150px'>";
                            echo "</a>";
                            echo "</div>";
                            echo "<div class='row'>";
                            echo "<a href='#' id='" . $superhero->getId() . "' onclick='sendSuperheroID(this.id)'>";
                            echo "<h5>" . $superhero->getName() . "</h5>";
                            echo "</a>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>
            <form id="superhero-form" action="superhero.php" method="post">
                <input id="superheroID" type="hidden" name="superheroID">
            </form>
        </div>
        <!-- Character End -->

        <!--Story Start-->
        <div class="panel panel-danger ">
            <div class="panel-heading text-center">
                <h4>STORY
                    <span class="label label-danger"><?php echo count($stories); ?> Results</span>
                </h4>
            </div>
            <div class="panel-body">
                 <div class="row">
                    <?php
                        foreach($stories as $story) {
                            echo "<div class='col-xs-2 text-center'>";        
                            echo "<div class='row'>";
                            echo "<a href='#' id='" . $story->getId() . "' onclick='sendStoryID(this.id)'>";
                            echo "<img src='" . $story->getImageUrl() . "' class='img-circle' width='150px' height='150px'>";
                            echo "</a>";
                            echo "</div>";
                            echo "<div class='row'>";
                            echo "<a href='#' id='" . $story->getId() . "' onclick='sendStoryID(this.id)'>";
                            echo "<h5>" . $story->getName() . "</h5>";
                            echo "</a>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                </div>  
            </div>
            <form id="story-form" action="story.php" method="post">
                <input id="storyID" type="hidden" name="storyID">
            </form>
        </div>
        <!-- Story End -->

        <!-- Movie Start-->
        <div class="panel panel-info">
            <div class="panel-heading  text-center">
                <h4>MOVIE
                    <span class="label label-info"><?php echo count($movies); ?> Results</span>
                </h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php
                        foreach($movies as $movie) {
                            echo "<div class='col-xs-2 text-center'>";        
                            echo "<div class='row'>";
                            echo "<a href='#' id='" . $movie->getId() . "' onclick='sendMovieID(this.id)'>";
                            echo "<img src='" . $movie->getPosterUrl() . "' class='img-circle' width='150px' height='150px'>";
                            echo "</a>";
                            echo "</div>";
                            echo "<div class='row'>";
                            echo "<a href='#' id='" . $movie->getId() . "' onclick='sendMovieID(this.id)'>";
                            echo "<h5>" . $movie->getName() . "</h5>";
                            echo "</a>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>        
                </div>
            </div>
            <form id="movie-form" action="movie.php" method="post">
                <input id="movieID" type="hidden" name="movieID">
            </form>
        </div>
        <!--Movie End-->

        <!-- Team Start-->
        <div class="panel panel-success">
            <div class="panel-heading  text-center">
                <h4>Team
                    <span class="label label-success"><?php echo count($teams); ?> Results</span>
                </h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php
                        foreach($teams as $team) {
                            echo "<div class='col-xs-2 text-center'>";        
                            echo "<div class='row'>";
                            echo "<a href='#' id='" . $team->getId() . "' onclick='sendTeamID(this.id)'>";
                            echo "<img src='" . $team->getImageUrl() . "' class='img-circle' width='150px' height='150px'>";
                            echo "</a>";
                            echo "</div>";
                            echo "<div class='row'>";
                            echo "<a href='#' id='" . $team->getId() . "' onclick='sendTeamID(this.id)'>";
                            echo "<h5>" . $team->getName() . "</h5>";
                            echo "</a>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                </div>    
            </div>
            <form id="team-form" action="team.php" method="post">
                <input id="teamID" type="hidden" name="teamID">
            </form>
        </div>
        <!--Team End-->

    </div>

</body>

</html>