<?php

namespace App\Controller;

use App\Entity\TypeRam;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TypeRamController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a TypeRam entity.
     */
    #[Route('/api/manage/typeRam', name:'app-manage_typeRam_post', methods:['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a TypeRam object
            $typeRam = $serializer->deserialize($jsonRecu, TypeRam::class, 'json');

            // Persist the TypeRam entity
            $this->entityManager->persist($typeRam);
            $this->entityManager->flush();

            // Return a JSON response with the created TypeRam entity
            return $this->json($typeRam, 201, ['message' => 'TypeRam entity created successfully'], ['groups' => 'typeRam:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    
    /**
     * Handle GET request to retrieve all TypeRam entities.
     */
    #[Route('/api/manage/typeRam', name:'app-manage_typeRam', methods:['GET'])]
    public function getRam()
    {
        // Retrieve all TypeRam entities from the database
        $typeRam = $this->entityManager->getRepository(TypeRam::class)->findAll();

        // Return a JSON response with the retrieved TypeRam entities
        return $this->json($typeRam, 200, [], ['groups' => 'typeRam:read']);
    }
}
