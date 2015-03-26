<?php namespace Nwidart\Breezometer\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Message\MessageFactory;
use GuzzleHttp\Subscriber\Mock;
use Nwidart\Breezometer\Breezometer;

class BreezometerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Breezometer
     */
    private $breezometer;

    public function setUp()
    {
        $breezometer = new Breezometer('123');

        $client = new Client();

        $fake = file_get_contents(__DIR__ . '/fixtures/new-york.json');
        $factory = new MessageFactory();
        $response = $factory->createResponse(200, ['Content-Type' => 'application/javascript'], $fake);

        $mock = new Mock([$response]);
        $client->getEmitter()->attach($mock);

        $breezometer->setClient($client);

        $this->breezometer = $breezometer;
    }

    /** @test */
    public function it_should_return_decoded_json()
    {
        $response = $this->breezometer->baqi('40.7324296', '-73.9977264');

        $this->assertArrayHasKey('country_name', $response);
    }

    /** @test */
    public function it_should_throw_exception_if_no_latitude_given()
    {
        $this->setExpectedException('InvalidArgumentException', 'latitude is required.');

        $this->breezometer->baqi(null, '-73.9977264');
    }
}
