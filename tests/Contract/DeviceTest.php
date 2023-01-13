<?php

namespace App\Tests\Contract;

use App\Tests\Helper\ContractTestCase;

class DeviceTest extends ContractTestCase
{
    public function testFindAllDevices(): void
    {
        $response = $this->get('/api/devices');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('application/json', $response->getHeaders()['content-type'][0]);
        $this->assertJson($response->getContent());
    }

    public function testFindSingleDevice(): void
    {
        $response = $this->get('/api/devices/556df325-d9c3-4df4-b99d-3e4e888243d3');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('application/json', $response->getHeaders()['content-type'][0]);
        $this->assertJson($response->getContent());
    }
}
