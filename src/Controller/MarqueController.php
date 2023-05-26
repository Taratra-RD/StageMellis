<?php

namespace App\Controller;

use App\Entity\Marque;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class MarqueController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a Marque entity.
     */
    #[Route('/api/manage/marque', name:'app-manage_marque_post', methods:['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a Marque object
            $mark = $serializer->deserialize($jsonRecu, Marque::class, 'json');

            // Persist the Marque entity
            $this->entityManager->persist($mark);
            $this->entityManager->flush();

            // Return a JSON response with the created Marque entity
            return $this->json($mark, 201, ['message' => 'Marque entity created successfully'], ['groups' => 'mark:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    
    /**
     * Handle GET request to retrieve all Marque entities.
     */
    #[Route('/api/manage/marque', name:'app-manage_marque', methods:['GET'])]
    public function getMark()
    {
        // Retrieve all Marque entities from the database
        $mark = $this->entityManager->getRepository(Marque::class)->findAll();

        // Return a JSON response with the retrieved Marque entities
        return $this->json($mark, 200, [], ['groups' => 'mark:read']);
    }
}
