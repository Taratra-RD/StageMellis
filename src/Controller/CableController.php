<?php

namespace App\Controller;

use App\Entity\Cable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CableController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a Cable entity.
     */
    #[Route('/api/manage/cable', name:'app-manage_cable_post', methods:['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a Cable object
            $cable = $serializer->deserialize($jsonRecu, Cable::class, 'json');

            // Persist the Cable entity
            $this->entityManager->persist($cable);
            $this->entityManager->flush();

            // Return a JSON response with the created Cable entity
            return $this->json($cable, 201, ['message' => 'Cable entity created successfully'], ['groups' => 'cable:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    
    /**
     * Handle GET request to retrieve all Cable entities.
     */
    #[Route('/api/manage/cable', name:'app-manage_cable', methods:['GET'])]
    public function getRam()
    {
        // Retrieve all Cable entities from the database
        $cable = $this->entityManager->getRepository(Cable::class)->findAll();

        // Return a JSON response with the retrieved Cable entities
        return $this->json($cable, 200, [], ['groups' => 'cable:read']);
    }
}
