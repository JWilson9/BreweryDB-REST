<?php

require_once "BreweryDetails.php";

class BreweryDetails {

    public $breweryName;

    public function setBreweryName($globBreweyName) {
        $this->breweryName = $globBreweyName;
    }

    public function getBreweryName() {
        return $this->breweryName;
    }

    public function getBreweyDetailsData($breweyName, $apiKey) {
        $url = "https://api.brewerydb.com/v2/search?q=" . $breweyName . '&type=brewery&key=' . $apiKey . '&format=xml';
        $xml = file_get_contents($url);
        $XML = simplexml_load_string($xml);
        $output = '';
        foreach ($XML->data as $data) {
            foreach ($data->item as $item) {
                $output .= '<h3> Heading item </h3>';
                $output .= $item->name . '<br>';
                $output .= '<h3> Heading Description </h3>';
                $output .= $item->description . '<br>';
            }
        }
        return $output;
    }

}
