<?php namespace Addapp\Breezometer;

use GuzzleHttp\Client;

class Breezometer
{
    /**
     * @var string
     */
    private $apiKey;

    private $endpoint = 'http://api-beta.breezometer.com';

    /**
     * @var Client
     */
    private $client;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Get BreezoMeter Air Quality Index (BAQI) by Latitude & Longitude
     * @param string $lat
     * @param string $lon
     * @param string $time
     * @return array
     */
    public function baqi($lat = null, $lon = null, $time = null)
    {
        $this->guardAgainstEmptyArgument($lat, 'latitude');
        $this->guardAgainstEmptyArgument($lon, 'longitude');

        $baqi = $this->getClient()->get("{$this->endpoint}/baqi/?lat={$lat}&lon={$lon}&datetime={$time}&key={$this->apiKey}");

        return $baqi->json();
    }

    /**
     * Get BreezoMeter Air Quality Index (BAQI) by Address or Location
     * @param string $location
     * @param string $time
     * @return array
     */
    public function baqiFromLocation($location = null, $time = null)
    {
        $this->guardAgainstEmptyArgument($location, 'location');

        $baqi = $this->getClient()->get("{$this->endpoint}/baqi/?location={$location}&datetime={$time}&key={$this->apiKey}");

        return $baqi->json();
    }

    /**
     * Set the http client to use
     * @param $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * Get the guzzle client
     * @return Client
     */
    private function getClient()
    {
        if ($this->client) {
            return $this->client;
        }

        return new Client();
    }

    /**
     * Guard against empty arguments
     * @param string $argument
     * @param string $argumentName
     */
    private function guardAgainstEmptyArgument($argument, $argumentName)
    {
        if (empty($argument)) {
            throw new \InvalidArgumentException("$argumentName is required.");
        }
    }
}
