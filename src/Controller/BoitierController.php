<?php

namespace App\Controller;

use App\Entity\Boitier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class BoitierController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a Boitier entity.
     */
    #[Route('/api/manage/boitier', name: 'app-manage_boitier_post', methods: ['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a Boitier object
            $boitier = $serializer->deserialize($jsonRecu, Boitier::class, 'json');

            // Persist the Boitier entity
            $this->entityManager->persist($boitier);
            $this->entityManager->flush();

            // Return a JSON response with the created Boitier entity
            return $this->json($boitier, 201, ['message' => 'Boitier entity created successfully'], ['groups' => 'boitier:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Handle GET request to retrieve all Boitier entities.
     */
    #[Route('/api/manage/boitier', name: 'app-manage_boitier', methods: ['GET'])]
    public function getBoitier()
    {
        // Retrieve all Boitier entities from the database
        $boitier = $this->entityManager->getRepository(Boitier::class)->findAll();

        // Return a JSON response with the retrieved Boitier entities
        return $this->json($boitier, 200, [], ['groups' => 'boitier:read']);
    }
}
