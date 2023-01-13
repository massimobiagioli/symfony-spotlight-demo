<?php

namespace App\Tests\Application;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DeviceTest extends WebTestCase
{
    public function testFindAllDevices(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/devices');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('Content-Type', 'application/json');
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testFindSingleDevice(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/devices/1');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('Content-Type', 'application/json');
        $this->assertJson($client->getResponse()->getContent());
    }
}
