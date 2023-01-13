<?php

namespace App\Controller;

use App\Repository\DeviceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DeviceController extends AbstractController
{
    public function __construct(private readonly DeviceRepository $deviceRepository)
    {
    }

    #[Route('/api/devices', name: 'device_get_all', methods: ['GET'])]
    public function index(): JsonResponse
    {
        return new JsonResponse(
            $this->deviceRepository->findAll(),
        );
    }

    #[Route('/api/devices/{id}', name: 'device_get_one', methods: ['GET'])]
    public function show(string $id): JsonResponse
    {
        return new JsonResponse(
            $this->deviceRepository->find($id),
        );
    }
}