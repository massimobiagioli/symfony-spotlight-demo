<?php
declare(strict_types=1);

namespace App\Repository;

use App\Model\Device;

final class DeviceRepository
{
    private array $devices = [];

    public function __construct()
    {
        $this->initDevices();
    }

    public function findAll(): array
    {
        return array_map(
            fn (Device $device) => $device->toArray(),
            $this->devices
        );
    }

    public function find(string $id): array | null
    {
        /** @var Device $device */
        foreach ($this->devices as $device) {
            if ($device->id === $id) {
                return $device->toArray();
            }
        }
        return null;
    }

    private function initDevices(): void
    {
        $this->devices = [
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
    }
}