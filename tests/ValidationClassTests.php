<?php

require_once ('../simpletest/autorun.php');

class ValidationClassTests extends UnitTestCase {

    public function setUp() {
        require_once ("../BeerDetails.php");
        require_once ("../ApiDetails.php");
        $this->beerDetails = new BeerDetails ();
        $this->apiDetails = new ApiDetails ();
    }

    public function testIsXmlValid() {
        $this->assertFalse($this->beerDetails->displayRandomBeer(""));
        $this->assertTrue($this->beerDetails->displayRandomBeer("https://api.brewerydb.com/v2/beer/random?key=6855e1ae7a9a5e8b1b1e8ead09b4fcec&format=xml"));
    }
    
    public function testValidContentType() {
        $this->assertFalse($this->apiDetails->setContentType("james")); 
        $this->assertFalse($this->apiDetails->setContentType("bububuyvyuvyuvyuvuyvyuv")); 
        $this->assertFalse($this->apiDetails->setContentType(""));
    }
    
    

}

?>