<?php

namespace Tests\Unit;

use Tests\TestCase;
use GuzzleHttp;


class GeoIpTest extends TestCase
{

    protected $client;

    protected $url;

    protected function setUp()
    {
        parent::setUp();
        $this->client = new GuzzleHttp\Client();
        $this->url = env('APP_URL') . '/api/v1';
    }

    /**
     * @return void
     */
    public function testGeoIpInvalidIp()
    {
        $testIp = '127.0.0.543';

        try {
            $this->client->request('GET',  $this->url . '/geoip/' . $testIp);
        }
        catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
        }

        $this->assertEquals(400, $response->getStatusCode());
    }

    /**
     * @return void
     */
    public function testGeoIpNotFound()
    {
        $testIp = '127.0.0.1';

        try {
            $this->client->request('GET',  $this->url . '/geoip/' . $testIp);
        }
        catch (GuzzleHttp\Exception\ClientException $e) {
            $response = $e->getResponse();
        }

        $this->assertEquals(404, $response->getStatusCode());
    }

    /**
     * @return void
     */
    public function testIfIpIsFromSweden()
    {
        $testIps = [
            '5.133.204.200',
            '5.157.24.200',
            '5.249.161.200',
            '17.79.135.200',
        ];

        foreach ($testIps as $testIp) {
            try {
                $response = $this->client->request('GET',  $this->url . '/geoip/' . $testIp);
                $this->assertEquals(200, $response->getStatusCode());
                $this->assertEquals('{"Country":"Sweden"}', $response->getBody());
            }
            catch (GuzzleHttp\Exception\ClientException $e) {
                $response = $e->getResponse();
            }
        }
    }

}
