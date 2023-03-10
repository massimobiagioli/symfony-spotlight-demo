<?php
declare(strict_types=1);

namespace App\Model;

readonly class Device
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
        public string $address,
        public bool $isActive,
        public \DateTimeImmutable $createdAt,
        public \DateTimeImmutable $updatedAt,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'address' => $this->address,
            'isActive' => $this->isActive,
            'createdAt' => $this->createdAt->format('c'),
            'updatedAt' => $this->updatedAt->format('c'),
        ];
    }
}