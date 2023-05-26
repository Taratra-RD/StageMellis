<?php

namespace App\Controller;

use App\Entity\Clavier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ClavierController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a Clavier entity.
     */
    #[Route('/api/manage/clavier', name:'app-manage_clavier_post', methods:['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a Clavier object
            $clavier = $serializer->deserialize($jsonRecu, Clavier::class, 'json');

            // Persist the Clavier entity
            $this->entityManager->persist($clavier);
            $this->entityManager->flush();

            // Return a JSON response with the created Clavier entity
            return $this->json($clavier, 201, ['message' => 'Clavier entity created successfully'], ['groups' => 'clavier:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    
    /**
     * Handle GET request to retrieve all Clavier entities.
     */
    #[Route('/api/manage/clavier', name:'app-manage_clavier', methods:['GET'])]
    public function getClavier()
    {
        // Retrieve all Clavier entities from the database
        $clavier = $this->entityManager->getRepository(Clavier::class)->findAll();

        // Return a JSON response with the retrieved Clavier entities
        return $this->json($clavier, 200, [], ['groups' => 'clavier:read']);
    }
}
