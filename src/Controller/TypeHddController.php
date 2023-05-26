<?php

namespace App\Controller;

use App\Entity\TypeHdd;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TypeHddController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Handle POST request to create a TypeHdd entity.
     */
    #[Route('/api/manage/typeHdd', name:'app-manage_typeHdd_post', methods:['POST'])]
    public function postPost(Request $request, SerializerInterface $serializer)
    {
        // Retrieve the JSON data from the request
        $jsonRecu = $request->getContent();

        try {
            // Deserialize the JSON data into a TypeHdd object
            $typeHdd = $serializer->deserialize($jsonRecu, TypeHdd::class, 'json');

            // Persist the TypeHdd entity
            $this->entityManager->persist($typeHdd);
            $this->entityManager->flush();

            // Return a JSON response with the created TypeHdd entity
            return $this->json($typeHdd, 201, ['message' => 'TypeHdd entity created successfully'], ['groups' => 'typeHdd:write']);
        } catch (\Throwable $e) {
            // Return a JSON response in case of an error
            return $this->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ], 400);
        }
    }
    
    /**
     * Handle GET request to retrieve all TypeHdd entities.
     */
    #[Route('/api/manage/typeHdd', name:'app-manage_typeHdd', methods:['GET'])]
    public function getTypeHdd()
    {
        // Retrieve all TypeHdd entities from the database
        $mark = $this->entityManager->getRepository(TypeHdd::class)->findAll();

        // Return a JSON response with the retrieved TypeHdd entities
        return $this->json($mark, 200, [], ['groups' => 'typeHdd:read']);
    }
}
