<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Superhero Database</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="server.js" type="text/javascript"></script>
</head>

<body class="bg2">
    <?php 
        require("server/DatabasePDO.php");
        require("server/Power.php");
        require("server/Superhero.php");
//        $powers = Power::findAllAvg();
        $powers = Power::findTopRankSH();
        $team_powers = Power::findTopRankTeam();
    ?>
    <img id="upper_right" class="reflect back-panel" src="images/ironman.png" width="500px">

    <div class="container result">
        <div class="row text-center header">
            <div class="row">
                <div id="logo"></div>
            </div>
            <br>
            <br>
        </div>

        <!--Character Start-->
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h4>Superhero Ranking
                </h4>
            </div>
            <div class="panel-body">
                <div class="col-xs-offset-1 col-xs-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Rank</th>

                                <th colspan="2">Superhero</th>
                                <th>Total Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $count = 1;
                                foreach ($powers as $power) {
//                                    $superhero = Superhero::findByPowerId($power[1]);
                                    if($count == 1) echo "<tr class='danger rank1'>";
                                    else echo "<tr>";
                                    echo "<td class='col-xs-2'>#" . $count . "</td>";
                                    echo "<td class='col-xs-2 text-center'>";
                                    echo "<a href='#' id='" . $power['superhero_id'] . "' onclick='sendSuperheroID(this.id)'>";
                                    echo "<img src='" . $power['image_url'] . "'>";
                                    echo "</a>";
                                    echo "</td>";
<<<<<<< HEAD
                                    echo "<td><a href='#' id='" . $superhero->getId() . "' onclick='sendSuperheroID(this.id)'>" . $superhero->getName() . "</a></td>";
                                    echo "<td class='col-xs-2'>" . substr($power[0], 0, 3) . "</td>";
=======
                                    echo "<td><a href='#' id='" . $power['superhero_id'] . "' onclick='sendSuperheroID(this.id)'>".$power['name']."</a></td>";
                                    echo "<td class='col-xs-2'>" . sprintf('%0.2f',$power['score']). "</td>";
>>>>>>> 082ae96c2bc4049b51c51e0043deb9a97b637182
                                    echo "</tr>";
                                    $count++;
                                }
                            ?>
                            <form id="superhero-form" action="superhero.php" method="post">
                                <input id="superheroID" type="hidden" name="superheroID">
                            </form>
                        </tbody>
                    </table>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Rank</th>

                                <th colspan="2">Team</th>
                                <th>Total Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $count = 1;
                                foreach ($team_powers as $t_power) {
                                    if($count == 1) echo "<tr class='warning rank1'>";
                                    else echo "<tr>";
                                    echo "<td class='col-xs-2'>#" . $count . "</td>";
                                    echo "<td class='col-xs-2 text-center'>";
                                    echo "<a href='#' id='" . $t_power['team_id'] . "' onclick='sendTeamID(this.id)'>";
                                    echo "<img id='team' src='" . $t_power['image_url'] . "'>";
                                    echo "</a>";
                                    echo "</td>";
                                    echo "<td><a href='#' id='" . $t_power['team_id'] . "' onclick='sendTeamID(this.id)'>".$t_power['name']."</a></td>";
                                    echo "<td class='col-xs-2'>" . sprintf('%0.2f', $t_power['avg_score']) . "</td>";
                                    echo "</tr>";
                                    $count++;
                                }
                            ?>
                            <form id="team-form" action="team.php" method="post">
                                <input id="teamID" type="hidden" name="teamID">
                            </form>
                        </tbody>
                    </table>
                    
                </div>


            </div>
        </div>
        <!-- Character End -->


    </div>

</body>

</html>