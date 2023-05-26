<?php

namespace App\Controller;

use App\Entity\Souris;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class SourisController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a Souris entity.
     */
    #[Route('/api/manage/souris', name: 'app-manage_souris_post', methods: ['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a Souris object
            $souris = $serializer->deserialize($jsonRecu, Souris::class, 'json');

            // Persist the Souris entity
            $this->entityManager->persist($souris);
            $this->entityManager->flush();

            // Return a JSON response with the created Souris entity
            return $this->json($souris, 201, ['message' => 'Souris entity created successfully'], ['groups' => 'souris:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Handle GET request to retrieve all Souris entities.
     */
    #[Route('/api/manage/souris', name: 'app-manage_souris', methods: ['GET'])]
    public function getSouris()
    {
        // Retrieve all Souris entities from the database
        $souris = $this->entityManager->getRepository(Souris::class)->findAll();

        // Return a JSON response with the retrieved Souris entities
        return $this->json($souris, 200, [], ['groups' => 'souris:read']);
    }
}
