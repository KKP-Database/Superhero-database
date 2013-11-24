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
                            echo "<a href='character.html'>";
                            echo "<img src='" . $superhero->getImageUrl() . "' class='img-circle' width='150px' height='150px'>";
                            echo "</a>";
                            echo "</div>";
                            echo "<div class='row'>";
                            echo "<a href='character.html'>";
                            echo "<h5>" . $superhero->getName() . "</h5>";
                            echo "</a>";
                            echo "</div>";
                            echo "</div>";
                        }
                    ?>
                </div>

            </div>
        </div>
        <!-- Character End -->

        <!--Story Start-->
        <div class="panel panel-danger ">
            <div class="panel-heading text-center">
                <h4>STORY
                    <span class="label label-danger">4 Results</span>
                </h4>
            </div>
            <div class="panel-body">
                 <div class="row">
                    <div class="col-xs-2 text-center">
                        <div class="row">
                            <a href="story.html">
                                <img src="http://upload.wikimedia.org/wikipedia/th/thumb/7/72/Superman.jpg/250px-Superman.jpg" class="img-circle" width="150px" height="150px">
                            </a>
                        </div>
                        <div class="row">
                            <a href="story.html">
                                <h5>SUPERMAN</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-2 text-center">
                        <div class="row">
                            <a href="story.html">
                                <img src="http://upload.wikimedia.org/wikipedia/th/thumb/7/72/Superman.jpg/250px-Superman.jpg" class="img-circle" width="150px" height="150px">
                            </a>
                        </div>
                        <div class="row">
                            <a href="story.html">
                                <h5>SUPERMAN</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Story End -->

        <!-- Movie Start-->
        <div class="panel panel-info">
            <div class="panel-heading  text-center">
                <h4>MOVIE
                    <span class="label label-info">5 Results</span>
                </h4>
            </div>
            <div class="panel-body">
                 <div class="row">
                    <div class="col-xs-2 text-center">
                        <div class="row">
                            <a href="movie.html">
                                <img src="http://upload.wikimedia.org/wikipedia/th/thumb/7/72/Superman.jpg/250px-Superman.jpg" class="img-circle" width="150px" height="150px">
                            </a>
                        </div>
                        <div class="row">
                            <a href="movie.html">
                                <h5>SUPERMAN</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-2 text-center">
                        <div class="row">
                            <a href="movie.html">
                                <img src="http://upload.wikimedia.org/wikipedia/th/thumb/7/72/Superman.jpg/250px-Superman.jpg" class="img-circle" width="150px" height="150px">
                            </a>
                        </div>
                        <div class="row">
                            <a href="movie.html">
                                <h5>SUPERMAN</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Movie End-->

        <!-- Team Start-->
        <div class="panel panel-success">
            <div class="panel-heading  text-center">
                <h4>Team
                    <span class="label label-success">2 Results</span>
                </h4>
            </div>
            <div class="panel-body">
                 <div class="row">
                    <div class="col-xs-2 text-center">
                        <div class="row">
                            <a href="team.html">
                                <img src="http://upload.wikimedia.org/wikipedia/th/thumb/7/72/Superman.jpg/250px-Superman.jpg" class="img-circle" width="150px" height="150px">
                            </a>
                        </div>
                        <div class="row">
                            <a href="team.html">
                                <h5>SUPERMAN</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-2 text-center">
                        <div class="row">
                            <a href="team.html">
                                <img src="http://upload.wikimedia.org/wikipedia/th/thumb/7/72/Superman.jpg/250px-Superman.jpg" class="img-circle" width="150px" height="150px">
                            </a>
                        </div>
                        <div class="row">
                            <a href="team.html">
                                <h5>SUPERMAN</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Team End-->

    </div>

</body>

</html>