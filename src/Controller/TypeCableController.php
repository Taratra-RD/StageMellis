<?php

namespace App\Controller;

use App\Entity\TypeCable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TypeCableController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a TypeCable entity.
     */
    #[Route('/api/manage/typeCable', name:'app-manage_typeCable_post', methods:['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a Alimentation object
            $typeCable = $serializer->deserialize($jsonRecu, TypeCable::class, 'json');

            // Persist the TypeCable entity
            $this->entityManager->persist($typeCable);
            $this->entityManager->flush();

            // Return a JSON response with the created TypeCable entity
            return $this->json($typeCable, 201, ['message' => 'TypeCable entity created successfully'], ['groups' => 'typeCable:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    
    /**
     * Handle GET request to retrieve all TypeCable entities.
     */
    #[Route('/api/manage/typeCable', name:'app-manage_typeCable', methods:['GET'])]
    public function getRam()
    {
        // Retrieve all TypeCable entities from the database
        $typeCable = $this->entityManager->getRepository(TypeCable::class)->findAll();

        // Return a JSON response with the retrieved TypeCable entities
        return $this->json($typeCable, 200, [], ['groups' => 'typeCable:read']);
    }
}
