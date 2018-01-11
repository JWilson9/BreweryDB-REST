<?php

require_once "BreweryDetails.php";
require_once "ApiDetails.php";

class BeerDetails extends BreweryDetails {

    public $randomBeerUrl;
    public $baseUrl = 'https://api.brewerydb.com/v2/';
    public $output = '';
    public $globBreweyId;

    public function setRandomBeerUrl($url) {
        $this->randomBeerUrl = $this->baseUrl . $url;
    }

    // override the function from parent class
    public function getUrl() {
        return $this->randomBeerUrl;
    }

    public function displayRandomBeer($randomBeerUrl) {
        if (!empty($randomBeerUrl)) {
            $breweryDetails = new BreweryDetails();
            $xml = file_get_contents($randomBeerUrl);
            $XML = simplexml_load_string($xml);
            $output = '';
            if (false === $xml) {
                return "could not load xml";
            }

            foreach ($XML->data as $data) {
                $globBreweyId = '';
                if(isset($data->style->category->id)){
                    $globBreweyId = $data->style->category->name;
                }
                                                
                //$breweryDetails->setBreweryName($globBreweyName);                 
               
                // only show beers which contain a description and a label
                if (isset($data->description) && isset($data->nameDisplay)) {

                    $output .= '<div class="col-sm-4">' . $data->name . '<br>';
                    if (isset($data->labels->medium)) {
                        $output .= '<img src="' . $data->labels->medium . '">';
                    }
                    $output .= '</div>';
                    $output .= '<div class="col-sm-4">' . $data->description . '</div>';
                } else {
                    $output .= '<div class="col-sm-4">There is no name for this beer</div>';
                    $output .= '<div class="col-sm-4">There is no description for this beer</div>';
                }
            }

            return array($output, $globBreweyId);
        }
    }

}
