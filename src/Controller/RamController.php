<?php

namespace App\Controller;

use App\Entity\Ram;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class RamController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a Ram entity.
     */
    #[Route('/api/manage/ram', name: 'app-manage_ram_post', methods: ['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a Ram object
            $ram = $serializer->deserialize($jsonRecu, Ram::class, 'json');

            // Persist the Ram entity
            $this->entityManager->persist($ram);
            $this->entityManager->flush();

            // Return a JSON response with the created Ram entity
            return $this->json($ram, 201, ['message' => 'Ram entity created successfully'], ['groups' => 'ram:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Handle GET request to retrieve all Ram entities.
     */
    #[Route('/api/manage/ram', name: 'app-manage_ram', methods: ['GET'])]
    public function getRam()
    {
        // Retrieve all Ram entities from the database
        $ram = $this->entityManager->getRepository(Ram::class)->findAll();

        // Return a JSON response with the retrieved Ram entities
        return $this->json($ram, 200, [], ['groups' => 'ram:read']);
    }
}
