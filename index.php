<?php
include "ApiDetails.php";
include "BeerDetails.php";
include_once "BreweryDetails.php";
include_once "SearchDetails.php";
// https://api.brewerydb.com/v2/beer/random?key=6855e1ae7a9a5e8b1b1e8ead09b4fcec&format=xml
$baseUrl = 'https://api.brewerydb.com/v2/';

$apiKey = '6855e1ae7a9a5e8b1b1e8ead09b4fcec';
$format = 'xml';



$apiDetailsObj = new ApiDetails();
$beerDetails = new BeerDetails();
$breweryDetails = new BreweryDetails();
$searchDetails = new SearchDetails();
$apiDetailsObj->setUrl($baseUrl);
$apiDetailsObj->getUrl();

// set API key
$apiDetailsObj->setApiKey($apiKey);
$apiDetailsObj->getApiKey();

// init the object of class BeerDetails
// setting the URL (overriding) and passing into customer function
$beerDetails->setRandomBeerUrl('beer/random?key=');
$randomBeerUrl = $beerDetails->getUrl() . $apiDetailsObj->getApiKey() . '&format=' . $format;
$breweyName;
?>
<!DOCTYPE html>
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

        <div class="row solid">
            <?php
            echo $beerDetails->displayRandomBeer($randomBeerUrl)[0];
            // getting the name of the brewery, used for more info on brewery
            $breweyId = $beerDetails->displayRandomBeer($randomBeerUrl)[1];
            ?> 
            <div class="col-sm-4">

                <button class="btn btn-primary custom-btn" value="Refresh Page" onClick="window.location.reload()"> Randomize Beer</button>

                <form method="post">
                    <button class="btn btn-primary custom-btn" name="more" id="more" type="submit" > More from this brewery </button>
                </form>
            </div>
        </div>

        <form name="form" action="search.php" method="post">
            <div class="col-lg-6">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" id="search">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit">Go!</button>
                    </span>
                </div>
            </div>  
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary active">
                    <input type="radio" name="type" id="beer" value="beer" checked> Beer
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="type" id="brewery" value="brewery"> Brewery
                </label>                        
            </div>
        </form>
        <h2> Search Results: </h2>

        <?php
        if (array_key_exists('more', $_POST)) {
            $parts = preg_split('/\s+/', $breweyId);
            // exploding function to get the brewery first name, as we can't get the brewery ID
            echo $breweryDetails->getBreweyDetailsData($parts[0], $apiDetailsObj->getApiKey());
        }

        if (array_key_exists('random', $_POST)) {
            $parts = preg_split('/\s+/', $breweyId);
            // exploding function to get the brewery first name, as we can't get the brewery ID
            echo $beerDetails->displayRandomBeer($randomBeerUrl)[0];
        }
        ?>
    </body>
</html>
