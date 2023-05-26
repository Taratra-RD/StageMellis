<?php

namespace App\Controller;

use App\Entity\Societe;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class SocieteController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a Societe entity.
     */
    #[Route('/api/manage/societe', name: 'app-manage_societe_post', methods: ['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a Societe object
            $societe = $serializer->deserialize($jsonRecu, Societe::class, 'json');

            // Persist the Societe entity
            $this->entityManager->persist($societe);
            $this->entityManager->flush();

            // Return a JSON response with the created Societe entity
            return $this->json($societe, 201, ['message' => 'Societe entity created successfully'], ['groups' => 'societe:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Handle GET request to retrieve all Societe entities.
     */
    #[Route('/api/manage/societe', name: 'app-manage_societe', methods: ['GET'])]
    public function getSociete()
    {
        // Retrieve all Societe entities from the database
        $societe = $this->entityManager->getRepository(Societe::class)->findAll();

        // Return a JSON response with the retrieved Societe entities
        return $this->json($societe, 200, [], ['groups' => 'societe:read']);
    }
}
