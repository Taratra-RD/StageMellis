<?php

namespace App\Controller;

use App\Entity\TypeClavier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TypeClavierController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a TypeClavier entity.
     */
    #[Route('/api/manage/typeClavier', name:'app-manage_typeClavier_post', methods:['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a TypeClavier object
            $typeClavier = $serializer->deserialize($jsonRecu, TypeClavier::class, 'json');

            // Persist the TypeClavier entity
            $this->entityManager->persist($typeClavier);
            $this->entityManager->flush();

            // Return a JSON response with the created TypeClavier entity
            return $this->json($typeClavier, 201, ['message' => 'TypeClavier entity created successfully'], ['groups' => 'typeClavier:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    
    /**
     * Handle GET request to retrieve all TypeClavier entities.
     */
    #[Route('/api/manage/typeClavier', name:'app-manage_typeClavier', methods:['GET'])]
    public function getTypeClavier()
    {
        // Retrieve all TypeClavier entities from the database
        $alim = $this->entityManager->getRepository(TypeClavier::class)->findAll();

        // Return a JSON response with the retrieved TypeClavier entities
        return $this->json($alim, 200, [], ['groups' => 'typeClavier:read']);
    }
}
