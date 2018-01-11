<?php
include "SearchDetails.php";

$searchDetails = new SearchDetails();
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>James Wilson Code Test</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img alt="BreweryDB API" src="">
                    </a>
                </div>
            </div>
        </nav>

        <h2> Search Results: </h2>
        <?php
        if (isset($_POST['search']) && isset($_POST['type'])) {
            $url = "https://api.brewerydb.com/v2/search?q=" . $_POST['search'] . '&type=' . $_POST['type'] . '&key=6855e1ae7a9a5e8b1b1e8ead09b4fcec&format=xml';
            $userInputSearch = $_POST['search'];
            echo $searchDetails->searchResults($url, $userInputSearch);
        }
        ?>
    </body>
</html>
