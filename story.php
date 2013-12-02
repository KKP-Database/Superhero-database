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
        require("server/Story.php");
        require("server/Superhero.php");
        require("server/SuperheroOf.php");
        require("server/Publisher.php");
        require("server/CreatedBy.php");
        require("server/Author.php");
        $story = Story::findById($_POST["storyID"]);
        $publisher = Publisher::findById($story->getId());
        $superheroof = SuperheroOf::findByStoryId($story->getId());
        $createdby = CreatedBy::findByStoryId($story->getId());
    ?>
    <img id="upper_left" class="reflect" src="images/spiderman.png" width="450px">

    <div class="container result">
        <div class="row text-center header">
            <div id="logo"></div>
        </div>

        <!--Character Start-->
        <div class="panel panel-danger">
            <div class="panel-heading  text-center">
                STORY
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-xs-offset-1 col-xs-10 movie-body">
                        <div class="row">
                            <div class="row">
                                <h3 class="text-danger">
                                    <?php echo $story->getName(); ?>
                                    <span>(<?php echo $story->getCreatedYear(); ?>)</span>
                                </h3>

                                <div class="row">
                                    <div class="col-xs-4">
                                        <img src="<?php echo $story->getImageUrl() ?>" width="220px" height="315px" class="img-rounded">
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="text-primary">Publisher</h4>
                                        <p><?php echo $publisher->getName(); ?></p>
                                        <h4 class="text-primary">Created by</h4>
                                        <?php 
                                            foreach ($createdby as $authorID) {
                                                $author = Author::findById($authorID->getAuthorId());
                                                echo "<p>" . $author->getFirstName() . " " . $author->getLastName() . "</p>";
                                            }
                                        ?>
                                        <h4 class="text-primary">Plot</h4>
                                        <p><?php echo $story->getPlot(); ?></p>
                                    </div>
                                </div>


                                <h4 class="text-primary">Character</h4>
                                <div class="row">
                                    <?php
                                        foreach ($superheroof as $superheroID) {
                                            $superhero = Superhero::findById($superheroID->getSuperheroId());
                                            echo "<div class='col-xs-2'>";
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
                                        <input id="superheroID" type="hidden" name="superheroID">
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