<?php

declare(strict_types=1);

namespace App\Tests\Helper;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\ResponseInterface;

class ContractTestCase extends TestCase
{
    private $PRISM_PROXY_URL = 'http://localhost:4010';

    protected function get(string $url): ResponseInterface
    {
        $httpClient = HttpClient::create();
        return $httpClient->request(
            'GET',
            $this->PRISM_PROXY_URL . $url
        );
    }
}
