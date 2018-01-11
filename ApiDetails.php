<?php

class ApiDetails {

    public $baseUrl;
    public $apiKey;
    public $contentType;

    public function setUrl($url) {
        if (isset($url)) {
            $this->baseUrl = $url;
        }
    }

    public function getUrl() {
        return $this->baseUrl;
    }

    public function setApiKey($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function getApiKey() {
        return $this->apiKey;
    }

    public function setContentType($contentType) {
        if (!empty($contentType)) {
            if ($contentType == "XML" || $contentType == "JSON") {
                $this->contentType = $contentType;
            }
        }
    }

    public function getContentType() {
        return $this->contentType;
    }

}
