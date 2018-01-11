<?php

class SearchDetails {

    // search for both beer & brewery
    public function searchResults($searchUrl, $userInputSearch) {
        $output = '';

        $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
        if (!preg_match($pattern, $userInputSearch)) {
            $xml = file_get_contents($searchUrl);
            $XML = simplexml_load_string($xml);
            if (false === $XML) {
                return "could not load xml";
            }
            foreach ($XML->data as $data) {
                foreach ($data->item as $item) {
                    
                    $output .= '<h3> Heading item </h3>';
                    $output .= $item->name . '<br>';
                    $output .= '<h3> Heading Description </h3>';
                    $output .= $item->description . '<br>';
                }
            }
        } else {
            echo "Enter valid data";
        }

        return $output;
    }

}
