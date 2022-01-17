<?php

/**
 * Description of ExternalService
 *
 * @author Daniel
 */
class ExternalService {

    private static $instance;
    private $options = [];
    private $url = 'https://www.become.co/api/rest/test/';
    private $username = <username>;
    private $password = <password>;
    private $headers = [
        'Accept: application/json',
        'Content-Type: application/json',
    ];

    /**
     * Set options for the curl call on construction.
     */
    public function __construct() {
        $this->options[CURLOPT_URL] = $this->url;
        $this->options[CURLOPT_USERNAME] = $this->username;
        $this->options[CURLOPT_PASSWORD] = $this->password;
        $this->options[CURLOPT_HTTPHEADER] = $this->headers;
        $this->options[CURLOPT_HEADER] = 0;
        $this->options[CURLOPT_RETURNTRANSFER] = true;

        // Timeout in seconds
        $this->options[CURLOPT_TIMEOUT] = 30;
    }

    /**
     * @return \ExternalService
     */
    public static function invoke(): ExternalService {
        if (is_null(static::$instance)) {
            static::$instance = new self();
        }
        return static::$instance;
    }

    /**
     * Calling external API.
     * 
     * @return type json string.
     */
    public function call() {
        $ch = curl_init();
        curl_setopt_array($ch, $this->options);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

}
