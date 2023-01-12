<?php

namespace App\Controller;

use App\Model\Device;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DeviceController extends AbstractController
{
    #[Route('/api/devices', name: 'device_get_all', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $data = [
            new Device(
                id: '556df325-d9c3-4df4-b99d-3e4e888243d3',
                name: 'Device 1',
                description: 'Description of first device',
                address: '10.10.10.1',
                isActive: true,
                createdAt: new \DateTimeImmutable(),
                updatedAt: new \DateTimeImmutable(),
            ),
            new Device(
                id: '3dce8037-515f-403e-bd17-28e28d438974',
                name: 'Device 2',
                description: 'Description of second device',
                address: '10.10.10.2',
                isActive: false,
                createdAt: new \DateTimeImmutable(),
                updatedAt: new \DateTimeImmutable(),
            ),
        ];

        return new JsonResponse($data);
    }

    #[Route('/api/devices/{id}', name: 'device_get_one', methods: ['GET'])]
    public function show(string $id): JsonResponse
    {
        $device = new Device(
            id: '556df325-d9c3-4df4-b99d-3e4e888243d3',
            name: 'Device 1',
            description: 'Description of first device',
            address: '10.10.10.1',
            isActive: true,
            createdAt: new \DateTimeImmutable(),
            updatedAt: new \DateTimeImmutable(),
        );

        return new JsonResponse($device);
    }
}