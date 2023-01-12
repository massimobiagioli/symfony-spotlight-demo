<?php
declare(strict_types=1);

namespace App\Model;

readonly class Device
{
    public function __construct(
        public string $id,
        public string $name,
        public string $type,
        public string $address,
        public bool $isActive,
        public \DateTimeImmutable $createdAt,
        public \DateTimeImmutable $updatedAt,
    )
    {
    }
}