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
    <script src="jquery-2.0.3.js" type="text/javascript"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css.css">
</head>

<body class="bg1">


    <img id="upper_left" class="reflect" src="images/superman.png" width="700px">

    <div class="container index">
        <div class="row text-center">
            <h1>SUPERHERO
                <span>DB</span>
            </h1>
            <form action="result.php" method="post" role="form">
                <div class="row">
                    <div class="col-xs-offset-3 col-xs-6">
                        <div class="form-group">
                            <input name="keyword" type="text" class="form-control keyword text-center" id="keyword" placeholder="Characters, Movies, Teams">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Search</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</body>

</html>